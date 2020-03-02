<?php
    $email = $this->session->userdata('email');
    $user = $this->user_model->get_user_by_email($email);
?>
<style type="text/css">
    #head {
        width: 100%;
        padding: 0;
    }
    .nof { color: blue; font-family: 'Trocchi', serif; font-size: 30px; font-weight: normal; line-height: 48px; margin: 0; text-align: center; }
</style>
<div class="container" id="head">
    <div class="row">
        <div class="col-md-12">
            <div class="header">
            <script src="<?php echo base_url(); ?>../public/user/js/login.js" type="text/javascript"></script>
            <section class="top-link clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav navbar-nav topmenu-contact pull-left">
                                <li><a href="tel:0908770095"><i class="fa fa-phone"></i> <span>Hotline:099.999.9999</span></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                                <li class="order-check">
                                    <a <?php $email = $this->session->userdata('email');
                                            if(!isset($email)):
                                                echo "data-toggle='modal' data-target='#myModalBill'";
                                            else:
                                                $user = $this->user_model->get_user_by_email($email);
                                                $book = $this->admin_model->get_booking_by_user_id($user->id);
                                                if(isset($book->id)):
                                                $page = base_url("don-hang/$user->id.html");
                                                echo "href=$page";
                                                else:
                                                $page = base_url("donhang.html");
                                                echo "href=$page";
                                                endif;
                                            endif;
                                        ?>>
                                        <i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng
                                    </a>
                                </li>
                                <!-- <li class="order-cart"><a href="</?php echo base_url("gio-hang.html"); ?>"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li> -->
                                <!-- <li class="account-login"><a href="#" data-toggle="modal" data-target="#myModalLogin"><i class="fa fa-sign-in"></i> Đăng nhập </a></li> -->
                                <!-- <li class="account-register"><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Đăng ký </a></li> -->
                            <?php
                              $email = $this->session->userdata('email');
                              if(!isset($email))
                              {
                                $login_page = base_url("dang-nhap.html");
                                $register_page = base_url("dang-ky.html");
                                echo
                                "<li class='account-login'><a href=$login_page><i class='fa fa-sign-in'></i> Đăng nhập </a></li>
                                <li class='account-register'><a href=$register_page><i class='fa fa-key'></i> Đăng ký </a></li>"
                              ;}else {
                                $update_page = base_url("capnhat-taikhoan/$user->id.html");
                                $logout_page = base_url("dang-xuat.html");
                                echo
                                "<li class='account-login'><a href=$update_page><i class='fa fa-user'></i> $user->fullname </a></li>
                                <li class='account-login'><a href=$logout_page><i class='fa fa-power-off'></i> Đăng xuất </a></li>
                                "
                              ;} ?>
                            </ul>
                            <div class="show-mobile hidden-lg hidden-md">
                                <div class="quick-user">
                                    <div class="quickaccess-toggle">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="inner-toggle">
                                        <ul class="login links">
                                            <li>
                                                <!-- <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Đăng ký</a> -->
                                                <a href="<?php echo base_url("dang-ky.html"); ?>"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <!-- <a href="#" data-toggle="modal" data-target="#myModalLogin"><i class="fa fa-key"></i> Đăng nhập</a> -->
                                                <a href="<?php echo base_url("dang-nhap.html"); ?>"><i class="fa fa-key"></i> Đăng nhập</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="quick-access">
                                    <div class="quickaccess-toggle">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <div class="inner-toggle">
                                        <ul class="links">
                                            <li>
                                                <a id="mobile-wishlist-total" class="wishlist" <?php $email = $this->session->userdata('email');
                                                    if(!isset($email)):
                                                        echo "data-toggle='modal' data-target='#myModalBill'";
                                                    else:
                                                        $user = $this->user_model->get_user_by_email($email);
                                                        $book = $this->admin_model->get_booking_by_user_id($user->id);
                                                        if($book->user_id == $user->id):
                                                        $page = base_url("don-hang/$book->id.html");
                                                        echo "href=$page";
                                                        else:
                                                        $page = base_url("donhang.html");
                                                        echo "href=$page";
                                                        endif;
                                                    endif;
                                                ?>>
                                                    <i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng
                                                </a>
                                            </li>
                                            <!-- <li><a href="gio-hang.html" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="header-content clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-12 header-left text-center">
                            <div class="logo">
                                <a href="<?php echo base_url("index.html"); ?>" title="">
                                    <img alt="" src="<?php echo base_url(); ?>../public/user/images/logo1.png" class="img-responsive" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-12 col-sm-12 header-right">
                            <div class="sale-policy clearfix hidden-sm hidden-xs">
                                <ul class="clearfix">
                                    <li class="shipping">
                                        <i class="fa fa-truck"></i><span>
                                        Giao hàng miễn phí
                                        </span>
                                    </li>
                                    <li class="payment">
                                        <i class="fa fa-money"></i><span>
                                        Thanh toán linh hoạt
                                        </span>
                                    </li>
                                    <li class="return">
                                        <i class="fa fa-refresh"></i><span>
                                        Trả hàng trong 30 ngày
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart">
                                <div class="heading">
                                    <a href="gio-hang.html">
                                        <span class="icon">icon</span><span id="cart-total">
                                        0
                                        sp - 0đ
                                        </span><i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="search hidden-sm hidden-xs">
                                <div class="input-cat form-search clearfix">
                                    <form name="search-form" action="<?php echo base_url('process-search.html'); ?>" method="POST">
                                        <div class="form-search-controls">
                                            <input type="text" name="keyword" id="txtsearch" value="<?php echo set_value('keyword'); ?>" />
    <!--                                         <div class="select-categories">
                                                <select name="lbgroup" id="lbgroup">
                                                    <option value="0" selected="selected">Tất cả</option>
                                                    <option class="option-1" value="1308">TOYOTA</option>
                                                    <option class="option-1" value="1310">KIA</option>
                                                    <option class="option-1" value="1334">HONDA</option>
                                                    <option class="option-1" value="1313">FORD</option>
                                                    <option class="option-1" value="7230">AUDI</option>
                                                    <option class="option-1" value="7231">BMW</option>
                                                    <option class="option-1" value="7232">Lamborghini</option>
                                                </select>
                                            </div> -->
                                        </div>
                                        <button class="btn btn-search" type="submit" name="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="social-group">
                            </div>
                            <!-- Register Form -->
                            <!-- <div class="container">
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Đăng Ký</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="contact-feedback">
                                                        <form class="form-horizontal" name="insert-form" method="POST" action="</?php echo base_url("xuly-dang-ky.html"); ?>" enctype="multipart/form-data">
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                                                                <input type="text" placeholder="Họ tên" name="fullname" value="</?php echo set_value("fullname"); ?>" class="form-control" oninvalid="this.setCustomValidity('Bạn chưa nhập họ tên!')"  required/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-phone"></i></span>
                                                                <input type="number" placeholder="Số điện thoại" name="phone" value="</?php echo set_value("phone"); ?>" class="form-control" oninvalid="this.setCustomValidity('Số điện thoại không hợp lệ!')"   required/>
                                                            </div>
                                                            <div class="form-group input-group" id="datetimepicker1">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-calendar"></i></span>
                                                                <input type="date" placeholder="Ngày sinh" name="date_of_birth" value="</?php echo set_value("date_of_birth"); ?>" class="form-control" oninvalid="this.setCustomValidity('Bạn chưa nhập ngày tháng năm sinh!')"  required/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                <input type="email" placeholder="Email" name="email" value="</?php echo set_value("email"); ?>" class="form-control" oninvalid="this.setCustomValidity('Email không hợp lệ!')"  required/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                                                <input type="password" placeholder="Mật khẩu" name="password" value="</?php echo set_value("password"); ?>" class="form-control" oninvalid="this.setCustomValidity('Please Enter valid email')" required/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                                                <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirm" value="</?php echo set_value("password"); ?>" class="form-control"  required/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <input type="file" class="form-control1" id="exampleInputFile" name="url_image" value="</?php echo set_value("url_image"); ?>" required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-default" type="submit" name="reg-submit">Đăng Ký</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Login Form -->
