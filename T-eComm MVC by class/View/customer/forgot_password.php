<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm thông tin đăng nhập</title>
    <style>
        form{
            border: solid 0.1vw black;
            background-color: darkorange;
            padding: 1vw;
            width: 35vw;
            margin:auto;
            margin-top: 2vw;
        }
        label{
            display: block;
            padding: 0.3vw;
            margin-left: 7vw;
        }
        input{
            display: block;
            padding: 0.3vw;
            margin:auto;
            width: 20vw;
            text-align: center;
        }
        input:focus{
            outline: none;
        }
        #btn{
            width: 10vw;
        }
        #btn:hover{
            cursor: pointer;
            background-color: darkred;
            color: white;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="router" value="customer">
        <input type="hidden" name="control" value="require_get_password">
        <h1>Tìm thông tin đăng nhập T-eComm</h1>
        <label>Nhập tài khoản của bạn</label>
        <input type="text" name="account_forgot">
        <label>Nhập email của bạn</label>
        <input type="text" name="email_forgot"><br>
        <input id="btn" type="submit">
    </form>
</body>
</html>