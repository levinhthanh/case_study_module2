<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân viên</title>
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/employee.css">

</head>

<body>

    <div class="container">
        <div class="container_left">
            <div class="title">
                <i id="icon_watch" class="far fa-clock"></i>
                <label id="name_page">T-eComm for Watch</label>
            </div>
            <br>
            <div class="welcome">
                <label id="welcome_admin">Welcome</label><br>
                <label id="name_admin"><?=$employee_fullname?></label>
            </div>
            <div class="general">
                <label id="general_lable">GENERAL</label>
                <br>
                <div class="dropdown_home">
                    <div class="dropdown">
                        <i class="fas fa-home"></i>
                        <label id="lable_home">Home</label>
                        <i class="fas fa-angle-down"></i>
                        <div class="dropdown-content">
                            <a id="a_select" href="index.php?router=employee&control=show_bill_list">Danh sách đơn hàng</a>
                            <a id="a_select" href="index.php?router=employee&control=show_product_list">Danh sách sản phẩm</a>
                            <a id="a_select" href="index.php?router=employee&control=show_customer_list">Danh sách khách hàng</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="dropdown_manager">
                    <div class="dropdown">
                        <i class="fas fa-edit"></i>
                        <label id="lable_manager">Manager bills</label>
                        <i class="fas fa-angle-down"></i>
                        <div class="dropdown-content">
                            <a id="a_select" href="index.php?router">Chưa xử lý</a>
                            <a id="a_select" href="index.php?router=">Thành công</a>
                            <a id="a_select" href="index.php?router=">Thất bại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_right">
            <div class="header">
                <i id="icon_bars" class="fas fa-bars"></i>
                <div class="log_out">
                    <a href="index.php?router=admin&control=logout">
                        <i id="logout" class="fas fa-sign-out-alt"></i>
                    </a>
                    <a href="index.php?router=admin&control=logout" id="label_logout">Logout</a>
                </div>
            </div>
            <!-- *
            *
            * -->
            <!------------------------- NỘI DUNG TRANG NHÂN VIÊN --------------------------- -------------------------- -->
            <!-- *
            *
            * -->
            <div class="show_content">

                <!-- DANH SÁCH ĐƠN HÀNG -->
              

                <!-- DANH SÁCH SẢN PHẨM -->
                <div class="list_product" style="display: <?= $display_list_product ?>;">
                    <label id="label_manager_product">Danh sách sản phẩm</label><br>
                    <div class="tools_product">
                        <a id="a_manager_product" href="index.php?router=employee">Home</a>
                    </div>
            
                    <table id="table_list_product">
                        <tr>
                            <th id="th_list_product">Mã sản phẩm</th>
                            <th id="th_list_product">Ảnh</th>
                            <th id="th_list_product">Tên sản phẩm</th>
                            <th id="th_list_product">Giá nhập</th>
                            <th id="th_list_product">Giá bán</th>
                            <th id="th_list_product">Trạng thái</th>
                            <th id="th_list_product">Hãng</th>
                            <th id="th_list_product">Nhà kho</th>
                            <th id="th_list_product">Số lượng</th>
                            <th id="th_list_product">Ngày nhập kho</th>
                        </tr>

                        <?= $table_list_product ?>

                    </table>

                </div>

                <!-- CHỈNH SỬA SẢN PHẨM -->
                <div class="edit_product" style="display: <?= $display_edit_product ?>;">
                    <label id="label_manager_product">Chỉnh sửa sản phẩm</label><br>
                    <div class="tools_product">
                        <a id="a_manager_product" href="index.php?router=admin">Home</a>|
                        <a id="a_manager_product" href="index.php?router=admin&control=add_product">Add</a>
                    </div>
                    <form action="index.php" method="post">
                        <input type="hidden" name="router" value="admin">
                        <input type="hidden" name="control" value="require_update_product">
                        <input type="hidden" name="product_code" value=<?= $code_prod ?>>
                        <table id="table_edit_product">
                            <tr>
                                <th id="th_edit_product">Mục</th>
                                <th id="th_edit_product">Thông tin sản phẩm</th>
                                <th id="th_edit_product">Chỉnh sửa</th>
                            </tr>
                            <?= $table_one_product ?>
                        </table>
                        <label id="error_update_product"><?= $error_update ?></label>
                        <button id="btn_update_product">Cập nhật</button>
                    </form>
                </div>


                <!-- DANH SÁCH KHÁCH HÀNG -->
                <div class="list_product" style="display: <?= $display_list_customer ?>;">
                    <label id="label_manager_customer">Danh sách khách hàng</label><br>
                    <div class="tools_customer">
                        <a id="a_manager_customer" href="index.php?router=admin">Home</a>
                    </div>
                    <table id="table_list_customer">
                        <tr>
                            <th id="th_list_customer">Mã khách hàng</th>
                            <th id="th_list_customer">Tên khách hàng</th>
                            <th id="th_list_customer">Địa chỉ</th>
                            <th id="th_list_customer">Ngày sinh</th>
                            <th id="th_list_customer">Số điện thoại</th>
                            <th id="th_list_customer">Email</th>
                            <th id="th_list_customer">Account</th>
                            <th id="th_list_customer">Ngày đăng ký</th>
                            <th id="th_list_customer">Trạng thái</th>
                            <th id="th_list_customer">Sửa/Xóa</th>
                        </tr>

                        <?= $table_list_customer ?>

                    </table>
                    <!-- Xóa tài khoản KH -->
                    <label id="lable_delete_customer"><?= $delete_customer ?></label>
                    <div class="btn_delete">
                        <form action="index.php" method="post">
                            <input type="hidden" name="router" value="admin">
                            <input type="hidden" name="control" value="require_delete_customer">
                            <input type="hidden" name="code" value="<?= $code_cus ?>">
                            <input id="confirm_delete" type="submit" value="Xác nhận" style="display: <?= $btn_delete ?>;">
                        </form>
                        <form action="index.php" method="get">
                            <input type="hidden" name="router" value="admin">
                            <input type="hidden" name="control" value="show_customer_list">
                            <input id="cancel_delete" type="submit" value="Hủy bỏ" style="display: <?= $btn_delete ?>;">
                        </form>
                    </div>

                     <!-- Khóa/Mở tài khoản KH -->
                     <label id="lable_edit_customer"><?= $edit_customer ?></label>
                    <div class="btn_delete">
                        <form action="index.php" method="post">
                            <input type="hidden" name="router" value="admin">
                            <input type="hidden" name="control" value="require_edit_customer">
                            <input type="hidden" name="code" value="<?= $code_cus ?>">
                            <input id="confirm_delete" type="submit" value="Xác nhận" style="display: <?= $btn_edit ?>;">
                        </form>
                        <form action="index.php" method="get">
                            <input type="hidden" name="router" value="admin">
                            <input type="hidden" name="control" value="show_customer_list">
                            <input id="cancel_delete" type="submit" value="Hủy bỏ" style="display: <?= $btn_edit ?>;">
                        </form>
                    </div>
                </div>

                <!-- CHỈNH SỬA NHÂN VIÊN -->
                <div class="edit_employee" style="display: <?= $display_edit_employee ?>;">
                    <label id="label_manager_employee">Chỉnh sửa nhân viên</label><br>
                    <div class="tools_employee">
                        <a id="a_manager_employee" href="index.php?router=admin">Home</a>|
                        <a id="a_manager_employee" href="index.php?router=admin&control=add_employee">Add</a>
                    </div>
                    <form action="index.php" method="post">
                        <input type="hidden" name="router" value="admin">
                        <input type="hidden" name="control" value="require_update_employee">
                        <input type="hidden" name="employee_code" value=<?= $code_emp ?>>
                        <table id="table_edit_employee">
                            <tr>
                                <th id="th_edit_employee">Mục</th>
                                <th id="th_edit_employee">Thông tin nhân viên</th>
                                <th id="th_edit_employee">Chỉnh sửa</th>
                            </tr>
                            <?= $table_one_employee ?>
                        </table>
                        <label id="error_update_employee"><?= $error_update ?></label>
                        <button id="btn_update_employee">Cập nhật</button>
                    </form>
                </div>


                <!-- THÊM NHÂN VIÊN -->
                <div class="add_employee" style="display: <?= $display_add_employee ?>;">
                    <label id="label_manager_employee">Quản lý nhân viên</label><br>
                    <div class="tools_employee">
                        <a id="a_manager_employee" href="index.php?router=admin">Home</a>
                    </div>
                    <label id="label_add_employee">Thêm nhân viên</label>
                    <form action="index.php" method="post">
                        <input type="hidden" name="router" value="admin">
                        <input type="hidden" name="control" value="require_add_employee">
                        <table>
                            <tr>
                                <td id="td_left">Tên</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_name" value="<?= $fullname_employee ?>">
                                    <i id="icon_status" style="color:<?= $fullname_color ?>;" class='<?= $fullname_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Ngày sinh</td>
                                <td id="td_right">
                                    <input style="margin-left: 1.5vw;" type="date" name="employee_new_birthday" value="<?= $birthday_employee ?>">
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Địa chỉ</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_address" value="<?= $address_employee ?>">
                                    <i id="icon_status" style="color:<?= $address_color ?>;" class='<?= $address_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Điện thoại</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_phone" value="<?= $phone_employee ?>">
                                    <i id="icon_status" style="color:<?= $phone_color ?>;" class='<?= $phone_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Email</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_email" value="<?= $email_employee ?>">
                                    <i id="icon_status" style="color:<?= $email_color ?>;" class='<?= $email_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Tài khoản</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_account" value="<?= $account_employee ?>" placeholder="$.....">
                                    <i id="icon_status" style="color:<?= $account_color ?>;" class='<?= $account_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Mật khẩu</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_password" value="<?= $password_employee ?>">
                                    <i id="icon_status" style="color:<?= $password_color ?>;" class='<?= $password_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Chức vụ</td>
                                <td id="td_right">
                                    <select name="employee_new_possition" id="">
                                        <option value="Nhân viên kinh doanh">Nhân viên kinh doanh</option>
                                        <option value="Quản lý bán hàng">Quản lý bán hàng</option>
                                        <option value="Nhân viên đóng gói">Nhân viên đóng gói</option>
                                        <option value="Nhân viên IT">Nhân viên IT</option>
                                    </select>
                                    <i id="icon_status" class="far fa-hand-pointer"></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Lương</td>
                                <td id="td_right">
                                    <input type="text" name="employee_new_salary" value="<?= $salary_employee ?>">
                                    <i id="icon_status" style="color:<?= $salary_color ?>;" class='<?= $salary_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left"></td>
                                <td id="td_right"><input id="button_add" type="submit" value="Thêm mới"></td>
                            </tr>
                        </table><br>
                        <label id="lable_confirm" style="display:<?= $lable_confirm ?>;">Bạn đã thêm nhân viên thành công !</label><br>
                    </form>

                </div>


                <!-- THÊM SẢN PHẨM -->
                <div class="add_product" style="display: <?= $display_add_product ?>;">
                    <label id="label_manager_product">Quản lý sản phẩm</label><br>
                    <div class="tools_product">
                        <a id="a_manager_product" href="index.php?router=admin">Home</a>|
                        <a id="a_manager_product" href="index.php?router=admin&control=add_product">Add</a>|
                        <a id="a_manager_product" href="">Edit</a>|
                        <a id="a_manager_product" href="">Delete</a>
                    </div>
                    <label id="label_add_product">Thêm sản phẩm</label>
                    <form action="index.php" method="post">
                        <input type="hidden" name="router" value="admin">
                        <input type="hidden" name="control" value="require_add_product">
                        <table>
                            <tr>
                                <td id="td_left">Tên</td>
                                <td id="td_right">
                                    <input type="text" name="product_new_name" value="<?= $name_product ?>">
                                    <i id="icon_status" style="color:<?= $name_color ?>;" class='<?= $name_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Hãng</td>
                                <td id="td_right">
                                    <select name="product_new_line" id="">
                                        <option value="Rado">Rado</option>
                                        <option value="Casio">Casio</option>
                                        <option value="Seiko">Seiko</option>
                                        <option value="Citizen">Citizen</option>
                                        <option value="Apple watch">Apple watch</option>
                                        <option value="Bulova">Bulova</option>
                                        <option value="Candino">Candino</option>
                                        <option value="Claude Bernard">Claude Bernard</option>
                                        <option value="Fossil">Fossil</option>
                                        <option value="Orient">Orient</option>
                                        <option value="Movado">Movado</option>
                                        <option value="Police">Police</option>
                                        <option value="Teintop">Teintop</option>
                                    </select>
                                    <i id="icon_status" class="far fa-hand-pointer"></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Giá mua</td>
                                <td id="td_right">
                                    <input type="text" name="product_price_buy" value="<?= $price_buy_product ?>">
                                    <i id="icon_status" style="color:<?= $price_buy_color ?>;" class='<?= $price_buy_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Giá bán</td>
                                <td id="td_right">
                                    <input type="text" name="product_price_sale" value="<?= $price_sale_product ?>">
                                    <i id="icon_status" style="color:<?= $price_sale_color ?>;" class='<?= $price_sale_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Số lượng</td>
                                <td id="td_right">
                                    <input type="text" name="product_count" value="<?= $count_product ?>">
                                    <i id="icon_status" style="color:<?= $count_color ?>;" class='<?= $count_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Kho chứa</td>
                                <td id="td_right">
                                    <select name="product_warehouse" id="">
                                        <option value="Kho A">Kho A</option>
                                        <option value="Kho B">Kho B</option>
                                        <option value="Kho C">Kho C</option>
                                        <option value="Kho D">Kho D</option>
                                    </select>
                                    <i id="icon_status" class="far fa-hand-pointer"></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Hình ảnh</td>
                                <td id="td_right">
                                    <input type="text" name="product_images" value="<?= $images_product ?>">
                                    <i id="icon_status" style="color:<?= $images_color ?>;" class='<?= $images_status ?>'></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Mới?</td>
                                <td id="td_right">
                                    <input type="checkbox" name="product_is_new">
                                    <i id="icon_status" class="far fa-hand-pointer"></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left">Hot?</td>
                                <td id="td_right">
                                    <input type="checkbox" name="product_is_hot">
                                    <i id="icon_status" class="far fa-hand-pointer"></i>
                                </td>
                            </tr>
                            <tr>
                                <td id="td_left"></td>
                                <td id="td_right"><input id="button_add" type="submit" value="Thêm mới"></td>
                            </tr>
                        </table>
                        <br>
                        <label id="lable_notification" style="display:<?= $lable_notification ?>;">Sản phẩm này đã tồn tại, nhấn Edit để cập nhật !</label>
                        <label id="lable_confirm" style="display:<?= $lable_confirm ?>;">Bạn đã thêm sản phẩm thành công !</label><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>