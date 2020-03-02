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
  h1 { color: blue; font-family: 'Trocchi', serif; font-size: 20px; font-weight: normal; line-height: 48px; margin: 0; }
</style>
<h1>Đăng Ký</h1>
<div class="row">
    <div class="tab-conten">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" name="insert-form" method="POST" action="<?php echo base_url("xuly-dangky.html"); ?>" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Họ tên" name="fullname" value="<?php echo set_value("fullname"); ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('fullname'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-phone"></i></span>
                    <input type="number" placeholder="Số điện thoại" name="phone" value="<?php echo set_value("phone"); ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('phone'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-calendar"></i></span>
                    <input type="text" id="datepicker" placeholder="Ngày sinh" name="date_of_birth" value="<?php echo set_value("date_of_birth"); ?>" class="form-control">
                </div>
                	<span class="isa_error"><?php echo form_error('date_of_birth'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="type" placeholder="Email" name="email" value="<?php echo set_value("email"); ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('email'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="password" placeholder="Mật khẩu" name="password" value="<?php echo set_value("password"); ?>" class="form-control" />
                </div>
                	<span class="isa_error"><?php echo form_error('password'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirm" value="<?php echo set_value("password_confirm"); ?>" class="form-control"  />
                </div>
                	<span class="isa_error"><?php echo form_error('password_confirm'); ?></span>
                <div class="form-group input-group">
                    <input type="file" class="form-control1" id="exampleInputFile" name="url_image" value="<?php echo set_value("url_image"); ?>" />
                    <span class="isa_error"><?php echo form_error('url_image'); ?></span>
                </div>
                <div class="form-group">
                	<input type="hidden" name="user_role_id" value="4" class="form-control" />
                    <button class="btn btn-default" type="submit" name="reg-submit">Đăng Ký</button>
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>