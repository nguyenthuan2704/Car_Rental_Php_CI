<style type="text/css">
  .chu{text-align: center;}
  h2 { color: blue; font-family: 'Trocchi', serif; font-size: 30px; font-weight: normal; line-height: 48px; margin: 0; text-align: center; }
</style>
<div class="col-md-12 graphs">
	<div class="xs">
		<div class="bs-example4">
			<div class="table-responsive">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h2>Giỏ Hàng</h2>
						<div class="panel-ctrls">
							<span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
						</div>
					</div>
				</div>
	    	<?php
	    		if(!$this->cart->contents()):
	    			echo 'Bạn chưa có sản phẩm nào trong giỏ hảng!';
	    		else:
	    	?>
			<table class="table table-bordered">
					<tr>
						<th class="chu">Mã Xe</th>
						<th class="chu">Tên Xe</th>
						<th class="chu">Số Lượng</th>
						<th class="chu">Cập Nhật</th>
						<th class="chu">Xóa</th>
					</tr>
					<?php
						$i = 1;
						$cart = $this->cart->contents();
						foreach ($cart as $items):
						echo form_hidden($i.'[rowid]', $items['rowid']);
						echo form_hidden($i.'[rowid]', $items['id']);
						echo form_hidden($i.'[rowid]', $items['name']);
						echo form_hidden($i.'[rowid]', $items['qty']);
					?>
					<tr class="chu">
						<th scope="row" class="chu"><?php echo $items['id']; ?></th>
						<td><?php echo $items['name']; ?></td>
							<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
			                    <p>
			                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
			                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
			                        <?php endforeach; ?>
			                    </p>
		        			<?php endif; ?>
						<td><input type="text" name="qty" value="<?php echo $items['qty'] ?>" size="3" id="qty" /></td>
						<td class="chu"><a href="" class="btn-default">Cập Nhật</a></td>
						<td class="chu"><a href="<?php echo base_url("xoa-gio-hang/".$items['rowid']); ?>" class="btn-default">Xóa</a></td>
					</tr>
			</table>
					<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>