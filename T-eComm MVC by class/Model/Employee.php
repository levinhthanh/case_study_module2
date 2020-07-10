<?php

class Employee
{
    public $employee_code;
    public $employee_fullname;
    public $employee_birthday;
    public $employee_address;
    public $employee_phone;
    public $employee_email;
    public $employee_account;
    public $employee_password;
    public $employee_join_day;
    public $employee_possition;
    public $employee_salary;

    public function __construct($fullname, $birthday, $address, $phone, $email, $account, $password, $possition, $salary)
    {
        $this->employee_code = NULL;
        $this->employee_fullname = $fullname;
        $this->employee_birthday = $birthday;
        $this->employee_address = $address;
        $this->employee_phone = $phone;
        $this->employee_email = $email;
        $this->employee_account = $account;
        $this->employee_password = $password;
        $this->employee_join_day = NULL;
        $this->employee_possition = $possition;
        $this->employee_salary = $salary;
    }
    
    public static function show_list_employee(){
        $list_employee = new CRUD_Database;
        $list_employee->connect();
        $sql = "SELECT * FROM list_employees";
        $list = $list_employee->executeAll($sql);
        return $list;
    }

    public function add_employee(){
        $fullname = $this->employee_fullname;
        $birthday = $this->employee_birthday;
        $address = $this->employee_address;
        $phone = $this->employee_phone;
        $email = $this->employee_email;
        $account = $this->employee_account;
        $password = $this->employee_password;
        $possition = $this->employee_possition;
        $salary = $this->employee_salary;
        // save account
        $password = MD5($password);
        $data = array("$account", "$password", 'False');
        $sql = 'INSERT INTO accounts (account_name, account_password, account_is_customer, account_register_day) values (?,?,?,NOW())';
        $addAccount = new CRUD_Database;
        $addAccount->connect();
        $addAccount->insertData($sql, $data);
        // save employee
        $account_code = new CRUD_Database;
        $account_code->connect();
        $row = $account_code->executeOne("SELECT account_code, account_register_day FROM accounts WHERE account_name = '$account'");
        if (isset($row['account_code'])) {
            $this->employee_code = $row['account_code'];
            $this->employee_join_day = $row['account_register_day'];
            $employee_account_code = $this->employee_code;
            $employee_join_day = $this->employee_join_day;
        }
        $d = substr($birthday, 0, 2);
        $m = substr($birthday, 3, 2);
        $y = substr($birthday, 6, 4);
        $birthdayNew = $m . "/" . $d . "/" . $y;
        $birthdayNew = strtotime("$birthdayNew");
        $birthdayNew = date('Y-m-d', $birthdayNew);
        $dataEmployee = array("$fullname", "$birthdayNew", "$address", "$phone", "$email", "$possition", "$salary",
        "$employee_join_day","$employee_account_code");
        $sqlEmployee = 'INSERT INTO employees (employee_fullname, employee_birthday, employee_address,
        employee_phone, employee_email, employee_possition,
        employee_salary, employee_join_day, Accounts_account_code) values (?,?,?,?,?,?,?,?,?)';
        $addEmployee = new CRUD_Database;
        $addEmployee->connect();
        $addEmployee->insertData($sqlEmployee, $dataEmployee);
    }

    public function export_bill(){

    }

    public function print_bill(){

    }

    public function send_product(){

    }
   
}

?>