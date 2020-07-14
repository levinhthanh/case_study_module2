<?php
//---------------------------------------------------------------------------------------------------------------------
// Khai báo ban đầu
$fullname = "";
$birthday = "";
$address = "";
$phone = "";
$email = "";
$account = "";
$password = "";
$passwordRepeat = "";

$registerSuccess = "";
$go_to_login = "none";

$nameError = "";
$birthdayError =  "";
$addressError =  "";
$phoneError =  "";
$emailError =  "";
$accountError =  "";
$passwordError =  "";
$passwordRepeatError =  "";

$controlGet = "";
$controlPost = "";

$hiUser = "";
$log_in = "block;";
$log_out = "none;";

$old_password = "";
$new_password = "";
$confirm_password = "";
$change_password = "";

$display = 'none';
$content = '';

// Hiển thị danh sách nhân viên
$display_list_employee = "none";
$table_list_employee = "";
// Hiển thị danh sách sản phẩm
$display_list_product = "none";
$table_list_product = "";
// Hiển thị danh sách khách hàng
$display_list_customer = "none";
$table_list_customer = "";
//Chỉnh sửa nhân viên
$display_edit_employee = 'none';
$table_one_employee = "";
$error_update = "";
$code_emp = "";
// Xóa nhân viên
$delete_employee = "";
$btn_delete = "none";

//Chỉnh sửa sản phẩm
$display_edit_product = 'none';
$table_one_product = "";
$error_update = "";
$code_prod = "";
// Xóa sản phẩm
$delete_product = "";
$btn_delete = "none";
// Chỉnh sửa hoặc xóa khách hàng
$code_cus = "";
$delete_customer = "";
$btn_delete = "none";
$edit_customer = "";
$btn_edit = "none";



// Add employee

$display_add_employee = "none";
$lable_confirm = "none";

$fullname_employee = "";
$birthday_employee = "";
$address_employee = "";
$phone_employee = "";
$email_employee = "";
$account_employee = "";
$password_employee = "";
$salary_employee = "";

if (isset($_COOKIE['fullname_employee'])) {
    $fullname_employee = $_COOKIE['fullname_employee'];
}
if (isset($_COOKIE['birthday_employee'])) {
    $birthday_employee = $_COOKIE['birthday_employee'];
}
if (isset($_COOKIE['address_employee'])) {
    $address_employee = $_COOKIE['address_employee'];
}
if (isset($_COOKIE['phone_employee'])) {
    $phone_employee = $_COOKIE['phone_employee'];
}
if (isset($_COOKIE['email_employee'])) {
    $email_employee = $_COOKIE['email_employee'];
}
if (isset($_COOKIE['account_employee'])) {
    $account_employee = $_COOKIE['account_employee'];
}
if (isset($_COOKIE['password_employee'])) {
    $password_employee = $_COOKIE['password_employee'];
}
if (isset($_COOKIE['salary_employee'])) {
    $salary_employee = $_COOKIE['salary_employee'];
}

if (isset($_GET['control']) && $_GET['control'] === 'add_employee') {
    $fullname_status = 'fas fa-pencil-alt';
    $address_status  =  'fas fa-pencil-alt';
    $phone_status  =  'fas fa-pencil-alt';
    $email_status  =  'fas fa-pencil-alt';
    $account_status  =  'fas fa-pencil-alt';
    $password_status  =  'fas fa-pencil-alt';
    $salary_status  =  'fas fa-pencil-alt';

    $fullname_color = 'black';
    $address_color = 'black';
    $phone_color = 'black';
    $email_color = 'black';
    $account_color = 'black';
    $password_color = 'black';
    $salary_color = 'black';
}

// Add product

$display_add_product = "none";
$lable_confirm = "none";
$lable_notification = "none";

$name_product = "";
$price_buy_product = "";
$price_sale_product = "";
$count_product = "";
$images_product = "";

if (isset($_COOKIE['name_product'])) {
    $name_product = $_COOKIE['name_product'];
}
if (isset($_COOKIE['price_buy_product'])) {
    $price_buy_product = $_COOKIE['price_buy_product'];
}
if (isset($_COOKIE['price_sale_product'])) {
    $price_sale_product = $_COOKIE['price_sale_product'];
}
if (isset($_COOKIE['count_product'])) {
    $count_product = $_COOKIE['count_product'];
}
if (isset($_COOKIE['images_product'])) {
    $images_product = $_COOKIE['images_product'];
}


if (isset($_GET['control']) && $_GET['control'] === 'add_product') {
    $name_status = 'fas fa-pencil-alt';
    $price_buy_status  =  'fas fa-pencil-alt';
    $price_sale_status  =  'fas fa-pencil-alt';
    $count_status  =  'fas fa-pencil-alt';
    $images_status  =  'fas fa-pencil-alt';

    $name_color = 'black';
    $price_buy_color = 'black';
    $price_sale_color = 'black';
    $count_color = 'black';
    $images_color = 'black';
}

// Hiển thị sản phẩm

$product1 = "";
$product2 = "";
$product3 = "";
$product4 = "";
$product5 = "";
$product6 = "";
$product7 = "";
$product8 = "";
$product9 = "";

// Thông tin đăng nhập:
if (isset($_SESSION['employee_fullname'])) {
    $employee_fullname = $_SESSION['employee_fullname'];
} else {
    $employee_fullname = "";
}

// Số sản phẩm trong giỏ hàng:
$count_in_box = 0;

