<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/box_style.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

    <div class="search" style="display: flex;">
        <div class="logo"><img id="logo" src="../images/logo/logo.png" alt="logo"></div>
    </div>

    <div class="toolbar" style="display: flex;">
        <div class="home_page">
            <a href="index.php">
                <i id="icon_homepage" class="fas fa-home"></i>
            </a>
            <a id="home_page" href="index.php">TRANG CHỦ</a>
        </div>
        <div class="product_list">
            <label id="label_tool">DANH MỤC SẢN PHẨM</label>
            <i id="icon_dropdown" class="fas fa-angle-down"></i>
            <div class="drop_product_list">
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=rado">Rado</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=casio">Casio</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=seiko">Seiko</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=citizen">Citizen</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=apple_watch">Apple watch</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=bulova">Bulova</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=candino">Candino</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=claude_bernard">Claude Bernard</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=fossil">Fossil</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=orient">Orient</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=movado">Movado</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=police">Police</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=teintop">Teintop</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=rolex">Rolex</a>
                    <a id="watch_line_drop" href="index.php?router=customer&control=watch_product&product_line=omega">Omega</a>
                </div>
        </div>
        <div class="product_new">
                <a id="label_tool" href="index.php?router=customer&control=new_product_list">SẢN PHẨM MỚI</a>
                <i id="icon_dropdown" class="fab fa-accusoft"></i>
            </div>
            <div class="product_hot">
                <a id="label_tool" href="index.php?router=customer&control=hot_product_list">SẢN PHẨM HOT</a>
                <i id="icon_dropdown" class="fab fa-hotjar"></i>
            </div>
        <!-- <div class="promotion">
            <label id="label_tool">KHUYẾN MÃI</label>
            <i id="icon_dropdown" class="fas fa-angle-down"></i>
        </div> -->
        <div class="connect">
                <a id="label_tool" href="index.php?router=customer&control=guest_message">LIÊN HỆ</a>
                <i id="icon_connect" class="far fa-handshake"></i>
            </div> 
    </div>

    <div class="main">
        <div class="box">
            <div class="box_left">
                <label id="label_box_left">Thông tin giỏ hàng</label>
                <table class="table_box_products">
                    <tr>
                        <th id="colume1">Sản phẩm</th>
                        <th id="colume2">Tên sản phẩm</th>
                        <th id="colume3">Đơn giá (VND)</th>
                        <th id="colume4">Số lượng</th>
                        <th id="colume5">Thành tiền (VND)</th>
                    </tr>
                    <?= $box_products_table ?>
                </table>
                <table class="table_total_price">
                    <tr>
                        <td id="colume3">Tổng cộng</td>
                        <td id="colume4"><?= $sum_count ?></td>
                        <td id="colume5"><?= $sum_total_price ?>đ</td>
                    </tr>
                </table>
            </div>
            <div class="box_right">
                <label id="label_box_right">Địa chỉ giao hàng</label>
                <form action="index.php" method="post">
                    <input type="hidden" name="router" value="customer">
                    <input type="hidden" name="control" value="box_payment">
                    <input id="box_info_send" type="text" name="box_fullname" value="<?= $box_customer_name ?>"><br>
                    <input id="box_info_send" type="text" name="box_phone" value="<?= $box_customer_phone ?>"><br>
                    <input id="box_info_send" type="text" name="box_email" value="<?= $box_customer_email ?>"><br>
                    <input id="box_info_send" type="text" name="box_address" value="<?= $box_customer_address ?>"><br>
                    <input id="box_btn_send" type="submit" value="XÁC NHẬN ĐẶT HÀNG">
                </form>
            </div>
        </div>

    </div><br><br>
    <div class="footer">
        <div class="footer_left">
            <label id="label_footer">T-eComm FOR WATCH - ĐỒNG HỒ CHÍNH HÃNG</label>
            <label id="label_footer_content">Địa chỉ : 28 Nguyễn Tri Phương , Phú Hội , Huế</label>
            <div id="label_footer_content">
                <label id="label_footer_left">Hotline : </label>
                <label id="label_footer_right"> 0999.999.999 hoặc 0989.999.999</label>
            </div>
            <div id="label_footer_content">
                <label id="label_footer_left">Email : </label>
                <label id="label_footer_right"> T-eCommforwatch@gmail.com</label>
            </div>
            <label id="label_footer_bottom">T-eComm RẤT HÂN HẠNH KHI PHỤC VỤ QUÝ KHÁCH !</label>
        </div>
        <div class="footer_center">
            <label id="label_footer">CHÍNH SÁCH CHUNG</label>
            <label id="label_footer_content">- Sản phẩm chính hãng</label>
            <label id="label_footer_content">- Giao hàng nhanh chóng</label>
            <label id="label_footer_content">- Bảo hành uy tín</label>
            <label id="label_footer_content">- Tận tình phục vụ</label>
        </div>
        <div class="footer_right">
            <label id="label_footer">MẠNG XÃ HỘI</label>
            <div class="icon_footer">
                <i id="icon_footer" class="fab fa-facebook-square"></i>
                <i id="icon_footer" class="fab fa-youtube-square"></i>
                <i id="icon_footer" class="fab fa-instagram-square"></i>
                <i id="icon_footer" class="fab fa-twitter-square"></i>
                <i id="icon_footer" class="fab fa-viber"></i>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<script src="js/slide_show.js"></script>

</html>