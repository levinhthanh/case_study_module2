<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm thông tin đăng nhập</title>
    <style>
        .cover {
            margin-left: 20vw;
            margin-top: 2vw;
            width: 100%;
        }

        .header {
            padding: 2vw;
            width: 33.05vw;
            border: solid 0.1vw darkgray;
            background-color: darkgray;
            font-size: 2vw;
            font-weight: bold;
        }
        form {
            border: solid 0.1vw darkgray;
            border-top: none;
            background-color: wheat;
            width: 35vw;
            height: 20vw;
            padding: 1vw;
            padding-top: 2vw;
        }
        #label_header{
            font-size: 1.2vw;
            padding: 1vw;
            margin-bottom: 2vw;
        }
        label{
            width: 5vw;
            font-size: 1vw;
        }
        input {
            padding: 0.3vw;
            margin: 0.5vw;
            width: 15vw;
            text-align: center;
            font-size: 1vw;
        }
        input:focus {
            outline: none;
        }
        table{
            margin: auto;
            display: block;
            margin-left: 5vw ;
        }
        
        #btn {
            width: 15vw;
            margin-top: 2vw;
            margin-left: 10vw;
        }
        #btn:hover {
            cursor: pointer;
            background-color: darkred;
            color: white;
        }
        #label_result{
            color: red;
            margin-left: 8vw;
        }
    </style>
</head>

<body>
    <div class="cover">
        <div class="header">FORGOT PASSWORD</div>
        <form action="index.php" method="post">
            <input type="hidden" name="router" value="customer">
            <input type="hidden" name="control" value="require_get_password">
            <label id="label_header">Nhập thông tin đăng nhập T-eComm dưới đây để nhận mật khẩu:</label><br><br>
            <table>
                <tr>
                    <td><label>Tài khoản</label></td>
                    <td><input type="text" name="account_forgot"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="text" name="email_forgot"><br></td>
                </tr>
            </table>
            <input id="btn" type="submit"><br>
            <label id="label_result"><?=$result?></label>
        </form>
        
    </div>
</body>

</html>