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
						<h2>Danh Sách Thành Viên Đăng Ký</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Tên Thành Viên</th>
						<th class="chu">Ảnh Đại Diện</th>
						<th class="chu">Ngày Sinh</th>
						<th class="chu">Số Điện Thoại</th>
						<th class="chu">Email</th>
						<th class="chu">Cấp Bậc</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu" colspan="2">Tùy Chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$user = $this->user_model->show_user();
					foreach ($user as $us) {
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $us->fullname; ?></th>
						<td><img class="avatar-user" src="<?php echo base_url(); ?>../public/user/images/member/<?php echo $us->url_image; ?>" alt=""></td>
						<?php
							$fm_date = $us->date_of_birth;
							$ct_date = date('d/m/Y - h:i',strtotime($fm_date));
						?>
						<td><?php echo $ct_date; ?></td>
						<td><?php echo $us->phone; ?></td>
						<td><?php echo $us->email; ?></td>
						<?php
							$user_role = $this->user_role_model->get_user_role_by_id($us->user_role_id);
						?>
						<td><?php echo $user_role->name; ?></td>
						<td><?php echo $us->status ? 'Hoạt Động' : 'Không Hoạt Động'; ?></td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("update-user/$us->id.html"); ?>">Cập Nhập Trạng Thái Hoạt Động</a>
						</td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("process-delete-user/$us->id.html"); ?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa Thành Viên</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
