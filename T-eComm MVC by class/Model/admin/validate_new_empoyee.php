<?php



function check_update_employee($employee_code, $fullname, $address, $phone, $email, $account, $salary)
{
    $checkForm = true;
    $register_result = [];
    // get account_name from employee_code
    $get = new CRUD_Database;
    $get->connect();
    $sql = "SELECT account_name FROM list_employees WHERE employee_code = $employee_code";
    $row = $get->executeOne($sql);
    $current_account = $row['account_name'];
    // check name  
    $checkName = "/^[^0-9\`\~\!\@\#\%\^\&\*\(\)\-\=\_\+\{\}\[\]\\\|\;\:\'\"\,\.\<\>\/\?]+$/";
    if ($fullname === "" || !preg_match($checkName, $fullname)) {
        $checkForm = false;
    }
    // check salary 
    $checkSalary = "/^[0-9]+$/";
    if ($salary === "" || !preg_match($checkSalary, $salary)) {
        $checkForm = false;
    }
    // check address
    $checkAddress = "/^[^\`\~\!\@\#\%\^\&\*\(\)\=\{\}\[\]\\\|\;\:\'\"\<\>\?]+$/";
    if ($address === "" || !preg_match($checkAddress, $address)) {
        $checkForm = false;
    }
    // check phone
    $checkPhone = "/^0[0-9]{9}$/";
    if ($phone === "" || !preg_match($checkPhone, $phone)) {
        $checkForm = false;
    }
    // check email
    $checkEmail = "/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/";
    if ($email === "" || !preg_match($checkEmail, $email)) {
        $checkForm = false;
    }
    // check account
    $checkAccount = "/^[$]{1}[A-Z]{1}[0-9]{4}$/";
    if ($account === "" || ($account !== "" && $account[0] !== "$") || !preg_match($checkAccount, $account)) {
        $checkForm = false;
    } else {
        $checkOldAccount = new CRUD_Database;
        $checkOldAccount->connect();
        $row = $checkOldAccount->executeOne("SELECT account_name from accounts where account_name = '$account' ");
        if (isset($row['account_name']) && $row['account_name'] !== $current_account) {
            $checkForm = false;
        }
    }

    if ($checkForm) {
        $register_result['result'] = "success";
    } else {
        $register_result['result'] = "error";  
    }
    return $register_result;
}













function check_new_employee($fullname, $address, $phone, $email, $account, $password, $salary)
{
    $checkForm = true;
    $register_result = [];
    // check name  
    $checkName = "/^[^0-9\`\~\!\@\#\%\^\&\*\(\)\-\=\_\+\{\}\[\]\\\|\;\:\'\"\,\.\<\>\/\?]+$/";
    $fullname_status = 'fas fa-check';
    if ($fullname === "" || !preg_match($checkName, $fullname)) {
        $fullname_status = 'fas fa-times';
        $checkForm = false;
    }
    // check salary 
    $checkSalary = "/^[0-9]+$/";
    $salary_status = 'fas fa-check';
    if ($salary === "" || !preg_match($checkSalary, $salary)) {
        $salary_status = 'fas fa-times';
        $checkForm = false;
    }
    // check address
    $checkAddress = "/^[^\`\~\!\@\#\%\^\&\*\(\)\=\{\}\[\]\\\|\;\:\'\"\<\>\?]+$/";
    $address_status = 'fas fa-check';
    if ($address === "" || !preg_match($checkAddress, $address)) {
        $address_status = 'fas fa-times';
        $checkForm = false;
    }
    // check phone
    $checkPhone = "/^0[0-9]{9}$/";
    $phone_status = 'fas fa-check';
    if ($phone === "" || !preg_match($checkPhone, $phone)) {
        $phone_status = 'fas fa-times';
        $checkForm = false;
    }
    // check email
    $checkEmail = "/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/";
    $email_status = 'fas fa-check';
    if ($email === "" || !preg_match($checkEmail, $email)) {
        $email_status = 'fas fa-times';
        $checkForm = false;
    }
    // check account
    $checkAccount = "/^[$]{1}[A-Z]{1}[0-9]{4}$/";
    $account_status = 'fas fa-check';
    if ($account === "" || ($account !== "" && $account[0] !== "$") || !preg_match($checkAccount, $account)) {
        $account_status = 'fas fa-times';
        $checkForm = false;
    } else {
        $checkOldAccount = new CRUD_Database;
        $checkOldAccount->connect();
        $row = $checkOldAccount->executeOne("SELECT account_name from accounts where account_name = '$account' ");
        if (isset($row['account_name'])) {
            $account_status = 'fas fa-times';
            $checkForm = false;
        }
    }
    // check password
    $checkPassword = "/^[a-z0-9]{6,20}$/";
    $password_status = 'fas fa-check';
    if ($password === "" || !preg_match($checkPassword, $password)) {
        $password_status = 'fas fa-times';
        $checkForm = false;
    }

    if ($checkForm) {
        $register_result['result'] = "success";
        return $register_result;
    } else {
        $register_result['result'] = "error";
        $register_result['fullname'] = $fullname_status;
        $register_result['address'] = $address_status;
        $register_result['phone'] = $phone_status;
        $register_result['email'] = $email_status;
        $register_result['account'] = $account_status;
        $register_result['password'] = $password_status;
        $register_result['salary'] = $salary_status;
        return $register_result;
    }
}

