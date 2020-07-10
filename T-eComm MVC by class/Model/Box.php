<?php

class Box
{
    public $customer_code;
    public $product_code;
    public $product_count;
    public $product_price;
    public $sum_price;
    public $box_status;

    public function __construct(
        $customer_code,
        array $product_code,
        array $product_count,
        array $product_price,
        $box_status
    ) {
        $this->customer_code = $customer_code;
        $this->product_code = $product_code;
        $this->product_count = $product_count;
        $this->product_price = $product_price;
        $this->box_status = $box_status;
    }
    public static function save_box()
    {
        // Save to Bills
        $payment_way = $_SESSION['payment_way'];
        $sum_money = (float) $_SESSION['sum_money'];
        $box_fullname = $_SESSION['box_fullname'];
        $box_phone = $_SESSION['box_phone'];
        $box_email = $_SESSION['box_email'];
        $box_address = $_SESSION['box_address'];
        $customer_code = (int) $_SESSION['customer_code'];

        $sql = "INSERT INTO bills (bill_create_day, bill_total_money, bill_payment_way,
        bill_fullname, bill_phone, bill_email, bill_address, customer_code) values (NOW(),?,?,?,?,?,?,?)";
        $data = array("$sum_money", "$payment_way", "$box_fullname", "$box_phone", "$box_email", "$box_address", "$customer_code");
        $save_bill = new CRUD_Database;
        $save_bill->connect();
        $save_bill->insertData($sql, $data);
        // Save to Bill_details
        $get_bill_code = new CRUD_Database;
        $get_bill_code->connect();
        $row_bill_code = $get_bill_code->executeAll("SELECT bill_code FROM bills WHERE customer_code = '$customer_code'");
        foreach ($row_bill_code as $key => $value) {
            $bill_code = (int) $value['bill_code'];
        }
        for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
            $name = $_SESSION["product_name_$i"];
            $count = (int) $_SESSION["product_count_$i"];
            $price = (float) $_SESSION["product_price_$i"];
            $data = array("$name", "$count", "$price", "$bill_code");
            $sql = "INSERT INTO bill_details(bill_product_name, bill_product_count, bill_product_price, bill_code) VALUES (?,?,?,?)";
            $save_bill_detail = new CRUD_Database;
            $save_bill_detail->connect();
            $save_bill_detail->insertData($sql, $data);
        }
        // Xóa dữ liệu giỏ hàng:
        for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
            unset($_SESSION["product_code_$i"]);
            unset($_SESSION["product_count_$i"]);
            unset($_SESSION["product_name_$i"]);
            unset($_SESSION["product_price_$i"]);
        }
        if (isset($_SESSION["product_code"])) {
            unset($_SESSION["product_code"]);
        }
    }
}
