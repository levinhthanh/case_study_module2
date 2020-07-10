<?php
// Đã có mã sản phẩm $product_code => Lấy thông tin:
$product_info = Product::get_product($product_code);

$one_product_name = $product_info['product_name'];
$one_product_price_sale = $product_info['product_price_sale'];
$one_product_price_sale = number_format($one_product_price_sale,0,',','.');

// images
$one_product_images = $product_info['product_images'];
$one_product_image = explode(',',$one_product_images);
$product_image1 = $one_product_image[0];
if(isset($one_product_image[1])){
    $product_image2 = $one_product_image[1];
}
else{
    $product_image2 = $one_product_image[0];
}
if(isset($one_product_image[2])){
    $product_image3 = $one_product_image[2];
}
else{
    $product_image3 = $one_product_image[0];
}

// is hot
$one_is_hot = $product_info['is_hot'];
if($one_is_hot === 'True'){
    $display_hot = 'block';
}
else{
    $display_hot = 'none';
}
// is new
$one_is_new = $product_info['is_new'];
if($one_is_new === 'True'){
    $display_new = 'block';
}
else{
    $display_new = 'none';
}




// ADD COMMENTS
$login_to_comment = "none";
$comment_success = "none";
if(isset($_SESSION['account']) && isset($_SESSION['password'])){
    if(isset($_POST['comment_content'])){
        if($_POST['comment_content'] !== ""){
            $content = $_POST['comment_content'];
            $account = $_SESSION['account'];
            Comment::add_comment( $content, $account, $product_code);
            $comment_success = "block";
            $_POST['comment_content'] = "";
        }  
    }  
}
else{
    $login_to_comment = "block";
}
// SHOW COMMENTS
$comments = Comment::get_comment($product_code);
$show_comments = "";
foreach ($comments as $key => $value) {
    $name = $value['customer_fullname'];
    $content = $value['comment_content'];
    $show_comments .= "<div class='cover_comment'><div class='customer_name'>".$name." :</div>"." <div class='customer_comment'>"
    .$content."</div></div>";
}
