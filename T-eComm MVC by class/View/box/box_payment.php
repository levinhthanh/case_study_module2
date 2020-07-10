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
        </div>
        <div class="product_new">
            <a id="label_tool" href="index.php?router=customer&control=new_product_list">SẢN PHẨM MỚI</a>
            <i id="icon_dropdown" class="fas fa-angle-down"></i>
        </div>
        <div class="product_hot">
            <a id="label_tool" href="index.php?router=customer&control=hot_product_list">SẢN PHẨM HOT</a>
            <i id="icon_dropdown" class="fas fa-angle-down"></i>
        </div>
        <div class="promotion">
            <label id="label_tool">KHUYẾN MÃI</label>
            <i id="icon_dropdown" class="fas fa-angle-down"></i>
        </div>
        <div class="connect">
            <label id="label_tool">LIÊN HỆ</label>
            <i id="icon_connect" class="far fa-handshake"></i>
        </div>
    </div>

    <div class="main">
        <div class="box_payment">
            <label id="label_box_payment">Hình thức thanh toán</label><br>
            <form action="index.php" method="post">
                <input type="hidden" name="router" value="customer">
                <input type="hidden" name="control" value="box_finish">
                <select name="payment_way" id="payment_way" aria-placeholder="Chọn hình thức thanh toán">
                    <option value="at_home">Thanh toán khi nhận hàng</option>
                    <option value="banking">Thanh toán bằng chuyển khoản</option>
                    <option value="e_wallet">Thanh toán bằng ví điện tử</option>
                </select>
                <table id="table_box_payment">
                    <tr>
                        <th id="td_box_payment">Sản phẩm</th>
                        <th id="td_box_payment">Số lượng</th>
                        <th id="td_box_payment">Giá</th>
                        <th id="td_box_payment">Thành tiền</th>
                    </tr>
                    <?= $table_box_payment ?>
                </table>
                <div id="payment_fee">
                    <label id='fee'>Phí giao hàng: 100.000đ</label>
                </div>
                <div>
                    <label id='sum_money'>Tổng tiền: <?= $sum_money ?>đ</label>
                </div>
                <input id="payment_confirm_btn" type="submit" value="XÁC NHẬN THANH TOÁN">
            </form>
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


</html>