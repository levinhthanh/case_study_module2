<?php

if(isset($_POST['control']) && $_POST['control'] = 'box_payment'){
    $box_fullname = $_POST['box_fullname'];
    $box_phone = $_POST['box_phone'];
    $box_email = $_POST['box_email'];
    $box_address = $_POST['box_address'];
    if(!isset($_SESSION['box_fullname'])){
        $_SESSION['box_fullname'] = $box_fullname;
        $_SESSION['box_phone'] = $box_phone;
        $_SESSION['box_email'] = $box_email;
        $_SESSION['box_address'] = $box_address;
    }
}
if (isset($_POST['control']) && $_POST['control'] === 'box_payment') {
    $table_box_payment = "";
    $total_price = 0;
    $count = 1;
    $sum_count = 0;
    $sum_total_price_ss = 0;
    for ($i = 0; isset($_SESSION["product_code_$i"]); $i++) {
        $name = $_SESSION["product_name_$i"];
        $count_ss = $_SESSION["product_count_$i"];
        $count = number_format($count_ss,0,',','.');
        $price_ss = $_SESSION["product_price_$i"];
        $price = number_format($price_ss,0,',','.');
        $total_price_ss =  (float)$price_ss *  (float)$count_ss;
        $total_price = number_format($total_price_ss,0,',','.');
        $table_box_payment .= 
            " 
            <tr>
                <td id='td_box_payment'>$name</td>
                <td id='td_box_payment'>$count</td>
                <td id='td_box_payment'>$price đ</td>
                <td id='td_box_payment'>$total_price đ</td>
            </tr>
            ";
        $sum_count += $count;
        $sum_total_price_ss += $total_price_ss;
        $sum_total_price = number_format($sum_total_price_ss,0,',','.');
    }
    $table_box_payment .= 
    " 
    <tr>
        <td id='td_box_payment'></td>
        <td id='td_box_payment'></td>
        <td id='td_box_payment'>Tổng</td>
        <td id='td_box_payment'>$sum_total_price đ</td>
    </tr>
    ";
    
    $sum_money = $sum_total_price_ss + 100000;
    if(!isset($_SESSION['sum_money'])){
        $_SESSION['sum_money'] = $sum_money;
    }
    $sum_money = number_format($sum_money,0,',','.');
    
}


?>