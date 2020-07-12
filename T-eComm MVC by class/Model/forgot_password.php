<?php
$result = "";
if (isset($_POST['control']) && $_POST['control'] === 'require_get_password') {
    $account = $_POST['account_forgot'];
    $email = $_POST['email_forgot'];

    $check_account = new CRUD_Database;
    $check_account->connect();
    $sql = "SELECT customer_email FROM forgot_password WHERE account_name = '$account'";
    $row = $check_account->executeOne($sql);
    if (!isset($row['customer_email'])) {
        $result = "Tài khoản của bạn không đúng!";
    } else {
        if ($row['customer_email'] !== $email) {
            $result = "Email của bạn không đúng!";
        } else {
            $to      = $email;
            $subject = "Xác nhận tài khoản:";
            $message = "Mời bạn đăng nhập tài khoản $account bằng mật khẩu ";

            $success = mail($to, $subject, $message);

            if ($success == true) {
                $result = "Đã gửi mail thành công...";
            } else {
                $result = "Chưa gửi được email, mời bạn vui lòng thử lại...";
            }
        }
    }
}
