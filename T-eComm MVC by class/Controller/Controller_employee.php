<?php

if (isset($_GET['control'])) {
    $control = $_GET['control'];
    switch ($control) {
        case 'logout': {
                $hiUser = "";
                $log_in = "block;";
                $log_out = "none;";
                session_destroy();
                include('Model/get_product_data.php');
                include('View/home_page.php');
                break;
            }
        case 'show_product_list': {
                $display_list_product = "block";
                $list_product = Product::show_list_product();
                $table_list_product = "";
                foreach ($list_product as $key => $value) {
                    $code = $value['product_code'];
                    $images = $value['product_images'];
                    $image_array = explode(',', $images);
                    $image = $image_array[0];
                    $name = $value['product_name'];
                    $price_buy = $value['product_price_buy'];
                    $price_buy = number_format($price_buy, 0, ',', '.');
                    $price_sale = $value['product_price_sale'];
                    $price_sale = number_format($price_sale, 0, ',', '.');
                    $status = $value['product_status'];
                    $line = $value['product_line_name'];
                    $ware = $value['warehouse_name'];
                    $count = $value['product_count'];
                    $day_in = $value['warehosing_day'];
                    $table_list_product .=
                        "
                    <tr>
                            <td id='td_list_product'>$code</td>
                            <td id='td_list_product'><img id='img_list_product' src='$image'></td>
                            <td id='tb_product_name'>$name</td>
                            <td id='td_list_product'>$price_buy đ</td>
                            <td id='td_list_product'>$price_sale đ</td>
                            <td id='td_list_product'>$status</td>
                            <td id='td_list_product'>$line</td>
                            <td id='td_list_product'>$ware</td>
                            <td id='td_list_product'>$count</td>
                            <td id='td_list_product'>$day_in</td>   
                    </tr>
                    ";
                }
                include('View/employee/employee.php');
                break;
            }
    }
}
