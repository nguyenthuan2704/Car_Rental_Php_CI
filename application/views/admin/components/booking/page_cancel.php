<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
	#list-pro{
	margin-bottom:0;
	}
	#panell{
	display: block;
	}
	.hinh_anh{
	width: 220px;
	height: 98px;
	}
	.chu{
	text-align: center;
	}
	.data_image
	{
		width: 200px;
		height: 100px;
	}
</style>
<div class="graphs">
	<div class="xs">
		<h3>Lý Do Từ Chối Đơn Hàng</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$booking_id = $this->uri->segment(2);
					$book = $this->admin_model->show_booking_by_id($booking_id);
				?>
				<form class="form-horizontal" name="update-form" method="POST" action="<?php echo base_url("process-page-cancel/$book->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Mã Đơn Hàng</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="id" value="<?php echo $book->id; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Khách Hàng</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="fullname" value="<?php echo $book->fullname; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Điện Thoại</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="phone" value="<?php echo $book->phone; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="email" value="<?php echo $book->email; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Ngày Đi</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="departure_date" value="<?php echo $newDate = date("d-m-Y", strtotime($book->departure_date)); ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Ngày Về</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="back_date" value="<?php echo $newDate = date("d-m-Y", strtotime($book->back_date)); ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tên Xe</label>
						<div class="col-sm-8">
							<?php $vehicle = $this->admin_model->get_vehicle_for_vehicle_id($book->vehicle_id); ?>
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $vehicle->name; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="Ảnh Sản Phẩm" class="col-sm-2 control-label">Hình Ảnh Xe</label>
						<div class="col-sm-8">
							<img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Loại Xe</label>
						<div class="col-sm-8">
							<?php $vehicle_type = $this->admin_model->get_vehicle_type_for_id($vehicle->vehicle_type_id); ?>
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $vehicle_type->name; ?>" readonly="true">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Lý Do Từ Chối</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="reason_cancel" value="<?php echo set_value("reason_cancel"); ?>" required  oninvalid="setCustomValidity('Bạn chưa nhập lí do hủy đơn!')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn-success btn" name="btn-submit">Cancel Bill</button>
								<button class="btn-inverse btn">Reset</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>