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
    }
}
