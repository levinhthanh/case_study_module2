<?php

function change_password($account, $old_password, $new_password, $confirm_password)
{
    if($old_password === "" || $new_password === "" || $confirm_password === ""){
        $array_result = ['error', '* Bạn chưa nhập đầy đủ thông tin!'];
        return $array_result;
    }
    $check_password = new CRUD_Database;
    $check_password->connect();
    $result = $check_password->executeOne("SELECT account_code, account_name, account_password FROM accounts WHERE account_name='$account' ");
    if (isset($result['account_name'])) {
        if ($result['account_password'] === md5($old_password)) {
            if ($new_password === $confirm_password) {
                $change_password = new CRUD_Database;
                $change_password->connect();
                $account_code = $result['account_code'];
                $new_password = md5($new_password);
                $sql_update = "UPDATE accounts SET account_password = '$new_password' WHERE account_code = '$account_code';";
                $change_password->updateData($sql_update);
                $array_result = ['success'];
                return $array_result;
            } else {
                $array_result = ['error', '* Mật khẩu xác nhận không đúng!'];
                return $array_result;
            }
        } else {
            $array_result = ['error', '* Mật khẩu hiện tại không đúng!'];
            return $array_result;
        }
    } else {
        $array_result = ['error', '* Tài khoản không tồn tại'];
        return $array_result;
    }
}