<!--                             <div class="container">
                                <div class="modal fade" id="myModalLogin">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Đăng Nhập</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-6 col-sm-12 col-xs-12">
                                                    <div class="contact-feedback">
                                                        <form class="form-horizontal" name="login-form" method="POST" action="</?php echo base_url("xuly-dang-nhap.html"); ?>" enctype="multipart/form-data">
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                                <input type="email" placeholder="Email" name="email" class="form-control"  />
                                                            </div>
                                                                <span></?php echo form_error('email'); ?></span>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                                                <input type="password" placeholder="Mật khẩu" name="password" class="form-control"  />
                                                            </div>
                                                                <span></?php echo form_error('password'); ?></span>
                                                            <div class="form-group">
                                                                <button class="btn btn-default" type="submit" name="log-submit">Đăng Nhập</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
                $("#btnsearch").click(function () {
                SearchProduct();
                });
                $("#txtsearch").keydown(function (event) {
                if (event.keyCode == 13) {
                SearchProduct();
                }
                });
                function SearchProduct() {
                var key = $('#txtsearch').val();
                if (key == '' || key == 'Tìm kiếm...') {
                $('#txtsearch').focus();
                return;
                }
                var group = $('#lbgroup').val();
                window.location = 'tim-kiem7c8e.html?group=' + group + '&key=' + key;
                }
            </script>
            </div>
        </div>
    </div>
</div>
<!-- Nofication Book Form -->
<div class="container">
    <div class="modal fade" id="myModalBill">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="nof">Đăng nhập để kiểm tra đơn hàng</h1>
                </div>
                <div class="modal-body">
                        <div class="contact-feedback">
                            <a class="btn btn-default" href="<?php echo base_url("dang-nhap.html"); ?>">Đăng Nhập</a>
                            <a class="btn btn-default" href="<?php echo base_url("dang-ky.html"); ?>"> Đăng ký</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                </div>
                <div class="modal-footer"><div class="col-md-6 col-sm-12 col-xs-12"></div></div>
            </div>
        </div>
    </div>
</div>