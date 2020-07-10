<?php

//----------------------------------------------------------------------------------------------------------------------
// Lấy dữ liệu từ database để hiển thị:
//---------------Product_show-----------------
$product_show_data = new CRUD_Database;
$product_show_data->connect();
$data_products = $product_show_data->executeAll("SELECT * FROM product_info_show");

$product_code = [];
$product_name = [];
$product_images = [];
$product_price_sale = [];
$is_hot = [];
$is_new = [];
$product_new = [];
$product_hot = [];

$i = 0;
foreach ($data_products as $key => $value) {
    $product_code[$i] = $value['product_code'];
    $product_name[$i] = $value['product_name'];
    $product_images[$i] = $value['product_images'];
    $product_image[$i] = explode(",", $product_images[$i]);
    $product_price_sale[$i] = $value['product_price_sale'];
    $product_price_sale[$i] = number_format($product_price_sale[$i],0,',','.');
    $is_new[$i] = $value['is_new'];
    if($is_new[$i] === 'True' && $i < 9){
        $product_new[$i] = "<form action='index.php' method='post'>
        <input type='hidden' name='router' value='customer'>
        <input type='hidden' name='control' value='add_to_box'>
        <input type='hidden' name='product_code' value=".$product_code[$i].">
        <img id='image_product_show' src=".$product_image[$i][0].">
        <a id='name_product_show' href='index.php?router=customer&control=watch_product&product=". $product_code[$i]."'>".$product_name[$i]."</a>
        <label id='price_product_show'>".$product_price_sale[$i]."đ</label>
        <button id='button_product_show'>Thêm vào giỏ hàng</button></form>";
        $i++;
    }  
}

$i = 0;
foreach ($data_products as $key => $value) {
    $product_code[$i] = $value['product_code'];
    $product_name[$i] = $value['product_name'];
    $product_images[$i] = $value['product_images'];
    $product_image[$i] = explode(",", $product_images[$i]);
    $product_price_sale[$i] = $value['product_price_sale'];
    $product_price_sale[$i] = number_format($product_price_sale[$i],0,',','.');
    $is_hot[$i] = $value['is_hot'];
    if($is_hot[$i] === 'True' && $i < 9){
        $product_hot[$i] = "<form action='index.php' method='post'>
        <input type='hidden' name='router' value='customer'>
        <input type='hidden' name='control' value='add_to_box'>
        <input type='hidden' name='product_code' value=".$product_code[$i].">
        <img id='image_product_show' src=".$product_image[$i][0].">
        <a id='name_product_show' href='index.php?router=customer&control=watch_product&product=". $product_code[$i]."'>".$product_name[$i]."</a>
        <label id='price_product_show'>".$product_price_sale[$i]."đ</label>
        <button id='button_product_show'>Thêm vào giỏ hàng</button></form>";
        $i++;
    }  
}


// Giỏ hàng
$i = 0;
if (!isset($_SESSION["product_code_$i"])) {
    $box_products_show = '';
    $label_empty_display = 'block';
    $btn_buy_display = 'none';
} else {
    // Hiển thị giỏ hàng ở trang chủ:
    $label_empty_display = 'none';
    $btn_buy_display = 'block';
    $box_products_show = "";
    $total_price_ss = 0;
    for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
        $code = $_SESSION["product_code_$i"];
        $count = $_SESSION["product_count_$i"];
        $get_name_and_price = new CRUD_Database;
        $get_name_and_price->connect();
        $result = $get_name_and_price->executeOne("SELECT product_name, product_price_sale FROM products WHERE product_code = '$code'");
        $name = $result['product_name'];
        $price_ss = $result['product_price_sale'];
        $price = number_format($price_ss,0,',','.');
        $price_ss = $price_ss * $count;
        $total_price_ss += (float) $price_ss;
        $total_price = number_format($total_price_ss,0,',','.');
        $box_products_show = $box_products_show .
            "<label class='box_product_name'>$name</label> 
                    <table class='box_product_info'>
                        <tr>
                            <td id='box_product_title'>Giá:</td>
                            <td id='box_product_value'>$price đ</td>
                        </tr>
                        <tr>
                            <td id='box_product_title'>Số lượng:</td>
                            <td id='box_product_value'>$count</td>
                        </tr>
                    </table>";
    }
    $box_products_show = $box_products_show . "<br><label id='price_tmp'>Tạm tính: $total_price đ</label>";
}
