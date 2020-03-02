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
</style>
<link href="<?php echo base_url(); ?>../public/admin/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>../public/admin/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>../public/admin/js/custom.js"></script>
<div class="col-md-12 graphs">
	<div class="xs">
		<div class="bs-example4" data-example-id="simple-responsive-table">
			<div class="table-responsive">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h2>Danh Sách Đơn Hàng</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
<!-- 						<th class="chu">Mã Đơn Hàng</th> -->
						<th class="chu">Tên Khách Đặt Xe</th>
						<th class="chu">Số Điện Thoại</th>
						<th class="chu">Email</th>
						<th class="chu">Ngày Gửi Yêu Cầu</th>
						<th class="chu">Tên Xe Đặt</th>
						<th class="chu">Hình Ảnh Xe</th>
						<th class="chu">Ngày Khởi Hành</th>
						<th class="chu">Ngày Về</th>
						<th class="chu">Địa Điểm Khởi Hành</th>
						<th class="chu">Lịch Trình</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu" colspan="2">Tùy Chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$booking = $this->admin_model->show_booking();
					foreach ($booking as $book) {
					?>
					<tr class="chu">
						<!-- <td></?php echo $book->id; ?></td> -->
						<input type="hidden" name="id" value="<?php echo $book->id; ?>" />
						<td><?php echo $book->fullname; ?></td>
						<td><?php echo $book->phone; ?></td>
						<td><?php echo $book->email; ?></td>
						<td><?php echo $book->booking_date; ?></td>
						<?php $vehicle = $this->admin_model->get_vehicle_for_vehicle_id($book->vehicle_id); ?>
						<td><?php echo $vehicle->name; ?></td>
						<td><img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>" alt=""></td>
						<td><?php echo $book->departure_date; ?></td>
						<td><?php echo $book->back_date; ?></td>
						<td><?php echo $book->departure_address; ?></td>
						<td><?php echo $book->schedule; ?></td>
						<td><?php echo $book->confirm ? 'Chấp Nhận' : 'Chưa Chấp Nhận'; ?></td>
						<td>
	                        <a class="btn-success btn" href="<?php echo base_url("booking_confirm/$book->id.html") ?>" onclick="return confirm('Bạn có chắc không?')">Chấp Nhận</a>
						</td>
						<td>
	                        <a class="btn-success btn" href="<?php echo base_url("page-cancel/$book->id.html") ?>" onclick="return confirm('Bạn có chắc không?')">Từ Chối</a>
						</td>
					</tr>
					<?php }  ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
