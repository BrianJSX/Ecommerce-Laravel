
<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  border: 1px solid black;
} 

th,td {
  border: 1px solid black;
}

table.d {
  table-layout: fixed;
  width: 80%;  
}
</style>
</head>
<body>
<h3>Thông tin khách hàng</h3>
<div>
    <span><b>ID ĐƠN HÀNG:</b> {{$orderid}}.</span><br>
    <span><b>Tên khách hàng:</b> {{$info['name']}}.</span><br>
    <span><b>Số điện thoại:</b> {{$info['phone']}}.</span><br>
    <span><b>Email:</b> {{$info['email']}}.</span><br>
    <span><b>Địa chỉ:</b> {{$info['address']}}.</span><br>
</div>
<h3>Chi tiết đặt hàng</h3>
<table class="d">
  <tr>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Số lượng</th>
    <th>Giá</th>
    <th>Tổng giá</th>
  </tr>
  @foreach ($productcart as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->attributes->code}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td>{{number_format($product->price*$product->quantity)}}</td>
    </tr>
  @endforeach
  <tr>
    <td>Tổng phụ</td>
    <td colspan="3"></td>
    <td>{{number_format($totalsub)}}</td>
  </tr>
  <tr>
    <td>Tổng đơn hàng</td>
    <td colspan="3"></td>
    <td>{{number_format($total)}} VNĐ</td>
  </tr>
</table>
<div>
    <p>
        <strong>Phương thức thanh toán</strong><br>
            <span>- Thanh toán bằng tiền mặt hoặc chuyển khoản</span><br>
            <span>- Thanh toán trước 50% giá trị hợp đồng, 50% còn lại thanh toán sau khi giao hàng.</span> 
    </p>
    
</div>

</body>
</html>
