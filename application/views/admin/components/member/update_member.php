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
		<h3>Cập Nhật Thành Viên</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$user_id = $this->uri->segment(2);
					$us = $this->user_model->get_user_by_id($user_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-user/$us->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Họ Tên Thành Viên</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $us->fullname; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Ngày Sinh</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="date_of_birth" value="<?php echo $us->date_of_birth; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo $us->email; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo $us->phone; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="Ảnh Sản Phẩm" class="col-sm-2 control-label">Ảnh Đại Diện</label>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <img class="data_image" src="<?php echo base_url(); ?>../public/admin/images/<?php echo $us->url_image; ?>">
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