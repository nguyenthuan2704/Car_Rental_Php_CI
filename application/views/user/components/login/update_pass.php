<?php
   $email = $this->session->userdata('email');
  if(!isset($email)) :
    redirect(base_url('quen-matkhau.html'));
  endif;
  $user = $this->user_model->get_user_by_email($email);
?>
<style type="text/css">
  .isa_error {
      color: #D8000C;
  }
  h1 { color: blue; font-family: 'Trocchi', serif; font-size: 20px; font-weight: normal; line-height: 48px; margin: 0; }
</style>
<h1>Cập Nhật Mật Khẩu</h1>
<div class="row">
    <div class="tab-conten">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("matkhau-moi.html"); ?>" enctype="multipart/form-data">
                <div class="form-group input-group hidden">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="text" name="id" value="<?php echo $user->id; ?>" class="form-control" />
                </div>
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
                <div class="form-group">
                    <button class="btn btn-default" type="submit" name="pass-submit">Xác Nhận</button>
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>