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
	.avatar-user
	{
		width: 100px;
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
						<h2>Thành Viên Đăng Ký Theo Dõi</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Email</th>
						<th class="chu">Ngày Đăng Ký Theo Dõi</th>
						<th class="chu">Ngày Bỏ Đăng Ký Theo Dõi</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu">Tùy Chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$user = $this->user_model->show_subscriber();
					foreach ($user as $us) {
					?>
					<tr class="chu">
						<td><?php echo $us->email; ?></td>
						<?php
							$fm_date = $us->subscribe_date;
							$ct_date = date('d/m/Y - h:i',strtotime($fm_date));
						?>
						<td><?php echo $ct_date; ?></td>
						<?php
							$fm_date = $us->unsubscribe_date;
							$uct_date = date('d/m/Y - h:i',strtotime($fm_date));
						?>
						<td><?php echo $uct_date; ?></td>
						<td><?php echo $us->status ? 'Đang Theo Dõi' : 'Không Theo Dõi'; ?></td>
						<td class="chu">
							<a class="btn-success btn" href="<?php echo base_url("process-unsubscribe/$us->id.html"); ?>">Cập Nhập Trạng Thái Hoạt Động</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
