<?php

class Product
{
    public $product_code;
    public $product_name;
    public $product_price_buy;
    public $product_price_sale;
    public $product_images;
    public $product_status;
    public $product_line;
    public $product_warehouse;
    public $product_is_hot;
    public $product_is_new;

    public function __construct($name, $price_buy, $price_sale, $images, $count, $line, $warehouse, $is_hot, $is_new)
    {
        $this->product_code = NULL;
        $this->product_name = $name;
        $this->product_price_buy = $price_buy;
        $this->product_price_sale = $price_sale;
        $this->product_images = $images;
        $this->product_count = $count;
        $this->product_line = $line;
        $this->product_warehouse = $warehouse;
        $this->product_is_hot = $is_hot;
        $this->product_is_new = $is_new;
    }

    public static function show_list_product(){
        $list_product = new CRUD_Database;
        $list_product->connect();
        $sql = "SELECT * FROM list_products";
        $list = $list_product->executeAll($sql);
        return $list;
    }

    public static function get_product($product_code){
        $one_product_info = new CRUD_Database;
        $one_product_info->connect();
        $sql = "SELECT * FROM products WHERE product_code = '$product_code'";
        $product_info = $one_product_info->executeOne($sql);
        return $product_info;
    }

    public function add_product()
    {
        $name = $this->product_name;
        $price_buy = $this->product_price_buy;
        $price_sale = $this->product_price_sale;
        $images = $this->product_images;
        $count = $this->product_count;
        $line = $this->product_line;
        $warehouse = $this->product_warehouse;
        $is_hot = $this->product_is_hot;
        $is_new = $this->product_is_new;
        // save warehouse
        $data = array("$warehouse", "$count");
        $sql = 'INSERT INTO warehouse (warehouse_name, product_count, warehosing_day) values (?,?,NOW())';
        $addWarehouse = new CRUD_Database;
        $addWarehouse->connect();
        $addWarehouse->insertData($sql, $data);
        // get id warehouse
        $warehouse_code = new CRUD_Database;
        $warehouse_code->connect();
        $row = $warehouse_code->executeAll("SELECT warehouse_code FROM warehouse WHERE warehouse_name = '$warehouse'");
        foreach ($row as $key => $value) {
            $warehouse_id = $value['warehouse_code'];
        }

        // get id product line
        $product_code = new CRUD_Database;
        $product_code->connect();
        $row = $product_code->executeOne("SELECT product_line_code FROM product_line WHERE product_line_name = '$line'");
        if (isset($row['product_line_code'])) {
            $product_line_code = $row['product_line_code'];
        }
        //add product
        $dataProduct = array(
            "$name", "$price_buy", "$price_sale", "$images", "$product_line_code", "$warehouse_id",
            "$is_hot", "$is_new"
        );
        $sqlProduct = 'INSERT INTO products (product_name, product_price_buy, product_price_sale,
        product_images, Product_Line_product_line_code, Warehouse_warehouse_code,
        is_hot, is_new) values (?,?,?,?,?,?,?,?)';
        $addProduct = new CRUD_Database;
        $addProduct->connect();
        $addProduct->insertData($sqlProduct, $dataProduct);
    }
}
