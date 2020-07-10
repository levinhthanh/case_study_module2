<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu T-eComm</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1vw;
        }

        form {
            border: solid 0.1vw black;
            padding: 3vw;
            width: 30%;
            margin: auto;
            margin-top: 5vw;
            background-color: darkgray;
            box-shadow: blueviolet 0vw -0.5vw 4.5vw -1vw;
        }

        input {
            width: 50%;
            padding: 0.3vw;
            margin: 0.3vw 0;
        }

        #btn {
            width: 8vw;
            font-size: 0.7vw;
            font-weight: bold;
        }

        input:focus {
            outline: none;
        }

        a {
            color: darkred;
        }

        #status {
            color: red;
        }
    </style>
</head>

<body>
    <form action="index.php" method="post">
        <h1>Đổi mật khẩu:</h1>
        <input type="hidden" name="router" value="customer">
        <input type="hidden" name="control" value="change_password_require">
        <label id="status"><?= $change_password ?></label><br>
        <a href="index.php" style="display:<?= $go_to_login ?>;">Quay lại trang chủ</a><br>

        <label>Mật khẩu hiện tại</label><br>
        <input type="text" name="old_password" value="<?= $old_password ?>"><br>

        <label>Mật khẩu mới</label><br>
        <input type="text" name="new_password" value="<?= $new_password ?>"><br>

        <label>Nhập lại mật khẩu mới</label><br>
        <input type="text" name="confirm_password" value="<?= $confirm_password ?>"><br>

        <input id="btn" type="submit" value="Đổi mật khẩu">
    </form>
</body>

</html>