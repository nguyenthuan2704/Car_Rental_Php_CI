<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Cập Nhật Loại Xe</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$vehicle_type_id = $this->uri->segment(2);
					$vh = $this->admin_model->update_vehicle_type_by_id($vehicle_type_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-vehicle-type/$vh->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Mã Loại Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="product_id_hidden" value="<?php echo $vh->id; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Loại Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $vh->name; ?>">
							<span class="error_field"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Trạng Thái</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="status" value="1" <?php if($vh->status == 1) { echo "checked='checked'"; } ?>> Hoạt Động</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="status" value="0" <?php if($vh->status == 0) { echo "checked='checked'"; } ?>> Không Hoạt Động</label>
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