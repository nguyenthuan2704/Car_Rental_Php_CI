<style type="text/css" media="screen">
	.error_field
	{
		color: red;
	}
</style>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<div class="graphs">
	<div class="xs">
		<h3>Cập Nhật Trang</h3>
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<?php
					$page_id = $this->uri->segment(2);
					$page = $this->page_model->update_page_by_id($page_id);
				?>
				<form class="form-horizontal" name="insert-form" method="POST" action="<?php echo base_url("process-update-page/$page->id.html"); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Tiêu Đề Trang</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="name" value="<?php echo $page->name; ?>">
							<span class="error_field"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Nội Dung</label>
						<div class="col-sm-8">
							<textarea name="content"><?php echo $page->content; ?></textarea>
							<script>
			                        CKEDITOR.replace( 'content' );
			                </script>
							<span class="error_field"><?php echo form_error('content'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Trạng Thái</label>
						<div class="col-sm-8">
							<div class="radio-inline">
								<label><input type="radio" name="status" value="1" <?php if($page->status == 1) { echo "checked='checked'"; } ?>> Hoạt Động</label>
							</div>
							<div class="radio-inline">
								<label><input type="radio" name="status" value="0" <?php if($page->status == 0) { echo "checked='checked'"; } ?>> Không Hoạt Động</label>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn-success btn" name="update-page-submit">Confirm</button>
								<button class="btn-inverse btn">Reset</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>