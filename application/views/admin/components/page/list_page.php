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
						<h2>Danh Sách Trang</h2>
						<div class="panel-ctrls" data-actions-container="">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="chu">Tiêu Đề Trang</th>
						<th class="chu">Nội Dung</th>
						<th class="chu">Trạng Thái</th>
						<th class="chu" colspan="2">Tùy Chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$page = $this->page_model->show_page();
					foreach ($page as $pg) {
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $pg->name; ?></th>
						<td><?php echo character_limiter($pg->content,200); ?></td>
						<td><?php echo $pg->status ? 'Hoạt Động' : 'Không Hoạt Động'; ?></td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("update-page/$pg->id.html"); ?>">Cập Nhập Trạng Thái Hoạt Động</a>
						</td>
						<td class="chu">
						<a class="btn-success btn" href="<?php echo base_url("process-delete-page/$pg->id.html"); ?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa Trang</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
