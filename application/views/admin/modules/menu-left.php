<?php
    $username = $this->session->userdata('username');
    $user = $this->login_model->get_user_by_username($username);
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url('admin.html'); ?>"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-laptop nav_icon"></i>Layouts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="grids.html">Grid System</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-credit-card nav_icon"></i>Đơn Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url("booking.html"); ?>">Danh Sách Đơn Hàng</a></li>
                    <li><a href="<?php echo base_url("booking-cancel.html"); ?>">Danh Sách Đơn Hàng Từ Chối</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user nav_icon"></i>Thành Viên<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url("sub.html"); ?>">Danh Sách Người Đăng Ký Theo Dõi</a></li>
                    <li><a href="<?php echo base_url("user.html"); ?>">Danh Sách Thành Viên</a></li>
                    <li><a href="<?php echo base_url("user-deleted.html"); ?>">Danh Sách Thành Viên Đã Xóa</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url("contact.html"); ?>">Hộp thư đến</a></li>
                    <li><a href="<?php echo base_url("contact-examined.html"); ?>">Đã Xem</a></li>
                </ul>
            </li>
            <?php if($user->user_role_id == 1 ){
            $user_role_page = base_url("user-role.html");
            $insert_user_role_page = base_url("insert-user-role.html");
            echo
            "<li>
            <a href=#><i class='fa fa-flask nav_icon'></i>Quyền Hạn<span class='fa arrow'></span></a>
            <ul class='nav nav-second-level'>
            <li>
            <a href=$user_role_page>Danh Sách Cấp Bậc</a>
            </li>
            <li>
            <a href=$insert_user_role_page>Thêm Cấp Bậc</a>
            </li>
            </ul>
            <!-- nav-second-level -->
            </li>"
            ;} ?>
            <?php if($user->user_role_id == 1 ){
            $user_admin_page = base_url("user-admin.html");
            $insert_user_admin_page = base_url("insert-user-admin.html");
            $user_admin_deleted_page = base_url("user-admin-deleted.html");
            echo
            "<li>
            <a href=#><i class='fa fa-check-square-o nav_icon'></i>Quản Trị Viên<span class='fa arrow'></span></a>
            <ul class='nav nav-second-level'>
            <li>
            <a href=$user_admin_page>Danh Sách Quản Trị Viên</a>
            </li>
            <li>
            <a href=$insert_user_admin_page>Thêm Quản Trị Viên</a>
            </li>
            <li>
            <a href=$user_admin_deleted_page>Thành Viên Đã Xóa</a>
            </li>
            </ul>
            <!-- nav-second-level -->
            </li>"
            ;} ?>
            <li>
                <a href="#"><i class="fa fa-table nav_icon"></i>Quản Lý Xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('vehicle.html'); ?>">Danh Sách Xe</a></li>
                    <li><a href="<?php echo base_url('insert-vehicle.html'); ?>">Thêm Xe</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw nav_icon"></i>Quản Lý Thương Hiệu Xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('vehicle-brand.html'); ?>">Danh Sách Thương Hiệu Xe</a></li>
                    <li><a href="<?php echo base_url('insert-vehicle-brand.html'); ?>">Thêm Thương Hiệu Xe</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw nav_icon"></i>Quản Lý Loại Xe<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('vehicle-type.html'); ?>">Danh Sách Loại Xe</a></li>
                    <li><a href="<?php echo base_url('insert-vehicle-type.html'); ?>">Thêm Loại Xe</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('#'); ?>"><i class="fa fa-indent nav_icon"></i>Quản Lý Trang<span class='fa arrow'></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo base_url('list-page.html'); ?>">Danh Sách Trang</a></li>
                    <li><a href="<?php echo base_url('insert-page.html'); ?>">Thêm Trang</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>