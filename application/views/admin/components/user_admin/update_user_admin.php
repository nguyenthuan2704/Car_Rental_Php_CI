<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
	.data_image
	{
		width: 100px;
		height: 100px;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Cập Nhật Thông Tin Quản Trị Viên</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$user_admin_id = $this->uri->segment(2);
					$us = $this->user_admin_model->get_user_admin_by_id($user_admin_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-user-admin/$us->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Họ Tên Quản Trị Viên</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $us->fullname; ?>">
							<span class="error_field"><?php echo form_error('fullname'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Đăng Nhập</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="username" value="<?php echo $us->username; ?>">
							<span class="error_field"><?php echo form_error('username'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Mật Khẩu</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" name="password">
							<span class="error_field"><?php echo form_error('password'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Nhập Lại Mật Khẩu</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" name="password_confirm">
							<span class="error_field"><?php echo form_error('password_confirm'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo $us->email; ?>">
							<span class="error_field"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="Ảnh Sản Phẩm" class="col-sm-2 control-label">Ảnh Đại Diện</label>
						<div class="col-sm-8">
							<input type="file" class="form-control1" id="exampleInputFile" name="url_image">
							<span class="error_field"><?php echo form_error('url_image'); ?></span>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <img class="data_image" src="<?php echo base_url(); ?>../public/admin/images/<?php echo $us->url_image; ?>">
                            <input type="text" class="form-control" id="current_image" name="current_image" value="<?php echo $us->url_image; ?>" readonly="true">
                        </div>
                    </div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn-success btn" name="btn-submit">Confirm</button>
								<button class="btn-inverse btn">Reset</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>