<?php

class Customer
{
    public $customer_code;
    public $customer_fullname;
    public $customer_birthday;
    public $customer_address;
    public $customer_phone;
    public $customer_email;
    public $customer_account;
    public $customer_password;
    public $customer_register_day;
    public $customer_is_familiar;

    public function __construct($fullname, $birthday, $address, $phone, $email, $account, $password) {
        $this->customer_code = NULL;
        $this->customer_fullname = $fullname;
        $this->customer_birthday = $birthday;
        $this->customer_address = $address;
        $this->customer_phone = $phone;
        $this->customer_email = $email;
        $this->customer_account = $account;
        $this->customer_password = $password;
        $this->customer_register_day = NULL;
        $this->customer_is_familiar = 'False';
    }

    public static function edit_customer($customer_code){
        $get_account_code = new CRUD_Database;
        $get_account_code->connect();
        $sql = "SELECT Accounts_account_code FROM customers WHERE customer_code = $customer_code";
        $row = $get_account_code->executeOne($sql);
        $account_code = $row['Accounts_account_code'];
        $account_code = (int)$account_code;

        $get_account_status = new CRUD_Database;
        $get_account_status->connect();
        $sql = "SELECT account_status FROM accounts WHERE account_code = $account_code";
        $row = $get_account_status->executeOne($sql);
        $account_status = $row['account_status'];

        if($account_status === 'Open'){
            $edit_status = new CRUD_Database;
            $edit_status->connect();
            $sql = "UPDATE accounts SET account_status = 'Banned' WHERE account_code = '$account_code'";
            $edit_status->updateData($sql);
        }

        if($account_status === 'Banned'){
            $edit_status = new CRUD_Database;
            $edit_status->connect();
            $sql = "UPDATE accounts SET account_status = 'Open' WHERE account_code ='$account_code'";
            $edit_status->updateData($sql);
        }
    }

    public static function delete_customer($customer_code){
        $get_account_code = new CRUD_Database;
        $get_account_code->connect();
        $sql = "SELECT Accounts_account_code FROM customers WHERE customer_code = $customer_code";
        $row = $get_account_code->executeOne($sql);
        $account_code = $row['Accounts_account_code'];

        $delete_customer = new CRUD_Database;
        $delete_customer->connect();
        $sql = "DELETE FROM customers WHERE customer_code = $customer_code";
        $delete_customer->deleteData($sql);

        $delete_account = new CRUD_Database;
        $delete_account->connect();
        $sql = "DELETE FROM accounts WHERE account_code = $account_code";
        $delete_account->deleteData($sql);
    }

    public static function show_list_customer(){
        $list_customer = new CRUD_Database;
        $list_customer->connect();
        $sql = "SELECT * FROM list_customers";
        $list = $list_customer->executeAll($sql);
        return $list;
    }

    public static function watch_product_line($view){
        $get_product = new CRUD_Database;
        $get_product->connect();
        $products = $get_product->executeAll("SELECT * FROM $view");
        return $products;
    }
    public function register_account()
    {
        $fullname = $this->customer_fullname;
        $birthday = $this->customer_birthday;
        $address = $this->customer_address;
        $phone = $this->customer_phone;
        $email = $this->customer_email;
        $account = $this->customer_account;
        $password = $this->customer_password;
        // save account
        $password = MD5($password);
        $data = array("$account", "$password");
        $sql = 'INSERT INTO accounts (account_name, account_password, account_register_day) values (?,?,NOW())';
        $addAccount = new CRUD_Database;
        $addAccount->connect();
        $addAccount->insertData($sql, $data);
        // save customer
        $account_code = new CRUD_Database;
        $account_code->connect();
        $row = $account_code->executeOne("SELECT account_code, account_register_day FROM accounts WHERE account_name = '$account'");
        if (isset($row['account_code'])) {
            $this->customer_code = $row['account_code'];
            $this->customer_register_day = $row['account_register_day'];
            $customer_account_code = $row['account_code'];
        }
        $d = substr($birthday, 0, 2);
        $m = substr($birthday, 3, 2);
        $y = substr($birthday, 6, 4);
        $birthdayNew = $m . "/" . $d . "/" . $y;
        $birthdayNew = strtotime("$birthdayNew");
        $birthdayNew = date('Y-m-d', $birthdayNew);
        $dataCustomer = array("$fullname", "$birthdayNew", "$address", "$phone", "$email", "$customer_account_code");
        $sqlCustomer = 'INSERT INTO customers (customer_fullname, customer_birthday, customer_address,
        customer_phone,customer_email,Accounts_account_code) values (?,?,?,?,?,?)';
        $addCustomer = new CRUD_Database;
        $addCustomer->connect();
        $addCustomer->insertData($sqlCustomer, $dataCustomer);
    }
}
