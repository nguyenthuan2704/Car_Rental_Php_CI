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
						<h2>Quản Lý Liên Hệ</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Mã Liên Hệ</th>
						<th class="chu">Tên Người Liên Hệ</th>
						<th class="chu">Email</th>
						<th class="chu">Tiêu Đề</th>
						<th class="chu">Ngày Gửi</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu">Nội Dung</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$contact = $this->contact_model->show_contact_unread();
					foreach ($contact as $ct) {
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $ct->id; ?></th>
						<td><?php echo $ct->fullname; ?></td>
						<td><?php echo $ct->email; ?></td>
						<td><?php echo $ct->subject; ?></td>
						<?php
							$fm_date = $ct->contact_date;
							$ct_date = date('d/m/Y - h:i',strtotime($fm_date));
						?>
						<td><?php echo $ct_date; ?></td>
						<td><?php echo $ct->status ? 'Chưa Xem' : 'Đã Xem'; ?></td>
						<td class="chu"><a class="btn-success btn" href="<?php echo base_url("contact-details/$ct->id.html"); ?>">Chi tiết</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
