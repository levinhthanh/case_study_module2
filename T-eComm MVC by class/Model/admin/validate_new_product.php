<?php


function check_update_product($product_code, $name, $price_buy, $price_sale, $count, $images)
{
    $checkForm = true;
    $register_result = [];

    // check name
    if ($name === "") {
        $checkForm = false;
    }
    $checkOldProduct = new CRUD_Database;
    $checkOldProduct->connect();
    $row = $checkOldProduct->executeOne("SELECT product_name, product_code FROM products WHERE product_name = '$name' ");
    if (isset($row['product_name']) && $row['product_code'] !== $product_code) {
        $checkForm = false;
    }

    // check price_buy 
    $checkPriceBuy = "/^[0-9]{5,10}$/";
    if ($price_buy === "" || !preg_match($checkPriceBuy, $price_buy)) {
        $checkForm = false;
    }
    // check price_sale
    $checkPriceSale = "/^[0-9]{5,10}$/";
    if ($price_sale === "" || !preg_match($checkPriceSale, $price_sale)) { 
        $checkForm = false;
    }
    // check count
    $checkCount = "/^[0-9]{1,10}$/";
    if ($count === "" || !preg_match($checkCount, $count)) {
        $checkForm = false;
    }
    // check images
    if ($images === "") {
        $checkForm = false;
    }

    
    if ($checkForm) {
        $register_result['result'] = "success";
    } else {
        $register_result['result'] = "error";
    }
    return $register_result;
}







function check_new_product($name, $price_buy, $price_sale, $count, $images)
{
    $checkForm = true;
    $register_result = [];

    // check name
    $name_status = 'fas fa-check';
    if ($name === "") {
        $name_status = 'fas fa-times';
        $checkForm = false;
    }
    $checkOldProduct = new CRUD_Database;
    $checkOldProduct->connect();
    $row = $checkOldProduct->executeOne("SELECT product_name FROM products WHERE product_name = '$name' ");
    if (isset($row['product_name'])) {
        $register_result['result'] = "exist";
        return $register_result;
    }

    // check price_buy 
    $checkPriceBuy = "/^[0-9]{5,10}$/";
    $price_buy_status = 'fas fa-check';
    if ($price_buy === "" || !preg_match($checkPriceBuy, $price_buy)) {
        $price_buy_status = 'fas fa-times';
        $checkForm = false;
    }
    // check price_sale
    $checkPriceSale = "/^[0-9]{5,10}$/";
    $price_sale_status = 'fas fa-check';
    if ($price_sale === "" || !preg_match($checkPriceSale, $price_sale)) {
        $price_sale_status = 'fas fa-times';
        $checkForm = false;
    }
    // check count
    $checkCount = "/^[0-9]{1,10}$/";
    $count_status = 'fas fa-check';
    if ($count === "" || !preg_match($checkCount, $count)) {
        $count_status = 'fas fa-times';
        $checkForm = false;
    }
    // check images
    $images_status = 'fas fa-check';
    if ($images === "") {
        $images_status = 'fas fa-times';
        $checkForm = false;
    }

    
    if ($checkForm) {
        $register_result['result'] = "success";
        return $register_result;
    } else {
        $register_result['result'] = "error";
        $register_result['name'] = $name_status;
        $register_result['price_buy'] = $price_buy_status;
        $register_result['price_sale'] = $price_sale_status;
        $register_result['count'] = $count_status;
        $register_result['images'] = $images_status;
        return $register_result;
    }
}
