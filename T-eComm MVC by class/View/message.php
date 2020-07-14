<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ với chúng tôi</title>
    <style>
        form {
            border: solid 0.1vw darkgrey;
            width: 30vw;
            background-color: lavender;
            margin: auto;
        }

        .header {
            width: 100%;
            height: 3vw;
            background-color: gray;

        }

        .content {
            width: 30vw;
            height: 26vw;
            padding: 1vw;
            margin-left: 2vw;
        }

        label {
            font-size: 1.1vw;
            display: block;
            padding-top: 0.5vw;
        }

        input {
            display: block;
        }

        textarea {
            width: 80%;
            height: 11vw;
        }

        #label_message {
            display: block;
            font-size: 2vw;
            font-weight: bold;

        }

        input:focus,
        textarea:focus {
            outline: none;
        }

        #btn_message {
            width: 10vw;
            padding: 0.3vw;
            margin-top: 1vw;
        }
        #a_message{
            margin-left: 3vw;
            padding: 0.5vw;
            display: block;
        }
        #return_message{
            margin-left: 3.4vw ;
            color: darkred;
        }
    </style>
</head>

<body>
    <br>
    <form action="index.php" method="post">
        <div class="header">
        </div>
        <input type="hidden" name="router" value="customer">
        <input type="hidden" name="control" value="save_message">
        <div class="content">
            <label id="label_message">Gửi ý kiến cho chúng tôi</label>
            <label>Họ và tên</label>
            <input type="text" name="guest_name">
            <label>Email</label>
            <input type="text" name="guest_email">
            <label>Nội dung tin nhắn</label>
            <textarea name="guest_message" id="" cols="40" rows="10"></textarea>
            <input id="btn_message" type="submit" value="Gửi tin nhắn">
        </div>
        <label id="return_message"><?=$return_message?></label>
        <a id="a_message" href="index.php">Quay lại trang chủ</a><br>
    </form>
    
</body>

</html>