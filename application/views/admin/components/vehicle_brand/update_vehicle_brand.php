<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Cập Nhật Thương Hiệu Xe</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$vehicle_brand_id = $this->uri->segment(2);
					$vh = $this->admin_model->update_vehicle_brand_by_id($vehicle_brand_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-vehicle-brand/$vh->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Mã Thương Hiệu Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="product_id_hidden" value="<?php echo $vh->id; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Thương Hiệu Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $vh->name; ?>">
							<span class="error_field"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">Loại Xe</label>
						<div class="col-sm-8">
							<select id="selector1" class="form-control1" name="vehicle_type_id">
								<?php
								$vehicle_type = $this->admin_model->show_vehicle_type();
								?>
								<?php foreach($vehicle_type as $vt):?>
								<option value="<?php echo $vt->id;?>" <?php if($vh->vehicle_type_id == $vt->id) {echo "selected";} ?>>
									<?php echo $vt->name; ?>
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