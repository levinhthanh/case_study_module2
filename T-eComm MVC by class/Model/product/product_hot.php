<?php
$product_show_data = new CRUD_Database;
$product_show_data->connect();
$data_products = $product_show_data->executeAll("SELECT * FROM product_info_show");

$product_code = [];
$product_name = [];
$product_images = [];
$product_price_sale = [];
$is_hot = [];
$product_hot = [];
$hot_products_show = "";
$i = 0;
foreach ($data_products as $key => $value) {
    $product_code[$i] = $value['product_code'];
    $product_name[$i] = $value['product_name'];
    $product_images[$i] = $value['product_images'];
    $product_image[$i] = explode(",", $product_images[$i]);
    $product_price_sale[$i] = $value['product_price_sale'];
    $product_price_sale[$i] = number_format($product_price_sale[$i],0,',','.');
    $is_hot[$i] = $value['is_hot'];
    if($is_hot[$i] === 'True' && $i < 30){
        $product_hot[$i] = "<div class='product_show'><form action='index.php' method='post'>
        <input type='hidden' name='router' value='customer'>
        <input type='hidden' name='control' value='add_to_box'>
        <input type='hidden' name='product_code' value=".$product_code[$i].">
        <img id='image_product_show' src=".$product_image[$i][0].">
        <a id='name_product_show' href='index.php?router=customer&control=watch_product&product=". $product_code[$i]."'>".$product_name[$i]."</a>
        <label id='price_product_show'>".$product_price_sale[$i]."đ</label>
        <button id='button_product_show'>Thêm vào giỏ hàng</button></form></div>";
        $hot_products_show .= $product_hot[$i];
        $i++;
    }  
    
}
?>