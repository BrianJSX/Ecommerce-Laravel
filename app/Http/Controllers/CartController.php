<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\OrderModel;
use Cart;
use Mail;
class CartController extends Controller
{
    public function add(Request $request,$id){
        $product = ProductModel::find($id);
        if($product->prod_price > $product->prod_sale && $product->prod_sale > 0){
            Cart::add(array(
                'id' => $id, // inique row ID
                'name' => $product->prod_name,
                'price' => $product->prod_sale,
                'pricesale' => $product->prod_sale,
                'quantity' => $request->qtybutton,
                'attributes' => array(
                    'img' => $product->prod_img,
                    'code' => $product->prod_code,
                ),
            ));
        }else {
            Cart::add(array(
                'id' => $id, // inique row ID
                'name' => $product->prod_name,
                'price' => $product->prod_price,
                'pricesale' => $product->prod_sale,
                'quantity' => $request->qtybutton,
                'attributes' => array(
                    'img' => $product->prod_img,
                    'code' => $product->prod_code,
                ),
            ));
        }
        return redirect()->route('cartshow');
    }
   
    public function addajax(Request $request){
        $id = $request->id;
        $product = ProductModel::find($id);
        if($product->prod_price > $product->prod_sale && $product->prod_sale > 0){
            Cart::add(array(
                'id' => $id, // inique row ID
                'name' => $product->prod_name,
                'price' => $product->prod_sale,
                'pricesale' => $product->prod_sale,
                'quantity' => 1,
                'attributes' => array(
                    'img' => $product->prod_img,
                    'code' => $product->prod_code,
                ),
            ));
        }else {
            Cart::add(array(
                'id' => $id, // inique row ID
                'name' => $product->prod_name,
                'price' => $product->prod_price,
                'pricesale' => $product->prod_sale,
                'quantity' => 1,
                'attributes' => array(
                    'img' => $product->prod_img,
                    'code' => $product->prod_code,
                ),
            ));
        }
       
    }
    public function show(){
        $data['totalsub'] = Cart::getSubTotal();
        $data['total'] = Cart::getTotal();
        $data['productcart'] = Cart::getContent();
        $data['countcart'] = count(Cart::getContent());    
        return view('pages.cart',$data);
        // $data = Cart::isEmpty();
        // dd($data);
    }
    public function del($id){
        Cart::remove($id);
    }
    public function update(Request $request){
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty 
            ),
          ));
    }
    public function showcomplete(){
        $data['totalsub'] = Cart::getSubTotal();
        $data['total'] = Cart::getTotal();
        $data['productcart'] = Cart::getContent();
        $data['countcart'] = count(Cart::getContent());    
        return view('pages.cartcomplete',$data);
    }
    public function postcomplete(Request $request){
        
        $cartContent = Cart::getContent();
        $cartTotalSub =  Cart::getSubTotal();
        $cartTotal = Cart::getTotal();
        $cartCount = count(Cart::getContent());
        $cartNotes = $request->notes;
        
        $order = new OrderModel();
        $order->order_name = $request->name;
        $order->order_phone = $request->phone;
        $order->order_email = $request->email;
        $order->order_address = $request->address;
        $order->order_quantity = $cartCount;
        $order->order_total = $cartTotal;
        if($cartNotes!=null){
            $order->order_notes = $cartNotes;  
        }
        $order->save();
        
        $id = $order->order_id;

        $data['info'] = $request->all();
        $email = $request->email;
        $data['totalsub'] = $cartTotalSub;
        $data['total'] = $cartTotal;
        $data['productcart'] = $cartContent;
        $data['countcart'] = $cartCount;
        $data['orderid'] = $id;

        Mail::send('test', $data, function ($message) use ($email) {
            $message->from('minho.technology@gmail.com', 'Cửa hàng điện nước phúc lộc');
            $message->to($email, $email);
            $message->cc('diennuocphuclocorder@gmail.com', 'Minh Hồ');
            $message->subject('Xác nhận hóa đơn mua hàng Phúc Lộc');
           
        });
        Cart::clear();
        return redirect()->route('complete');
    }

    public function complete(){
        $data['totalsub'] = Cart::getSubTotal();
        $data['total'] = Cart::getTotal();
        $data['productcart'] = Cart::getContent();
        $data['countcart'] = count(Cart::getContent());
        return view('pages.finishorder',$data);
    }
}
