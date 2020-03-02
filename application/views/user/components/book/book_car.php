<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $("#datepicker").datepicker({dateFormat: "dd-mm-yy"});
    });
</script>
<script>
    $(document).ready(function(){
        $("#datepicker_backdate").datepicker({dateFormat: "dd-mm-yy"});
    });
</script>
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
	h1 { color: red; font-family: 'Trocchi', serif; font-size: 20px; font-weight: normal; line-height: 48px; margin: 0; text-align: center;}
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
						<h2 class="nof">Thông Tin Xe</h2>
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
					$vehicle_id = $this->uri->segment(2);
					$vehicle = $this->admin_model->get_vehicle_for_vehicle_id($vehicle_id);
					?>
					<tr class="chu">
						<td><?php echo $vehicle->name; ?></td>
						<td><img class="data_image" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>" alt=""></td>
						<?php $vehicle_brand = $this->admin_model->get_vehicle_brand_for_id($vehicle->vehicle_brand_id); ?>
						<td><?php echo $vehicle_brand->name; ?></td>
						<?php $vehicle_type = $this->admin_model->get_vehicle_type_for_id($vehicle->vehicle_type_id); ?>
						<td><?php echo $vehicle_type->name; ?></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<?php
	$email = $this->session->userdata('email');
	$user = $this->user_model->get_user_by_email($email);
?>
<h1>Thông Tin Khách Hàng Đặt Xe</h1>
<div class="xs">
    <div class="tab-conten">
        <div class="tab-pane active" id="horizontal-form">
            <form class="form-horizontal" name="login-form" method="POST" action="<?php echo base_url("xuly-datxe/$vehicle->id.html"); ?>" enctype="multipart/form-data">
            	<!-- User ID -->
                <div class="form-group input-group">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $user->id; ?>" readonly="true"  />
                </div>
                	<span class="isa_error"><?php echo form_error('fullname'); ?></span>
            	<!-- Full Name -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Họ Tên" name="fullname" class="form-control" value="<?php echo $user->fullname; ?>" readonly="true"  />
                </div>
                	<span class="isa_error"><?php echo form_error('fullname'); ?></span>
                <!-- Phone -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-phone"></i></span>
                    <input type="number" placeholder="Số điện thoại" name="phone" value="<?php echo $user->phone; ?>" class="form-control" readonly="true" />
                </div>
                	<span class="isa_error"><?php echo form_error('phone'); ?></span>
                <!-- Email -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" placeholder="Email" name="email" class="form-control" value="<?php echo $user->email; ?>" readonly="true"  />
                </div>
                	<span class="isa_error"><?php echo form_error('email'); ?></span>
                <!-- Departure Date -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-time"></i></span>
                    <input type="text" id="datepicker" placeholder="Ngày Khởi Hành" name="departure_date" value="<?php echo set_value("departure_date"); ?>" class="form-control">
                </div>
                	<span class="isa_error"><?php echo form_error('departure_date'); ?></span>
                <!-- Back Date -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-home"></i></span>
                    <input type="text" id="datepicker_backdate" placeholder="Ngày Về" name="back_date" value="<?php echo set_value("back_date"); ?>" class="form-control">
                </div>
                	<span class="isa_error"><?php echo form_error('back_date'); ?></span>
            	<!-- Departure Address -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" placeholder="Điạ Chỉ Khởi Hành" name="departure_address" class="form-control" value="<?php echo set_value("departure_address"); ?>"  />
                </div>
                	<span class="isa_error"><?php echo form_error('departure_address'); ?></span>
            	<!-- Schedule -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                    <input type="text" placeholder="Lịch Trình" name="schedule" class="form-control" value="<?php echo set_value("schedule"); ?>"  />
                </div>
                	<span class="isa_error"><?php echo form_error('schedule'); ?></span>
            	<!-- Service -->
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-plane"></i></span>
							<select id="selector1" class="form-control" name="service_id">
								<option value="">Mục đích thuê</option>
								<?php
								$service = $this->admin_model->show_service();
								?>
								<?php foreach($service as $sv):?>
								<option value="<?php echo $sv->id;?>">
									<?php echo $sv->name; ?>
								</option>
								<?php endforeach;?>
							</select>
                </div>
                	<span class="isa_error"><?php echo form_error('service_id'); ?></span>
                <div class="form-group">
                    <button class="btn btn-default" type="submit" name="btn-submit">Xác Nhận</button>
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>
