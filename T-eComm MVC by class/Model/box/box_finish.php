<?php
if (isset($_POST['payment_way'])) {
    $_SESSION['payment_way'] = $_POST['payment_way'];
    Box::save_box();
    // Xóa dữ liệu giỏ hàng:
    for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
        unset($_SESSION["product_code_$i"]);
        unset($_SESSION["product_count_$i"]);
        unset($_SESSION["product_name_$i"]);
        unset($_SESSION["product_price_$i"]);
    }
    if (isset($_SESSION["product_code"])) {
        unset($_SESSION["product_code"]);
    }
    if (isset($_SESSION["count_in_box"])) {
        $_SESSION["count_in_box"] = 0;
    }
}
