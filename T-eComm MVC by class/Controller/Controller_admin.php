<?php

if (isset($_GET['control'])) {
    switch ($_GET['control']) {
        case 'show_customer_list': {
            $display_list_customer = "block";
            $list_customer = Customer::show_list_customer();
            $table_list_customer = "";
            foreach ($list_customer as $key => $value) {
                $code = $value['customer_code'];
                $name = $value['customer_fullname'];
                $birthday = $value['customer_birthday'];
                $address = $value['customer_address'];
                $phone = $value['customer_phone'];
                $email = $value['customer_email'];
                $account = $value['account_name'];
                $register_day = $value['account_register_day'];
                $status = $value['account_status'];
                $table_list_customer .=
                "
                <tr>
                        <td id='td_list_customer'>$code</td>
                        <td id='td_list_customer'>$name</td>
                        <td id='td_list_customer'>$address</td>
                        <td id='td_list_customer'>$birthday</td>
                        <td id='td_list_customer'>$phone</td>
                        <td id='td_list_customer'>$email</td>
                        <td id='td_list_customer'>$account</td>
                        <td id='td_list_customer'>$register_day</td>
                        <td id='td_list_customer'>$status</td>
                        <td id='td_list_customer'>
                            <div class='edit_delete'>
                                <a href='index.php?router=admin&control=edit_cus&code=$code' id='btn_edit'><i class='far fa-edit'></i></a>
                                <a href='index.php?router=admin&control=delete_cus&code=$code' id='btn_delete'><i class='far fa-trash-alt'></i></a>
                            </div>
                        </td>
                </tr>
                ";
            }
            include('View/admin/Admin.php');
            break;
        }
        case 'show_employee_list': {
                $display_list_employee = "block";
                $list_employee = Employee::show_list_employee();
                $table_list_employee = "";
                foreach ($list_employee as $key => $value) {
                    $code = $value['employee_code'];
                    $name = $value['employee_fullname'];
                    $birthday = $value['employee_birthday'];
                    $address = $value['employee_address'];
                    $phone = $value['employee_phone'];
                    $email = $value['employee_email'];
                    $salary = $value['employee_salary'];
                    $salary = number_format($salary,0,',','.');
                    $join_day = $value['employee_join_day'];
                    $possition = $value['employee_possition'];
                    $account = $value['account_name'];
                    $table_list_employee .=
                    "
                    <tr>
                            <td id='td_list_employee'>$code</td>
                            <td id='td_list_employee'>$name</td>
                            <td id='td_list_employee'>$birthday</td>
                            <td id='td_list_employee'>$address</td>
                            <td id='td_list_employee'>$phone</td>
                            <td id='td_list_employee'>$email</td>
                            <td id='td_list_employee'>$possition</td>
                            <td id='td_list_employee'>$salary đ</td>
                            <td id='td_list_employee'>$join_day</td>
                            <td id='td_list_employee'>$account</td>
                            <td id='th_list_employee'>
                                <div class='edit_delete'>
                                    <a href='index.php?router=admin&control=edit_emp&code=$code' id='btn_edit'><i class='far fa-edit'></i></a>
                                    <a href='index.php?router=admin&control=delete_emp&code=$code' id='btn_delete'><i class='far fa-trash-alt'></i></a>
                                </div>
                            </td>
                    </tr>
                    ";
                }
                include('View/admin/Admin.php');
                break;
            }
            case 'show_product_list': {
                $display_list_product = "block";
                $list_product = Product::show_list_product();
                $table_list_product = "";
                foreach ($list_product as $key => $value) {
                    $code = $value['product_code'];
                    $images = $value['product_images'];
                    $image_array = explode(',', $images);
                    $image = $image_array[0];
                    $name = $value['product_name'];
                    $price_buy = $value['product_price_buy'];
                    $price_buy = number_format($price_buy,0,',','.');
                    $price_sale = $value['product_price_sale'];
                    $price_sale = number_format($price_sale,0,',','.');
                    $status = $value['product_status'];
                    $line = $value['product_line_name'];
                    $ware = $value['warehouse_name'];
                    $count = $value['product_count'];
                    $day_in = $value['warehosing_day'];
                    $table_list_product .=
                    "
                    <tr>
                            <td id='td_list_product'>$code</td>
                            <td id='td_list_product'><img id='img_list_product' src='$image'></td>
                            <td id='tb_product_name'>$name</td>
                            <td id='td_list_product'>$price_buy đ</td>
                            <td id='td_list_product'>$price_sale đ</td>
                            <td id='td_list_product'>$status</td>
                            <td id='td_list_product'>$line</td>
                            <td id='td_list_product'>$ware</td>
                            <td id='td_list_product'>$count</td>
                            <td id='td_list_product'>$day_in</td>
                            <td id='td_list_product'>
                                <div class='edit_delete'>
                                    <a href='index.php?router=admin&control=edit_prod&code=$code' id='btn_edit'><i class='far fa-edit'></i></a>
                                    <a href='index.php?router=admin&control=delete_prod&code=$code' id='btn_delete'><i class='far fa-trash-alt'></i></a>
                                </div>
                            </td>    
                    </tr>
                    ";
                }
                include('View/admin/Admin.php');
                break;
            }
        case 'logout': {
                $hiUser = "";
                $log_in = "block;";
                $log_out = "none;";
                session_destroy();
                include('Model/get_product_data.php');
                include('View/home_page.php');
                break;
            }
        case 'add_employee': {
                $display_add_employee = 'block';
                include('View/admin/Admin.php');
                break;
            }
        case 'add_product': {
                $display_add_product = 'block';
                include('View/admin/Admin.php');
                break;
            }
            // case 'account': {
            //         include('Controller/Controller_account.php');
            //         break;
            //     }
    }
} else {
    if (isset($_POST['control'])) {
        switch ($_POST['control']) {
            case 'require_add_employee': {
                    $display_add_employee = 'block';
                    $check_new_employee = check_new_employee(
                        $fullname_employee,
                        $birthday_employee,
                        $address_employee,
                        $phone_employee,
                        $email_employee,
                        $account_employee,
                        $password_employee,
                        $salary_employee
                    );
                    if ($check_new_employee['result'] === "success") {
                        $fullname_status = 'fas fa-check';
                        $birthday_status  =  "fas fa-check";
                        $address_status  =  "fas fa-check";
                        $phone_status  =  "fas fa-check";
                        $email_status  =  "fas fa-check";
                        $account_status  =  "fas fa-check";
                        $password_status  =  "fas fa-check";
                        $salary_status  =  "fas fa-check";
                        $fullname_color = 'green';
                        $birthday_color = 'green';
                        $address_color = 'green';
                        $phone_color = 'green';
                        $email_color = 'green';
                        $account_color = 'green';
                        $password_color = 'green';
                        $salary_color = 'green';
                        $lable_confirm = "block";
                        $employee = new Employee(
                            $fullname_employee,
                            $birthday_employee,
                            $address_employee,
                            $phone_employee,
                            $email_employee,
                            $account_employee,
                            $password_employee,
                            $possition_employee,
                            $salary_employee
                        );
                        $employee->add_employee();
                    }
                    if ($check_new_employee['result'] === "error") {
                        $fullname_status =  $check_new_employee['fullname'];
                        if ($check_new_employee['fullname'] === 'fas fa-check') {
                            $fullname_color = 'green';
                        }
                        if ($check_new_employee['fullname'] === 'fas fa-times') {
                            $fullname_color = 'red';
                        }
                        $birthday_status  =  $check_new_employee['birthday'];
                        if ($check_new_employee['birthday'] === 'fas fa-check') {
                            $birthday_color = 'green';
                        }
                        if ($check_new_employee['birthday'] === 'fas fa-times') {
                            $birthday_color = 'red';
                        }
                        $address_status  =  $check_new_employee['address'];
                        if ($check_new_employee['address'] === 'fas fa-check') {
                            $address_color = 'green';
                        }
                        if ($check_new_employee['address'] === 'fas fa-times') {
                            $address_color = 'red';
                        }
                        $phone_status  =  $check_new_employee['phone'];
                        if ($check_new_employee['phone'] === 'fas fa-check') {
                            $phone_color = 'green';
                        }
                        if ($check_new_employee['phone'] === 'fas fa-times') {
                            $phone_color = 'red';
                        }
                        $email_status  =  $check_new_employee['email'];
                        if ($check_new_employee['email'] === 'fas fa-check') {
                            $email_color = 'green';
                        }
                        if ($check_new_employee['email'] === 'fas fa-times') {
                            $email_color = 'red';
                        }
                        $account_status  =  $check_new_employee['account'];
                        if ($check_new_employee['account'] === 'fas fa-check') {
                            $account_color = 'green';
                        }
                        if ($check_new_employee['account'] === 'fas fa-times') {
                            $account_color = 'red';
                        }
                        $password_status  =  $check_new_employee['password'];
                        if ($check_new_employee['password'] === 'fas fa-check') {
                            $password_color = 'green';
                        }
                        if ($check_new_employee['password'] === 'fas fa-times') {
                            $password_color = 'red';
                        }
                        $salary_status  =  $check_new_employee['salary'];
                        if ($check_new_employee['salary'] === 'fas fa-check') {
                            $salary_color = 'green';
                        }
                        if ($check_new_employee['salary'] === 'fas fa-times') {
                            $salary_color = 'red';
                        }
                    }
                    include('View/admin/Admin.php');
                    break;
                }
            case 'require_add_product': {
                    $display_add_product = 'block';
                    $check_new_product = check_new_product(
                        $name_product,
                        $price_buy_product,
                        $price_sale_product,
                        $count_product,
                        $images_product
                    );
                    if ($check_new_product['result'] === "success") {
                        $name_status = 'fas fa-check';
                        $price_buy_status  =  "fas fa-check";
                        $price_sale_status  =  "fas fa-check";
                        $count_status  =  "fas fa-check";
                        $images_status  =  "fas fa-check";

                        $name_color = 'green';
                        $price_buy_color = 'green';
                        $price_sale_color = 'green';
                        $count_color = 'green';
                        $images_color = 'green';

                        $product = new Product(
                            $name_product,
                            $price_buy_product,
                            $price_sale_product,
                            $images_product,
                            $count_product,
                            $line_product,
                            $warehouse_product,
                            $is_hot_product,
                            $is_new_product
                        );
                        $product->add_product();

                        $lable_confirm = "block";
                    }
                    if ($check_new_product['result'] === "exist") {
                        $name_status = 'fas fa-times';
                        $name_color = 'red';

                        $price_buy_status  =  'fas fa-pencil-alt';
                        $price_sale_status  =  'fas fa-pencil-alt';
                        $count_status  =  'fas fa-pencil-alt';
                        $images_status  =  'fas fa-pencil-alt';

                        $price_buy_color = 'black';
                        $price_sale_color = 'black';
                        $count_color = 'black';
                        $images_color = 'black';

                        $lable_notification = "block";
                    }
                    if ($check_new_product['result'] === "error") {

                        $name_status =  $check_new_product['name'];
                        if ($check_new_product['name'] === 'fas fa-check') {
                            $name_color = 'green';
                        }
                        if ($check_new_product['name'] === 'fas fa-times') {
                            $name_color = 'red';
                        }

                        $price_buy_status  =  $check_new_product['price_buy'];
                        if ($check_new_product['price_buy'] === 'fas fa-check') {
                            $price_buy_color = 'green';
                        }
                        if ($check_new_product['price_buy'] === 'fas fa-times') {
                            $price_buy_color = 'red';
                        }

                        $price_sale_status  =  $check_new_product['price_sale'];
                        if ($check_new_product['price_sale'] === 'fas fa-check') {
                            $price_sale_color = 'green';
                        }
                        if ($check_new_product['price_sale'] === 'fas fa-times') {
                            $price_sale_color = 'red';
                        }

                        $count_status  =  $check_new_product['count'];
                        if ($check_new_product['count'] === 'fas fa-check') {
                            $count_color = 'green';
                        }
                        if ($check_new_product['count'] === 'fas fa-times') {
                            $count_color = 'red';
                        }

                        $images_status  =  $check_new_product['images'];
                        if ($check_new_product['images'] === 'fas fa-check') {
                            $images_color = 'green';
                        }
                        if ($check_new_product['images'] === 'fas fa-times') {
                            $images_color = 'red';
                        }
                    }
                    include('View/admin/Admin.php');
                    break;
                }
        }
    } else {
        include('View/admin/Admin.php');
    }
}
