<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $("#datepicker").datepicker({dateFormat: "dd-mm-yy"});
    });
</script>
<style type="text/css">
  .isa_error {
      color: #D8000C;
      background-color: #FFD2D2;
  }
  #current_image
  {
    width: 100px;height: 100px;
  }
  h1 { color: blue; font-family: 'Trocchi', serif; font-size: 20px; font-weight: normal; line-height: 48px; margin: 0; }
</style>
<h1>Cập Nhật Thông Tin Tài Khoản</h1>
<div class="row">
    <div class="tab-conten">
        <div class="tab-pane active" id="horizontal-form">
                <?php
                    $user_id = $this->uri->segment(2);
                    $us = $this->user_model->get_user_by_id($user_id);
                ?>
            <form class="form-horizontal" name="insert-form" method="POST" action="<?php echo base_url("xuly-capnhat-taikhoan/$us->id.html"); ?>" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Họ tên" name="fullname" value="<?php echo $us->fullname; ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('fullname'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-phone"></i></span>
                    <input type="number" placeholder="Số điện thoại" name="phone" value="<?php echo $us->phone; ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('phone'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-calendar"></i></span>
                    <input type="text" id="datepicker" placeholder="Ngày sinh" name="date_of_birth" value="<?php echo $newDate = date("d-m-Y", strtotime($us->date_of_birth)); ?>" class="form-control">
                </div>
                	<span class="isa_error"><?php echo form_error('date_of_birth'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="type" placeholder="Email" name="email" value="<?php echo $us->email; ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('email'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="password" placeholder="Mật khẩu" name="password" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('password'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirm" class="form-control"  />
                </div>
                	<span class="isa_error"><?php echo form_error('password_confirm'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                    <input type="text" name="current_image" value="<?php echo $us->url_image; ?>" class="form-control" readonly="true" />
                </div>
                <div class="form-group input-group">
                    <img class="data_image" id="current_image" src="<?php echo base_url(); ?>../public/user/images/member/<?php echo $us->url_image; ?>">
                    <input type="file" class="form-control1" id="exampleInputFile" name="url_image" />
                </div>
                <div class="form-group">
                	<input type="hidden" name="user_role_id" value="4" class="form-control" />
                    <button class="btn btn-default" type="submit" name="update-submit">Cập Nhật</button>
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>