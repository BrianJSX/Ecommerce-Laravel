
{{-- Validate FORM --}}
@foreach ($errors->all() as $error)
<div class='alert alert-danger'>{{$error}}</div>
@endforeach

{{-- AddPermissionToRole --}}
<?php
    $messageAddCateEr = Session::get('AddRoleToPermissionError');
    if($messageAddCateEr){
        echo "<div class='alert alert-danger'>".$messageAddCateEr."</div>";
        session::put('AddRoleToPermissionError',Null);
    }
?>
<?php
    $messageAddDecCr = Session::get('AddRoleToPermissionCorrect');
    if($messageAddDecCr){
        echo "<div class='alert alert-success'>".$messageAddDecCr."</div>";
        session::put('AddRoleToPermissionCorrect',Null);
    }
?>

{{-- Category --}}
<?php
    $messageAddCate = Session::get('AddCategoryCorrect');
    if($messageAddCate){
        echo "<div class='alert alert-success'>".$messageAddCate."</div>";
        session::put('AddCategoryCorrect',Null);
    }
?>
<?php
    $messageEditCate = Session::get('EditCategoryCorrect');
    if($messageEditCate){
        echo "<div class='alert alert-success'>".$messageEditCate."</div>";
        session::put('EditCategoryCorrect',Null);
    }
?>

{{-- Brand --}}
<?php
    $messageAddBrand = Session::get('AddBrandCorrect');
    if($messageAddBrand){
        echo "<div class='alert alert-success'>".$messageAddBrand."</div>";
        session::put('AddBrandCorrect',Null);
    }
?>
<?php
$messageEditBrand = Session::get('EditBrandCorrect');
if($messageEditBrand){
    echo "<div class='alert alert-success'>".$messageEditBrand."</div>";
    session::put('EditBrandCorrect',Null);
}
?>

{{-- product --}}
<?php
    $messageAddProduct = Session::get('AddProductCorrect');
    if($messageAddProduct){
        echo "<div class='alert alert-success'>".$messageAddProduct."</div>";
        session::put('AddProductCorrect',Null);
    }
?>

<?php
$messageEditProduct = Session::get('EditProductCorrect');
if($messageEditProduct){
    echo "<div class='alert alert-success'>".$messageEditProduct."</div>";
    session::put('EditProductCorrect',Null);
}
?>
{{-- News --}}
<?php
    $messageAddNews = Session::get('AddNewsCorrect');
    if($messageAddNews){
        echo "<div class='alert alert-success'>".$messageAddNews."</div>";
        session::put('AddNewsCorrect',Null);
    }
?>

<?php
$messageEditNews = Session::get('EditNewsCorrect');
if($messageEditNews){
    echo "<div class='alert alert-success'>".$messageEditNews."</div>";
    session::put('EditNewsCorrect',Null);
}
?>
{{-- Slider --}}
<?php
    $messageAddSlider = Session::get('AddSliderCorrect');
    if($messageAddSlider){
        echo "<div class='alert alert-success'>".$messageAddSlider."</div>";
        session::put('AddSliderCorrect',Null);
    }
?>

<?php
$messageEditSlider = Session::get('EditSliderCorrect');
if($messageEditSlider){
    echo "<div class='alert alert-success'>".$messageEditSlider."</div>";
    session::put('EditSliderCorrect',Null);
}
?>
