<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Nội Dung Liên Hệ</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$contact_id = $this->uri->segment(2);
					$ct = $this->contact_model->get_contact_by_id($contact_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-contact-details/$ct->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Mã Số</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="id" value="<?php echo $ct->id; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Họ Tên Người Liên Hệ</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $ct->fullname; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $ct->email; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Tiêu Đề</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $ct->subject; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Ngày Nhận</label>
						<div class="col-sm-8">
							<?php
								$fm_date = $ct->contact_date;
								$ct_date = date('d/m/Y',strtotime($fm_date));
								$ct_time = date('h:ia',strtotime($fm_date));
							?>
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $ct_time; ?> - <?php echo $ct_date; ?>" disabled="">
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Nội Dung</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="content" disabled="" rows="20" cols="500"><?php echo $ct->content; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Trạng Thái</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="status" value="1" <?php if($ct->status == 1) { echo "checked='checked'"; } ?>> Đánh Dấu Chưa Xem</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="status" value="0" <?php if($ct->status == 0) { echo "checked='checked'"; } ?>> Đánh Dấu Đã Xem</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">
							<button class="btn-success btn" name="btn-submit">Xác nhận</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>