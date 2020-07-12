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

    public static function delete_product($product_code){
        $get_warehouse_code = new CRUD_Database;
        $get_warehouse_code->connect();
        $sql = "SELECT Warehouse_warehouse_code FROM products WHERE product_code = '$product_code'";
        $row = $get_warehouse_code->executeOne($sql);
        $warehouse_code = $row['Warehouse_warehouse_code'];

        $delete_product = new CRUD_Database;
        $delete_product->connect();
        $sql = "DELETE FROM products WHERE product_code = '$product_code';";
        $delete_product->deleteData($sql);

        $delete_warehouse = new CRUD_Database;
        $delete_warehouse->connect();
        $sql = "DELETE FROM warehouse WHERE warehouse_code = '$warehouse_code';";
        $delete_warehouse->deleteData($sql);
    }

    public static function update_product(
        $product_code,
        $name_product_update,
        $price_buy_update,
        $price_sale_update,
        $images_product_update,
        $status_product_update,
        $count_product_update,
        $warehosing_day_update,
        $warehouse_update,
        $line_name_update
    ) {
        $product_code = (int)$product_code;
        $price_buy_update = (float)$price_buy_update;
        $price_sale_update = (float)$price_sale_update;
        $count_product_update = (int)$count_product_update;

        $get_line_code = new CRUD_Database;
        $get_line_code->connect();
        $sql = "SELECT product_line_code FROM product_line WHERE product_line_name = '$line_name_update'";
        $row = $get_line_code->executeOne($sql);
        $line_code = $row['product_line_code'];
        $line_code = (int)$line_code;

        $update_product = new CRUD_Database;
        $update_product->connect();
        $sql = "UPDATE products SET 
        product_name = '$name_product_update',
        product_price_buy = '$price_buy_update',
        product_price_sale = '$price_sale_update',
        product_images = '$images_product_update',
        product_status = '$status_product_update',
        Product_Line_product_line_code = '$line_code'
        WHERE product_code = '$product_code'
        ";
        $update_product->updateData($sql);

        $get_warehouse_code = new CRUD_Database;
        $get_warehouse_code->connect();
        $sql = "SELECT Warehouse_warehouse_code FROM products WHERE product_code = '$product_code' ";
        $row = $get_warehouse_code->executeOne($sql);
        $warehouse_code = $row['Warehouse_warehouse_code'];
        $warehouse_code = (int)$warehouse_code;

        $update_warehouse = new CRUD_Database;
        $update_warehouse->connect();
        $sql = "UPDATE warehouse SET 
        warehouse_name = '$warehouse_update',
        product_count = '$count_product_update',
        warehosing_day = '$warehosing_day_update'
        WHERE warehouse_code = $warehouse_code
        ";
        $update_warehouse->updateData($sql);
    }

    public static function edit_product_table($one_product)
    {
        $table_one_product = "";
        // Thông tin sản phẩm
        $name = $one_product['product_name'];
        $price_buy_ss = $one_product['product_price_buy'];
        $price_buy = number_format($price_buy_ss, 0, ',', '.');
        $price_sale_ss = $one_product['product_price_sale'];
        $price_sale = number_format($price_sale_ss, 0, ',', '.');
        $images = $one_product['product_images'];
        $status = $one_product['product_status'];
        $line_name = $one_product['product_line_name'];
        $warehouse = $one_product['warehouse_name'];
        $count = $one_product['product_count'];
        $warehosing_day = $one_product['warehosing_day'];

        $table_one_product .=
            "
                <tr>
                    <td id='td_edit_product'>Tên sản phẩm</td>
                    <td id='td_edit_product' style = 'max-width: 10vw;overflow: hidden;'>$name</td>
                    <td id='td_edit_product'>
                    <input type='text' name='name_product_update' value='$name'>
                    </td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Giá nhập</td>
                    <td id='td_edit_product'>$price_buy đ</td>
                    <td id='td_edit_product'><input type='text' name='price_buy_update' value='$price_buy_ss'></td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Giá bán</td>
                    <td id='td_edit_product'>$price_sale đ</td>
                    <td id='td_edit_product'><input type='text' name='price_sale_update' value='$price_sale_ss'></td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Hình ảnh</td>
                    <td id='td_edit_product' style = 'max-width: 10vw;overflow: hidden;'>$images</td>
                    <td id='td_edit_product'><input type='text' name='images_product_update' value='$images'></td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Trạng thái</td>
                    <td id='td_edit_product'>$status</td>
                    <td id='td_edit_product'>
                        <select name='status_product_update'>
                            <option value='ready'>Ready</option>
                            <option value='not_ready'>Not ready</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Số lượng</td>
                    <td id='td_edit_product'>$count</td>
                    <td id='td_edit_product'><input type='text' name='count_product_update' value='$count'></td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Ngày nhập kho</td>
                    <td id='td_edit_product'>$warehosing_day</td>
                    <td id='td_edit_product'><input type='date' name='warehosing_day_update' value='$warehosing_day'></td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Nhà kho</td>
                    <td id='td_edit_product'>$warehouse</td>
                    <td id='td_edit_product'>
                       <select name='warehouse_update'>
                          <option value='Kho A'>Kho A</option>
                          <option value='Kho B'>Kho B</option>
                          <option value='Kho C'>Kho C</option>
                          <option value='Kho D'>Kho D</option>
                       </select>
                    </td>
                </tr>
                <tr>
                    <td id='td_edit_product'>Hãng</td>
                    <td id='td_edit_product'>$line_name</td>
                    <td id='td_edit_product'>
                       <select name='line_name_update' style='width:6vw'>
                          <option value='Rado'>Rado</option>
                          <option value='Casio'>Casio</option>
                          <option value='Seiko'>Seiko</option>
                          <option value='Citizen'>Citizen</option>
                          <option value='Apple watch'>Apple watch</option>
                          <option value='Bulova'>Bulova</option>
                          <option value='Candino'>Candino</option>
                          <option value='Claude Berbard'>Claude Berbard</option>
                          <option value='Fossil'>Fossil</option>
                          <option value='Orient'>Orient</option>
                          <option value='Movado'>Movado</option>
                          <option value='Police'>Police</option>
                          <option value='Teintop'>Teintop</option>
                          <option value='Rolex'>Rolex</option>
                          <option value='Omega'>Omega</option>
                       </select>
                    </td>
                </tr>
                
                ";
        return $table_one_product;
    }

    public static function show_one_product($product_code)
    {
        $list_product = new CRUD_Database;
        $list_product->connect();
        $sql = "SELECT * FROM list_products WHERE product_code = $product_code";
        $list = $list_product->executeOne($sql);
        return $list;
    }

    public static function show_list_product()
    {
        $list_product = new CRUD_Database;
        $list_product->connect();
        $sql = "SELECT * FROM list_products";
        $list = $list_product->executeAll($sql);
        return $list;
    }

    public static function get_product($product_code)
    {
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
