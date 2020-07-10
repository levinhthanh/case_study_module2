<?php

class Comment{
    public $name;
    public $content;

    public function __construct($name, $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    public static function add_comment($content, $account, $product_code){
        $get_account_code = new CRUD_Database;
        $get_account_code->connect();
        $sql = "SELECT account_code FROM accounts WHERE account_name = '$account'";
        $row = $get_account_code->executeOne($sql);
        $account_code = $row['account_code'];

        $save_comment = new CRUD_Database;
        $save_comment->connect();
        $data = array("$content", "$product_code", "$account_code");
        $sql = 'INSERT INTO comments (comment_content, Products_product_code, Accounts_account_code) values (?,?,?)';
        $save_comment->insertData($sql, $data);
    }

    public static function get_comment($product_code){
        $get_comment = new CRUD_Database;
        $get_comment->connect();
        $sql = "SELECT customer_fullname, comment_content FROM comments_of_product WHERE Products_product_code = '$product_code'";
        $result =  $get_comment->executeAll($sql);
        return $result;
    }
}


?>