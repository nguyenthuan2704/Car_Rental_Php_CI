<style type="text/css" media="screen">
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
  .isa_error {
      color: #D8000C;
      background-color: #FFD2D2;
  }
	.nof { color: blue; font-family: 'Trocchi', serif; font-size: 30px; font-weight: normal; line-height: 48px; margin: 0; text-align: center; }
</style>
<link href="<?php echo base_url(); ?>../public/admin/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>../public/admin/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>../public/admin/js/custom.js"></script>
<div class="col-md-12 graphs">
	<div class="xs">
		<div class="bs-example4" data-example-id="simple-responsive-table">
			<br>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h2 class="nof">Đơn Hàng Của Bạn</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Mã Đơn Hàng</th>
						<th class="chu">Tên Khách Đặt Xe</th>
						<th class="chu">Số Điện Thoại</th>
						<th class="chu">Email</th>
						<th class="chu">Tên Xe Đặt</th>
						<th class="chu">Hình Ảnh Xe</th>
						<th class="chu">Ngày Khởi Hành</th>
						<th class="chu">Ngày Về</th>
						<th class="chu">Địa Điểm Khởi Hành</th>
						<th class="chu">Lịch Trình</th>
						<th class="chu">Trạng Thái</th>
					<?php
						$user_id = $this->uri->segment(2);
						$books = $this->admin_model->show_all_booking_by_user_id($user_id);
						foreach ($books as $book){
						if($book->reason_cancel != null){echo"<th class='chu'>Trạng Thái</th>";}}
					?>
						<th class="chu">Tùy Chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$user_id = $this->uri->segment(2);
						$books = $this->admin_model->show_all_booking_by_user_id($user_id);
						foreach ($books as $book):
					?>
					<tr class="chu">
						<td><?php echo $book->id; ?></td>
						<td><?php echo $book->fullname; ?></td>
						<td><?php echo $book->phone; ?></td>
						<td><?php echo $book->email; ?></td>
						<?php $vehicle = $this->admin_model->get_vehicle_for_vehicle_id($book->vehicle_id); ?>
						<td><?php echo $vehicle->name; ?></td>
						<td><img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>" alt=""></td>
						<td><?php echo $book->departure_date; ?></td>
						<td><?php echo $book->back_date; ?></td>
						<td><?php echo $book->departure_address; ?></td>
						<td><?php echo $book->schedule; ?></td>
						<td><?php echo $book->confirm ? 'Chấp Nhận' : 'Đang Chờ Phản Hồi'; ?></td>
					<?php if($book->reason_cancel != null){echo"<td>$book->reason_cancel</td>";} ?>
						<td>
	                        <a class="btn-success btn" href="<?php echo base_url("huy-don/$book->id.html") ?>" onclick="return confirm('Bạn có muốn xóa không?')">Hủy Đơn</a>
						</td>
<!-- 						<td>
	                        <a class="btn-success btn" data-toggle="modal" data-target="#myModalDelete">Hủy Đơn</a>
						</td> -->
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-md-12 graphs">
	<div class="xs">
		<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h2 class="nof">Thông Tin Xe Đã Đặt</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Tên Loại Xe</th>
						<th class="chu">Hình Ảnh</th>
						<th class="chu">Thương Hiệu Xe</th>
						<th class="chu">Loại Xe</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$user_id = $this->uri->segment(2);
						$books = $this->admin_model->show_all_booking_by_user_id($user_id);
						foreach ($books as $book):
						$vehicle = $this->admin_model->get_vehicle_for_vehicle_id($book->vehicle_id);
					?>
					<tr class="chu">
						<td><?php echo $vehicle->name; ?></td>
						<td><img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>" alt=""></td>
						<?php $vehicle_brand = $this->admin_model->get_vehicle_brand_for_id($vehicle->vehicle_brand_id); ?>
						<td><?php echo $vehicle_brand->name; ?></td>
						<?php $vehicle_type = $this->admin_model->get_vehicle_type_for_id($vehicle->vehicle_type_id); ?>
						<td><?php echo $vehicle_type->name; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Process Cancel Bill  -->
<!--     ob_start();
      if(isset($_POST['cancel-submit'])):
			$id = $this->uri->segment(2);
			$reason_cancel = $this->input->post('reason_cancel');
				$data = array(
					'reason_cancel' =>  $reason_cancel,
					'status' => 0,
					'cancel' => 1,
					'cancel_date' => date('Y-m-d H:i:s')
				);
				$this->bookcar_model->cancel_bill_by_user($id,$data);
				redirect(base_url("cancel-success.html"));
		endif; -->

<!-- Nofication Book Form -->
<!-- <div class="container">
    <div class="modal fade" id="myModalDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="nof">Lí Do Hủy Đơn</h1>
                </div>
                <div class="modal-body">
                	<form action="</?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="cancel-form" enctype="multipart/form-data">
                        <div class="contact-feedback">
							<div class="form-group input-group">
			                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-edit"></i></span>
			                    <input type="text" placeholder="Nhập lí do" name="reason_cancel" value="</?php echo set_value("reason_cancel"); ?>" class="form-control"  required  oninvalid="setCustomValidity('Bạn chưa nhập lí do hủy đơn!')" oninput="setCustomValidity('')"/>
			                </div>
			                <span class="isa_error"></?php echo form_error('reason_cancel'); ?></span>
                            <input type="submit" name="cancel-submit" value="Xác Nhận Hủy" class="btn btn-default">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><div class="col-md-6 col-sm-12 col-xs-12"></div></div>
            </div>
        </div>
    </div>
</div> -->