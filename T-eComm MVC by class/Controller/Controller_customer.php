<?php

if (isset($_GET['control'])) {
    $control = $_GET['control'];
    switch ($control) {
        case 'guest_message': {
                $return_message = "";
                include('View/message.php');
                break;
            }
        case 'box_finish': {
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
                    $count_in_box = $_SESSION['count_in_box'];
                }
                include('Model/get_product_data.php');
                include('View/home_page.php');
                break;
            }
        case 'show_box': {
                if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
                    include('Model/box/box_product.php');
                    include('View/box/box_product.php');
                    break;
                } else {
                    $error_login = "";
                    include('View/login_page.php');
                    break;
                }
            }
        case 'new_product_list': {
                if (isset($_SESSION["count_in_box"])) {
                    $count_in_box = $_SESSION['count_in_box'];
                }
                include('Model/get_product_data.php');
                include('Model/product/product_new.php');
                include('View/product/product_new.php');
                break;
            }
        case 'search_product_list': {
                if (isset($_SESSION["count_in_box"])) {
                    $count_in_box = $_SESSION['count_in_box'];
                }
                include('Model/get_product_data.php');
                include('Model/product/product_search.php');
                include('View/product/product_search.php');
                break;
            }
        case 'hot_product_list': {
                if (isset($_SESSION["count_in_box"])) {
                    $count_in_box = $_SESSION['count_in_box'];
                }
                include('Model/get_product_data.php');
                include('Model/product/product_hot.php');
                include('View/product/product_hot.php');
                break;
            }
        case 'watch_product': {
                include('Controller/Control_product.php');
                break;
            }
        case 'register': {
                include('View/customer/register_page.php');
                break;
            }
        case 'logout': {
                $hiUser = "";
                $log_in = "block;";
                $log_out = "none;";
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
                session_destroy();
                include('Model/get_product_data.php');
                include('View/home_page.php');
                break;
            }
        case 'change_password': {
                include('View/customer/change_password.php');
                break;
            }
        case 'forgot_password': {
                include('Model/forgot_password.php');
                include('View/customer/forgot_password.php');
                break;
            }
    }
}

if (isset($_POST['control'])) {
    $control = $_POST['control'];
    switch ($control) {
        case "save_message":{
            include('Model/message.php');
            include('View/message.php');
            break;
        }
        case "box_finish": {
                include('Model/box/box_finish.php');
                include('View/box/box_finish.php');
                break;
            }
        case "box_payment": {
                include('Model/box/box_payment.php');
                include('View/box/box_payment.php');
                break;
            }
        case "add_to_box": {
                $product_code = $_POST['product_code'];
                $_SESSION['product_code'] = $product_code;
                $_SESSION['product_count'] = 1;
                $label_empty_display = 'none';
                $btn_buy_display = 'block';
                include('Model/box/box_product.php');
                include('Model/get_product_data.php');
                include('View/home_page.php');
                break;
            }
        case "require_add_comment": {
                include('Controller/Control_product.php');
                break;
            }
        case "require_get_password": {
                include('Model/forgot_password.php');
                include('View/customer/forgot_password.php');
                break;
            }
        case "change_password_require": {
                $account = $_SESSION['account'];
                $changepassword_array = change_password($account, $old_password, $new_password, $confirm_password);
                if ($changepassword_array[0] === 'success') {
                    $_SESSION['password'] = $new_password;
                    $change_password = "Đổi mật khẩu thành công!";
                    $go_to_login = "block";
                }
                if ($changepassword_array[0] === 'error') {
                    $change_password = $changepassword_array[1];
                }
                include("View/customer/change_password.php");
                break;
            }
        case 'register_require': {
                $check_result = register_process($fullname, $birthday, $address, $phone, $email, $account, $password, $passwordRepeat);
                if ($check_result['result'] === 'success') {
                    $customer = new Customer($fullname, $birthday, $address, $phone, $email, $account, $password);
                    $customer->register_account();
                    $registerSuccess = "Chúc mừng bạn đã đăng ký thành công!";
                    $go_to_login = "block";
                    include('View/customer/register_page.php');
                } else {
                    if ($check_result['result'] === 'error') {
                        $nameError = $check_result['fullname'];
                        $birthdayError = $check_result['birthday'];
                        $addressError = $check_result['address'];
                        $phoneError = $check_result['phone'];
                        $emailError = $check_result['email'];
                        $accountError = $check_result['account'];
                        $passwordError = $check_result['password'];
                        $passwordRepeatError = $check_result['passwordRepeat'];
                        include('View/customer/register_page.php');
                    }
                }
                break;
            }
    }
}
