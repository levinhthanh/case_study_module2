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

    public static function delete_employee($employee_code){
        $get_account_code = new CRUD_Database;
        $get_account_code->connect();
        $sql = "SELECT Accounts_account_code FROM employees WHERE employee_code = '$employee_code'";
        $row = $get_account_code->executeOne($sql);
        $account_code = $row['Accounts_account_code'];

        $delete_employee = new CRUD_Database;
        $delete_employee->connect();
        $sql = "DELETE FROM employees WHERE employee_code = '$employee_code';";
        $delete_employee->deleteData($sql);

        $delete_account = new CRUD_Database;
        $delete_account->connect();
        $sql = "DELETE FROM accounts WHERE account_code = '$account_code';";
        $delete_account->deleteData($sql);
    }

    public static function update_employee(
        $employee_code,
        $name_employee_update,
        $birthday_employee_update,
        $address_employee_update,
        $phone_employee_update,
        $email_employee_update,
        $salary_employee_update,
        $join_day_employee_update,
        $possition_employee_update,
        $account_employee_update
    ) {
        
        $update_employee = new CRUD_Database;
        $update_employee->connect();
        $sql = "UPDATE employees SET 
        employee_fullname = '$name_employee_update',
        employee_birthday = '$birthday_employee_update',
        employee_address = '$address_employee_update',
        employee_phone = '$phone_employee_update',
        employee_email = '$email_employee_update',
        employee_join_day = '$join_day_employee_update',
        employee_salary = '$salary_employee_update',
        employee_possition = '$possition_employee_update'
        WHERE employee_code = '$employee_code'
        ";
        $update_employee->updateData($sql);

        $get_account_code = new CRUD_Database;
        $get_account_code->connect();
        $sql = "SELECT Accounts_account_code FROM employees WHERE employee_code = $employee_code ";
        $row = $get_account_code->executeOne($sql);
        $account_code = $row['Accounts_account_code'];
        $account_code = (int)$account_code;
        $update_account = new CRUD_Database;
        $update_account->connect();
        $sql = "UPDATE accounts SET account_name = '$account_employee_update' WHERE account_code = '$account_code'";
        $update_account->updateData($sql);
    }

    public static function edit_employee_table($one_employee)
    {
        $table_one_employee = "";
        // Thông tin nhân viên
        $name = $one_employee['employee_fullname'];
        $birthday = $one_employee['employee_birthday'];
        $address = $one_employee['employee_address'];
        $phone = $one_employee['employee_phone'];
        $email = $one_employee['employee_email'];
        $salary_ss = $one_employee['employee_salary'];
        $salary = number_format($salary_ss, 0, ',', '.');
        $join_day = $one_employee['employee_join_day'];
        $possition = $one_employee['employee_possition'];
        $account = $one_employee['account_name'];

        $table_one_employee .=
            "
                <tr>
                    <td id='td_edit_employee'>Tên nhân viên</td>
                    <td id='td_edit_employee'>$name</td>
                    <td id='td_edit_employee'>
                    <input type='text' name='name_employee_update' value='$name'>
                    </td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Ngày sinh</td>
                    <td id='td_edit_employee'>$birthday</td>
                    <td id='td_edit_employee'><input type='date' name='birthday_employee_update' value='$birthday'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Địa chỉ</td>
                    <td id='td_edit_employee'>$address</td>
                    <td id='td_edit_employee'><input type='text' name='address_employee_update' value='$address'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Số điện thoại</td>
                    <td id='td_edit_employee'>$phone</td>
                    <td id='td_edit_employee'><input type='text' name='phone_employee_update' value='$phone'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Email</td>
                    <td id='td_edit_employee'>$email</td>
                    <td id='td_edit_employee'><input type='text' name='email_employee_update' value='$email'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Lương</td>
                    <td id='td_edit_employee'>$salary đ</td>
                    <td id='td_edit_employee'><input type='text' name='salary_employee_update' value='$salary_ss'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Ngày gia nhập</td>
                    <td id='td_edit_employee'>$join_day</td>
                    <td id='td_edit_employee'><input type='date' name='join_day_employee_update' value='$join_day'></td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Chức vụ</td>
                    <td id='td_edit_employee'>$possition</td>
                    <td id='td_edit_employee'>
                       <select name='possition_employee_update'>
                          <option value='Nhân viên kinh doanh'>Nhân viên kinh doanh</option>
                          <option value='Quản lý bán hàng'>Quản lý bán hàng</option>
                          <option value='Nhân viên đóng gói'>Nhân viên đóng gói</option>
                          <option value='Nhân viên IT'>Nhân viên IT</option>
                       </select>
                    </td>
                </tr>
                <tr>
                    <td id='td_edit_employee'>Tài khoản</td>
                    <td id='td_edit_employee'>$account</td>
                    <td id='td_edit_employee'><input type='text' name='account_employee_update' value='$account'></td>
                </tr>
                ";
        return $table_one_employee;
    }

    public static function show_list_employee()
    {
        $list_employee = new CRUD_Database;
        $list_employee->connect();
        $sql = "SELECT * FROM list_employees";
        $list = $list_employee->executeAll($sql);
        return $list;
    }

    public static function show_one_employee($employee_code)
    {
        $list_employee = new CRUD_Database;
        $list_employee->connect();
        $sql = "SELECT * FROM list_employees WHERE employee_code = $employee_code";
        $list = $list_employee->executeOne($sql);
        return $list;
    }

    public function add_employee()
    {
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
        $dataEmployee = array(
            "$fullname", "$birthday", "$address", "$phone", "$email", "$possition", "$salary",
            "$employee_join_day", "$employee_account_code"
        );
        $sqlEmployee = 'INSERT INTO employees (employee_fullname, employee_birthday, employee_address,
        employee_phone, employee_email, employee_possition,
        employee_salary, employee_join_day, Accounts_account_code) values (?,?,?,?,?,?,?,?,?)';
        $addEmployee = new CRUD_Database;
        $addEmployee->connect();
        $addEmployee->insertData($sqlEmployee, $dataEmployee);
    }

    public function export_bill()
    {
    }

    public function print_bill()
    {
    }

    public function send_product()
    {
    }
}
