<style type="text/css">
  .isa_error {
      color: #D8000C;
  }
  h1 { color: blue; font-family: 'Trocchi', serif; font-size: 20px; font-weight: normal; line-height: 48px; margin: 0; }
</style>
<h1>Đăng Nhập</h1>
<div class="row">
    <div class="tab-conten">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" name="login-form" method="POST" action="<?php echo base_url("xuly-dangnhap.html"); ?>" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" placeholder="Email" name="email" class="form-control" value="<?php echo set_value("email"); ?>"  />
                </div>
                	<span class="isa_error"><?php echo form_error('email'); ?></span>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="password" placeholder="Mật khẩu" name="password" class="form-control" value="<?php echo set_value("password"); ?>"  />
                </div>
                	<span class="isa_error"><?php echo form_error('password'); ?></span>
                    <span class="isa_error"><?php echo $error;?></span>
                <div class="form-group">
                    <button class="btn btn-default" type="submit" name="log-submit">Đăng Nhập</button>
                    <input type="reset" class="btn btn-default" value="Reset">
                    <a href="<?php echo base_url("quen-matkhau.html"); ?>" class="btn-danger">Quên mật khẩu?</a>
                </div>
            </form>
        </div>
    </div>
</div>