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
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<div class="graphs">
	<div class="xs">
		<h3>Cập Nhật Xe</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$vehicle_id = $this->uri->segment(2);
					$vh = $this->admin_model->update_vehicle_by_id($vehicle_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-update-vehicle/$vh->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Mã Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="product_id_hidden" value="<?php echo $vh->id; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Xe</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $vh->name; ?>">
							<span class="error_field"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="Ảnh Sản Phẩm" class="col-sm-2 control-label">Hình Ảnh Xe</label>
						<div class="col-sm-8">
							<input type="file" class="form-control1" id="exampleInputFile" name="url_image">
							<span class="error_field"><?php echo form_error('url_image'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Nội Dung</label>
						<div class="col-sm-8">
							<textarea name="content"><?php echo $vh->content; ?></textarea>
							<script>
			                        CKEDITOR.replace( 'content' );
			                </script>
							<span class="error_field"><?php echo form_error('content'); ?></span>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                            <img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vh->url_image; ?>">
                            <input type="text" class="form-control" id="current_image" name="current_image" value="<?php echo $vh->url_image; ?>" readonly="true">
                        </div>
                    </div>
					<div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">Thương Hiệu Xe</label>
						<div class="col-sm-8">
							<select id="selector1" class="form-control1" name="vehicle_brand_id">
								<?php
								$vehicle_brand = $this->admin_model->show_vehicle_brand();
								?>
								<?php foreach($vehicle_brand as $vb):?>
								<option value="<?php echo $vb->id;?>" <?php if($vh->vehicle_brand_id == $vb->id) {echo "selected";} ?>>
									<?php echo $vb->name; ?>
								</option>
								<?php endforeach;?>
							</select>
							<span class="error_field"><?php echo form_error('vehicle_brand_id'); ?></span>
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
						<label for="radio" class="col-sm-2 control-label">Sản Phẩm Hot</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="hot" value="1" <?php if($vh->hot == 1) { echo "checked='checked'"; } ?>> Có</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="hot" value="0" <?php if($vh->hot == 0) { echo "checked='checked'"; } ?>> Không</label>
							</div>
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