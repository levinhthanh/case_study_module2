<?php
$return_message = "Cám ơn bạn đã để lại tin nhắn!";
if(isset($_POST['control']) && $_POST['control']=== 'save_message'){
    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $guest_message = $_POST['guest_message'];
    if($guest_name !== "" && $guest_message !== "" && $guest_email !== ""){
        echo $guest_message;
        $save_message = new CRUD_Database;
        $save_message->connect();
        $data = array("$guest_name", "$guest_email", "$guest_message");
        $sql = "INSERT INTO message_guest(guest_name, guest_email, guest_message) VALUES (?,?,?)";
        $save_message->insertData($sql,$data);
    }
}
