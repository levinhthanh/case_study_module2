<?php


if (!isset($_GET['router']) && !isset($_POST['router'])) {
    if (isset($_POST['control'])) {
        switch ($_POST['control']) {
            case 'login_require': {
                    if ($account === 'admin' && $password === 'levinhthanh') {
                        include('View/admin/Admin.php');
                        break;
                    } else {
                        if ($account !== '' && $account[0] === '$') {
                            $arrayResult = login_process($account, $password, 'employee');
                            if ($arrayResult[0] === 'success') {
                                $employee_fullname = $_SESSION['employee_fullname'];
                                include('View/employee/employee.php');
                                break;
                            }
                            if ($arrayResult[0] === 'error') {
                                $error_login = $arrayResult[1];
                                include("View/login_page.php");
                                break;
                            }
                        } else {
                            $arrayResult = login_process($account, $password, 'customer');
                            if ($arrayResult[0] === 'success') {
                                $hiUser = $arrayResult[1];
                                $_SESSION['hiUser'] = $hiUser;
                                $log_in = "none;";
                                $log_out = "block;";
                                if(isset($_SESSION["count_in_box"])) {
                                    $count_in_box = $_SESSION['count_in_box'];
                                }
                                include('Model/get_product_data.php');
                                include('View/home_page.php');
                                break;
                            }
                            if ($arrayResult[0] === 'error') {
                                $error_login = $arrayResult[1];
                                include("View/login_page.php");
                                break;
                            }
                        }
                    }
                }
        }
    } else {
        if (isset($_GET['control'])) {
            switch ($_GET['control']) {
                case 'login': {
                        $error_login = "";
                        include('View/login_page.php');
                        break;
                    }
            }
        } else {
            //Kiểm tra phiên đăng nhập:
            if (isset($_SESSION['account']) && isset($_SESSION['password'])) {
                if (isset($_GET['control']) && $_GET['control'] === 'logout') {
                } else {
                    $account = $_SESSION['account'];
                    $password = $_SESSION['password'];
                    if ($account === 'admin' && $password === 'levinhthanh') {
                        include('View/admin/Admin.php');
                    } else {
                        if ($account !== '' && $account[0] === '$') {
                            $employee_fullname = $_SESSION['employee_fullname'];
                            include('View/employee/employee.php');
                        } else {
                            if(isset($_SESSION["count_in_box"])) {
                                $count_in_box = $_SESSION['count_in_box'];
                            }
                            include('Model/get_product_data.php');
                            include('View/home_page.php');
                        }
                    }
                }
            }
            // Vào web lần đầu:
            else {
                if(isset($_SESSION["count_in_box"])) {
                    $count_in_box = $_SESSION['count_in_box'];
                }
                include('Model/get_product_data.php');
                include('View/home_page.php');
            }
        }
    }
} else {
    if (isset($_GET['router'])) {
        $router = $_GET['router'];
        switch ($router) {
            case 'customer': {
                    include('Controller/Controller_customer.php');
                    break;
                }
            case 'admin': {
                    include('Controller/Controller_admin.php');
                    break;
                }
            case 'employee': {
                    include('Controller/Controller_employee.php');
                    break;
                }
        }
    } else //isset($_POST['router'])
    {
        $router = $_POST['router'];
        switch ($router) {
            case 'customer': {
                    include('Controller/Controller_customer.php');
                    break;
                }
            case 'admin': {
                    include('Controller/Controller_admin.php');
                    break;
                }
            case 'employee': {
                    include('Controller/Controller_employee.php');
                    break;
                }
        }
    }
}
