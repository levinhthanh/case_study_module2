<?php
// Khai báo
include('Model/declare.php');
include('Model/CRUD_Database.php');
include('Model/register_check.php');
include('Model/Customer.php');
include('Model/change_password.php');
include('Model/login_check.php');
include('Model/admin/validate_new_empoyee.php');
include('Model/Employee.php');
include('Model/admin/validate_new_product.php');
include('Model/Product.php');
include('Model/Comment.php');
include('Model/Box.php');
include('Model/convert_money_to_string.php');


// Nhận dữ liệu
include('Model/receive_data.php');
// Chương trình
include('Controller/Router.php');



?>