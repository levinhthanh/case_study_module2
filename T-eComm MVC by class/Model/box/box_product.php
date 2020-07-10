<?php


// Hiển thị trang giỏ hàng:
if (isset($_GET['sub'])) {
    $i = $_GET['sub'];
    $_SESSION["product_count_$i"]--;
    if ($_SESSION["product_count_$i"] < 0) {
        $_SESSION["product_count_$i"] = 0;
    }
}
if (isset($_GET['add'])) {
    $i = $_GET['add'];
    $_SESSION["product_count_$i"]++;
}

if (isset($_GET['control']) && $_GET['control'] === 'show_box' && isset($_SESSION["product_code_0"])) {
    $box_products_table = "";
    $total_price_ss = 0;
    $count = 1;
    $sum_count = 0;
    $sum_total_price_ss = 0;
    for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
        $code = $_SESSION["product_code_$i"];
        $count = $_SESSION["product_count_$i"];

        $get_name_and_price = new CRUD_Database;
        $get_name_and_price->connect();
        $result = $get_name_and_price->executeOne("SELECT product_name, product_price_sale, product_images
         FROM product_info_show WHERE product_code = '$code'");
        $name = $result['product_name'];
        $_SESSION["product_name_$i"] = $name;
        $price_ss = $result['product_price_sale'];
        $_SESSION["product_price_$i"] = $price_ss;
        $price = number_format($price_ss,0,',','.');
        $images = $result['product_images'];
        $image_array = explode(',', $images);
        $image = $image_array[0];
        $total_price_ss = (float) $price_ss * (float) $count;
        $total_price = number_format($total_price_ss,0,',','.');
        $box_products_table = $box_products_table .
            " <tr>
                 <td id='colume1'><img id='box_image_product' src='$image'></td>
                 <td id='colume2'>$name</td>
                 <td id='colume3'>$price đ</td>
                 <td id='colume4'>
                     <a id='change_count_btn' href='index.php?router=customer&control=show_box&sub=$i'>-</a>
                     <label>$count</label>
                     <a id='change_count_btn' href='index.php?router=customer&control=show_box&add=$i'>+</a>
                     </td>
                     <td id='colume5'>$total_price đ</td>
                 </tr>
            ";
        $sum_count += $count;
        $sum_total_price_ss += $total_price_ss;
        $sum_total_price = number_format($sum_total_price_ss,0,',','.');
    }
    //Lấy thông tin KH từ database để hiển thị:
    $box_account = $_SESSION['account'];
    $get_account_code = new CRUD_Database;
    $get_account_code->connect();
    $row = $get_account_code->executeOne("SELECT account_code FROM accounts WHERE account_name = '$box_account'");
    $box_account_code = $row['account_code'];
    $get_info_customer = new CRUD_Database;
    $get_info_customer->connect();
    $row_customer = $get_info_customer->executeOne("SELECT * FROM customers WHERE Accounts_account_code = '$box_account_code'");
    $box_customer_name = $row_customer['customer_fullname'];
    $box_customer_phone = $row_customer['customer_phone'];
    $box_customer_email = $row_customer['customer_email'];
    $box_customer_address = $row_customer['customer_address'];
}

if(!isset($_SESSION["product_code_0"])){
    $sum_count = "0";
    $sum_total_price = "0";
    $box_customer_name = "";
    $box_customer_phone = "";
    $box_customer_email = "";
    $box_customer_address = "";
    $box_products_table = "";
}

// Nhận yêu cầu thêm sản phẩm vào giỏ hàng:
$_SESSION["product_code_-1"] = "";
if (isset($_SESSION['product_code'])) {
    $product_code = $_SESSION['product_code'];
    $product_count = $_SESSION['product_count'];
    for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
    }
    $j = $i - 1;

    if ($product_code !== $_SESSION["product_code_$j"]) {
        $_SESSION["product_code_$i"] = $product_code;
        $_SESSION["product_count_$i"] = $product_count;
    }
}



