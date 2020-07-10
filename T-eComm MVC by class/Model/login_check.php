<?php

function login_process($account, $password)
{
    if($account === "" || $password === ""){
        $error_login = "Chưa đủ thông tin đăng nhập!";
        $status_login = "error";
        $arrayResult[] = $status_login;
        $arrayResult[] = $error_login;
        return $arrayResult;
    }
    $password = MD5($password);
    $arrayResult = [];
    $checkAccount = new CRUD_Database();
    $checkAccount->connect();
    $result = $checkAccount->executeOne("SELECT account_code, account_name, account_password FROM accounts WHERE account_name = '$account' ");
    if (isset($result['account_name'])) {
        if ($result['account_name'] === $account && $result['account_password'] === $password) {
            $codeUser = $result['account_code'];
            $checkName = new CRUD_Database();
            $checkName->connect();
            $rowCustomer = $checkName->executeOne("SELECT customer_fullname, customer_code from customers where Accounts_account_code = '$codeUser' ");
            $hiUser = "Xin chào, " . $rowCustomer['customer_fullname'];
            $_SESSION['customer_code'] = $rowCustomer['customer_code'];
            $status_login = "success";
            $arrayResult[] = $status_login;
            $arrayResult[] = $hiUser;
        } else {
            $error_login = "Mật khẩu bạn nhập sai!";
            $status_login = "error";
            $arrayResult[] = $status_login;
            $arrayResult[] = $error_login;
        }
    } else {
        $error_login = "Tài khoản của bạn chưa tồn tại!";
        $status_login = "error";
        $arrayResult[] = $status_login;
        $arrayResult[] = $error_login;
    }
    return $arrayResult;
}