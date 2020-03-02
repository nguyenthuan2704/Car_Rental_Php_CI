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
						<h2>Danh Sách Quyền Hạn</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Mã Quyền Hạn</th>
						<th class="chu">Tên Quyền Hạn</th>
						<th class="chu">Ngày Khởi Tạo</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu">Cập Nhật</th>
						<th class="chu">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$user_role = $this->user_role_model->show_user_role();
					foreach ($user_role as $ur) {
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $ur->id; ?></th>
						<td><?php echo $ur->name; ?></td>
						<?php
							$fm_date = $ur->created_at;
							$ct_date = date('d/m/Y - h:ia',strtotime($fm_date));
						?>
						<td><?php echo $ct_date; ?></td>
						<td><?php echo $ur->status ? 'Hoạt Động' : 'Không Hoạt Động'; ?></td>
						<td class="chu"><a class="btn-success btn" href="<?php echo base_url("update-user-role/$ur->id.html"); ?>">Sửa</a></td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("process-delete-user-role/$ur->id.html"); ?>" onclick="return confirm('Bạn có muốn xóa không?')">
						Xóa
						</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
