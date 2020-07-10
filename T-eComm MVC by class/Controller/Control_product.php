<?php

include('Model/get_product_data.php');

if(isset($_POST['product'])){
    $product_code = $_POST['product'];
    include('Model/product/product.php');
    include('View/product/product.php');
}


if (isset($_GET['product'])) {
    $product_code = $_GET['product'];
    include('Model/product/product.php');
    include('View/product/product.php');
}

if (isset($_GET['product_line'])) {
    $product = $_GET['product_line'];
    switch ($product) {
        case 'rado': {
                $view = 'rado';
                $line_title = 'ĐỒNG HỒ RADO';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'casio': {
                $view = 'casio';
                $line_title = 'ĐỒNG HỒ CASIO';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'seiko': {
                $view = 'seiko';
                $line_title = 'ĐỒNG HỒ SEIKO';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'citizen': {
                $view = 'citizen';
                $line_title = 'ĐỒNG HỒ CITIZEN';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'apple_watch': {
                $view = 'apple_watch';
                $line_title = 'ĐỒNG HỒ APPLE WATCH';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'bulova': {
                $view = 'bulova';
                $line_title = 'ĐỒNG HỒ BULOVA';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'candino': {
                $view = 'candino';
                $line_title = 'ĐỒNG HỒ CANDINO';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'claude_bernard': {
                $view = 'claude_bernard';
                $line_title = 'ĐỒNG HỒ CLAUDE BERNARD';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'fossil': {
                $view = 'fossil';
                $line_title = 'ĐỒNG HỒ FOSSIL';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'orient': {
                $view = 'orient';
                $line_title = 'ĐỒNG HỒ ORIENT';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'movado': {
                $view = 'movado';
                $line_title = 'ĐỒNG HỒ MOVADO';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'police': {
                $view = 'police';
                $line_title = 'ĐỒNG HỒ POLICE';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'teintop': {
                $view = 'teintop';
                $line_title = 'ĐỒNG HỒ TEINTOP';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'rolex': {
                $view = 'rolex';
                $line_title = 'ĐỒNG HỒ ROLEX';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
        case 'omega': {
                $view = 'omega';
                $line_title = 'ĐỒNG HỒ OMEGA';
                $products = Customer::watch_product_line($view);
                include('Model/product/product_line.php');
                include('View/product/product_line.php');
                break;
            }
    }
}
