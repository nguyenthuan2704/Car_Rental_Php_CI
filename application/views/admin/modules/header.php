<?php
	$username = $this->session->userdata('username');
	$user = $this->login_model->get_user_by_username($username);
?>
<style type="text/css" media="screen">
	.admin-name
	{
		color: white;
	}
	#processs
	{
		width: 40%;
	}
</style>
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" id="top1">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url("admin.html"); ?>">Management</a>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<?php
					$contact = $this->contact_model->show_contact_unread();
				?>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><!-- <i class="fa fa-comments-o"></i> --><img src="<?php echo base_url(); ?>../public/user/images/message.png" alt=""><span class="badge"><?php echo count($contact); ?></span></a>
				<ul class="dropdown-menu">
					<li class="dropdown-menu-header">
						<strong>Liên Hệ Mới</strong>
						<div class="progress thin">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" id="processs">
								<span class="sr-only">40% Complete (success)</span>
							</div>
						</div>
					</li>
					<?php
						$contact = $this->contact_model->show_contact_new();
						foreach ($contact as $ct):
					?>
					<li class="avatar">
						<a href="#">
							<img src="<?php echo base_url(); ?>../public/admin/images/7.png" alt=""/>
							<div><?php echo $ct->email; ?></div>
						<?php
							$fm_date = $ct->contact_date;
							$ct_date = date('d/m/Y - h:i',strtotime($fm_date));
						?>
							<small><?php echo $ct_date; ?></small>
							<span class="label label-info">NEW</span>
						</a>
					</li>
					<?php endforeach; ?>
<!-- 					<li class="avatar">
						<a href="#">
							<img src="</?php echo base_url(); ?>../public/admin/images/7.png" alt=""/>
							<div>New message</div>
							<small>1 minute ago</small>
							<span class="label label-info">NEW</span>
						</a>
					</li> -->
					<li class="dropdown-menu-footer text-center">
						<a href="<?php echo base_url("contact.html"); ?>">View all messages</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
					<img src="<?php echo base_url(); ?>../public/admin/images/<?php echo $user->url_image; ?> ?>">
					<b class="admin-name">
					<?php echo $user->fullname; ?>
					</b><!-- <span class="badge"></span> -->
				</a>
				<ul class="dropdown-menu">
					<li class="dropdown-menu-header text-center">
						<strong>Account</strong>
					</li>
					<li class="m_2"><a href="<?php echo base_url("update-user-admin/$user->id.html"); ?>"><i class="fa fa-user"></i> Profile</a></li>
					<!-- <li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span class="label label-info">42</span></a></li>
					<li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i> Messages <span class="label label-success">42</span></a></li>
					<li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span class="label label-danger">42</span></a></li>
					<li><a href="#"><i class="fa fa-comments"></i> Comments <span class="label label-warning">42</span></a></li> -->
					<li class="dropdown-menu-header text-center">
						<strong>Settings</strong>
					</li>
					<!-- <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
					<li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span class="label label-default">42</span></a></li>
					<li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span class="label label-primary">42</span></a></li>
					<li class="divider"></li>
					<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li> -->
					<li class="m_2"><a href="<?php echo base_url('logout.html'); ?>"><i class="fa fa-lock"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
<!-- 		<form class="navbar-form navbar-right">
			<input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
		</form> -->
		<!-- menu-left -->
		<?php $this->load->view('admin/modules/menu-left.php'); ?>
		<!-- end menu-left -->
	</div>
</nav>