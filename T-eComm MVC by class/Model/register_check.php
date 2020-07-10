<?php


function register_process($fullname, $birthday, $address, $phone, $email, $account, $password, $passwordRepeat)
{
    $checkForm = true;
    $register_result = [];
    // check name  
    $checkName = "/^[^0-9\`\~\!\@\#\%\^\&\*\(\)\-\=\_\+\{\}\[\]\\\|\;\:\'\"\,\.\<\>\/\?]+$/";
    $nameError = "";
    if ($fullname === "") {
        $nameError = "* Tên chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkName, $fullname)) {
            $nameError = "* $fullname là tên không hợp lệ!";
            $checkForm = false;
        }
    }
    // check birthday  
    $checkBirthday = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
    $birthdayError = "";
    if ($birthday === "") {
        $birthdayError = "* Ngày sinh chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkBirthday, $birthday)) {
            $birthdayError = "* $birthday là ngày không hợp lệ!";
            $checkForm = false;
        }
    }
    // check address
    $checkAddress = "/^[^\`\~\!\@\#\%\^\&\*\(\)\=\{\}\[\]\\\|\;\:\'\"\<\>\?]+$/";
    $addressError = "";
    if ($address === "") {
        $addressError = "* Địa chỉ chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkAddress, $address)) {
            $addressError = "* $address là địa chỉ không hợp lệ!";
            $checkForm = false;
        }
    }
    // check phone
    $checkPhone = "/^0[0-9]{9}$/";
    $phoneError = "";
    if ($phone === "") {
        $phoneError = "* Số điện thoại chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkPhone, $phone)) {
            $phoneError = "* $phone là số điện thoại không hợp lệ!";
            $checkForm = false;
        }
    }
    // check email
    $checkEmail = "/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/";
    $emailError = "";
    if ($email === "") {
        $emailError = "* Email chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkEmail, $email)) {
            $emailError = "* $email là email không hợp lệ!";
            $checkForm = false;
        }
    }
    // check account
    $checkAccount = "/^[_a-z0-9]{6,20}$/";
    $accountError = "";
    if ($account === "") {
        $accountError = "* Tài khoản chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkAccount, $account)) {
            $accountError = "* $account là tài khoản không hợp lệ!";
            $checkForm = false;
        } else {
            $checkOldAccount = new CRUD_Database;
            $checkOldAccount->connect();
            $row = $checkOldAccount->executeOne("SELECT account_name from accounts where account_name = '$account' ");
            if (isset($row['account_name'])) {
                $accountError = "* $account là tài khoản đã tồn tại!";
                $checkForm = false;
            }
        }
    }
    // check password
    $checkPassword = "/^[a-z0-9]{6,20}$/";
    $passwordError = "";
    if ($password === "") {
        $passwordError = "* Mật khẩu chưa được nhập!";
        $checkForm = false;
    } else {
        if (!preg_match($checkPassword, $password)) {
            $passwordError = "* $password là mật khẩu không hợp lệ!";
            $checkForm = false;
        }
    }
    // check password repeat
    $passwordRepeatError = "";
    if ($passwordRepeat === "") {
        $passwordRepeatError = "* Mật khẩu xác nhận chưa được nhập!";
        $checkForm = false;
    } else {
        if ($passwordRepeat !== $password) {
            if ($password !== "") {
                $passwordRepeatError = "* Mật khẩu xác nhận chưa đúng!";
                $checkForm = false;
            }
        }
    }
    if ($checkForm) {
        $register_result['result'] = "success";
        return $register_result;
    } else {
        $register_result['result'] = "error";
        $register_result['fullname'] = $nameError;
        $register_result['birthday'] = $birthdayError;
        $register_result['address'] = $addressError;
        $register_result['phone'] = $phoneError;
        $register_result['email'] = $emailError;
        $register_result['account'] = $accountError;
        $register_result['password'] = $passwordError;
        $register_result['passwordRepeat'] = $passwordRepeatError;
        return $register_result;
    }
}
