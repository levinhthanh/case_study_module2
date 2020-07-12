<?php

//----------------------------------------------------------------------------------------------------------------------
// Nhận dữ liệu từ người dùng và lưu vào Session:
//---------------log_in-----------------
if (!isset($_SESSION["account"])) {
    session_start();
}
if (isset($_POST['account']) && !isset($_POST['fullname'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    $_SESSION["account"] = $account;
    $_SESSION["password"] = $password;
    $_SESSION["hiUser"] = "";
}
//---------------register-----------------
if (isset($_POST['fullname']) && isset($_POST['birthday'])) {
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
}
//---------------change_password-----------------
if (isset($_POST['old_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
}

// Kiểm tra phiên phiên làm việc:
if (isset($_SESSION["account"]) && isset($_SESSION["password"])) {
    $hiUser = $_SESSION['hiUser'];
    $log_in = "none;";
    $log_out = "block;";
}

// Nhận dữ liệu thêm nhân viên từ admin:
if (isset($_POST['control']) && $_POST['control'] === 'require_add_employee') {
    $fullname_employee = $_POST['employee_new_name'];
    if (isset($_COOKIE['fullname_employee'])) {
        setcookie('fullname_employee', "", time() - 3600);
        setcookie('fullname_employee', "$fullname_employee", time() + 3600);
    } else {
        setcookie('fullname_employee', "$fullname_employee", time() + 3600);
    }

    $birthday_employee = $_POST['employee_new_birthday'];
    if (isset($_COOKIE['birthday_employee'])) {
        setcookie('birthday_employee', "", time() - 3600);
        setcookie('birthday_employee', "$birthday_employee", time() + 3600);
    } else {
        setcookie('birthday_employee', "$birthday_employee", time() + 3600);
    }

    $address_employee = $_POST['employee_new_address'];
    if (isset($_COOKIE['address_employee'])) {
        setcookie('address_employee', "", time() - 3600);
        setcookie('address_employee', "$address_employee", time() + 3600);
    } else {
        setcookie('address_employee', "$address_employee", time() + 3600);
    }

    $phone_employee = $_POST['employee_new_phone'];
    if (isset($_COOKIE['phone_employee'])) {
        setcookie('phone_employee', "", time() - 3600);
        setcookie('phone_employee', "$phone_employee", time() + 3600);
    } else {
        setcookie('phone_employee', "$phone_employee", time() + 3600);
    }

    $email_employee = $_POST['employee_new_email'];
    if (isset($_COOKIE['email_employee'])) {
        setcookie('email_employee', "", time() - 3600);
        setcookie('email_employee', "$email_employee", time() + 3600);
    } else {
        setcookie('email_employee', "$email_employee", time() + 3600);
    }

    $account_employee = $_POST['employee_new_account'];
    if (isset($_COOKIE['account_employee'])) {
        setcookie('account_employee', "", time() - 3600);
        setcookie('account_employee', "$account_employee", time() + 3600);
    } else {
        setcookie('account_employee', "$account_employee", time() + 3600);
    }

    $password_employee = $_POST['employee_new_password'];
    if (isset($_COOKIE['password_employee'])) {
        setcookie('password_employee', "", time() - 3600);
        setcookie('password_employee', "$password_employee", time() + 3600);
    } else {
        setcookie('password_employee', "$password_employee", time() + 3600);
    }

    $possition_employee = $_POST['employee_new_possition'];

    $salary_employee = $_POST['employee_new_salary'];
    if (isset($_COOKIE['salary_employee'])) {
        setcookie('salary_employee', "", time() - 3600);
        setcookie('salary_employee', "$salary_employee", time() + 3600);
    } else {
        setcookie('salary_employee', "$salary_employee", time() + 3600);
    }
}

// Nhận dữ liệu thêm sản phẩm từ admin:
if (isset($_POST['control']) && $_POST['control'] === 'require_add_product') {
    $name_product = $_POST['product_new_name'];
    if (isset($_COOKIE['name_product'])) {
        setcookie('name_product', "", time() - 3600);
        setcookie('name_product', "$name_product", time() + 3600);
    } else {
        setcookie('name_product', "$name_product", time() + 3600);
    }

    $price_buy_product = $_POST['product_price_buy'];
    if (isset($_COOKIE['price_buy_product'])) {
        setcookie('price_buy_product', "", time() - 3600);
        setcookie('price_buy_product', "$price_buy_product", time() + 3600);
    } else {
        setcookie('price_buy_product', "$price_buy_product", time() + 3600);
    }

    $line_product = $_POST['product_new_line'];

    $price_sale_product = $_POST['product_price_sale'];
    if (isset($_COOKIE['price_sale_product'])) {
        setcookie('price_sale_product', "", time() - 3600);
        setcookie('price_sale_product', "$price_sale_product", time() + 3600);
    } else {
        setcookie('price_sale_product', "$price_sale_product", time() + 3600);
    }

    $count_product = $_POST['product_count'];
    if (isset($_COOKIE['count_product'])) {
        setcookie('count_product', "", time() - 3600);
        setcookie('count_product', "$count_product", time() + 3600);
    } else {
        setcookie('count_product', "$count_product", time() + 3600);
    }

    $warehouse_product = $_POST['product_warehouse'];

    $images_product = $_POST['product_images'];
    if (isset($_COOKIE['images_product'])) {
        setcookie('images_product', "", time() - 3600);
        setcookie('images_product', "$images_product", time() + 3600);
    } else {
        setcookie('images_product', "$images_product", time() + 3600);
    }

    if (isset($_POST['product_is_new'])) {
        $is_new_product = 'True';
    } else {
        $is_new_product = 'False';
    }

    if (isset($_POST['product_is_hot'])) {
        $is_hot_product = 'True';
    } else {
        $is_hot_product = 'False';
    }
}

// Nhận dữ liệu update thông tin nhân viên:
if (isset($_POST['control']) && $_POST['control'] === 'require_update_employee') {
    $employee_code = $_POST['employee_code'];
    $name_employee_update = $_POST['name_employee_update'];
    $birthday_employee_update = $_POST['birthday_employee_update'];
    $address_employee_update = $_POST['address_employee_update'];
    $phone_employee_update = $_POST['phone_employee_update'];
    $email_employee_update = $_POST['email_employee_update'];
    $salary_employee_update = $_POST['salary_employee_update'];
    $join_day_employee_update = $_POST['join_day_employee_update'];
    $possition_employee_update = $_POST['possition_employee_update'];
    $account_employee_update = $_POST['account_employee_update'];
}

// Nhận dữ liệu update thông tin sản phẩm:
if (isset($_POST['control']) && $_POST['control'] === 'require_update_product') {
    $product_code = $_POST['product_code'];
    $name_product_update = $_POST['name_product_update'];
    $price_buy_update = $_POST['price_buy_update'];
    $price_sale_update = $_POST['price_sale_update'];
    $images_product_update = $_POST['images_product_update'];
    $status_product_update = $_POST['status_product_update'];
    $count_product_update = $_POST['count_product_update'];
    $warehosing_day_update = $_POST['warehosing_day_update'];
    $warehouse_update = $_POST['warehouse_update'];
    $line_name_update = $_POST['line_name_update'];
}
