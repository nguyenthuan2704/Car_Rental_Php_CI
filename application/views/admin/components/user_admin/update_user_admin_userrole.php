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
		<h3>Cập Nhật Quản Trị Viên</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$user_admin_id = $this->uri->segment(2);
					$us = $this->user_admin_model->get_user_admin_by_id($user_admin_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-user-admin-userrole/$us->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Họ Tên Quản Trị Viên</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $us->fullname; ?>" disabled="">
							<span class="error_field"><?php echo form_error('fullname'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Đăng Nhập</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="username" value="<?php echo $us->username; ?>" disabled="">
							<span class="error_field"><?php echo form_error('username'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo $us->email; ?>" disabled="">
							<span class="error_field"><?php echo form_error('email'); ?></span>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ảnh Đại Diện</label>
                        <div class="col-sm-3">
                            <img class="data_image" src="<?php echo base_url(); ?>../public/admin/images/<?php echo $us->url_image; ?>">
                        </div>
                    </div>
					<div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">Cấp Bậc</label>
						<div class="col-sm-8">
							<select id="selector1" class="form-control1" name="vehicle_type_id">
								<?php
								$user_role = $this->user_role_model->show_user_role();
								?>
								<?php foreach($user_role as $ur):?>
								<option value="<?php echo $ur->id;?>" <?php if($us->user_role_id == $ur->id) {echo "selected";} ?>>
									<?php echo $ur->name; ?>
								</option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Trạng Thái</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="status" value="1" <?php if($us->status == 1) { echo "checked='checked'"; } ?>> Hoạt Động</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="status" value="0" <?php if($us->status == 0) { echo "checked='checked'"; } ?>> Không Hoạt Động</label>
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