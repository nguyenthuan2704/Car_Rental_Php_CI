<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
	.data_image
	{
		width: 910px;
		height: 400px;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Thêm Quản Trị Viên</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal" name="insert-form" method="POST" action="<?php echo base_url("process-insert-user-admin.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Họ Tên Quản Trị Viên</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo set_value('fullname'); ?>">
							<span class="error_field"><?php echo form_error('fullname'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Đăng Nhập</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="username" value="<?php echo set_value('username'); ?>">
							<span class="error_field"><?php echo form_error('username'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Mật Khẩu</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" name="password" value="<?php echo set_value('password'); ?>">
							<span class="error_field"><?php echo form_error('password'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Nhập Lại Mật Khẩu</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>">
							<span class="error_field"><?php echo form_error('password_confirm'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo set_value('email'); ?>">
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
						<label for="selector1" class="col-sm-2 control-label">Cấp Bậc</label>
						<div class="col-sm-8">
							<select id="selector1" class="form-control1" name="user_role_id">
								<?php
								$user_role = $this->user_role_model->show_user_role();
								?>
								<?php foreach($user_role as $ur):?>
								<option value="<?php echo $ur->id;?>">
									<?php echo $ur->name; ?>
								</option>
								<?php endforeach;?>
							</select>
							<span class="error_field"><?php echo form_error('vehicle_type_id'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Trạng Thái</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="status" value="1" checked> Hoạt Động</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="status" value="0"> Không Hoạt Động</label>
							</div>
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