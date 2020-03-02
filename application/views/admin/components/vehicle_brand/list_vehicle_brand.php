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
						<h2>Quản Lý Thương Hiệu Xe</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Mã Thương Hiệu Xe</th>
						<th class="chu">Tên Thương Hiệu Xe</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu">Loại Xe</th>
						<th class="chu">Cập Nhật</th>
						<th class="chu">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$vehicle_brand = $this->admin_model->show_vehicle_brand();
					foreach ($vehicle_brand as $vh) {
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $vh->id; ?></th>
						<td><?php echo $vh->name; ?></td>
						<td><?php echo $vh->status ? 'Hoạt Động' : 'Không Hoạt Động'; ?></td>
						<?php
							$vehicle_type_id = $vh->vehicle_type_id;
							$vehicle_type = $this->admin_model->show_vehicle_type_for_id($vehicle_type_id);
							foreach ($vehicle_type as $vt) {
						?>
						<td><?php echo $vt->name; ?></td>
						<td class="chu"><a class="btn-success btn" href="<?php echo base_url("update-vehicle-brand/$vh->id.html"); ?>">Sửa</a></td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("process-delete-vehicle-brand/$vh->id.html"); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
						Xóa
						</a>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
