<?php
  $username = $this->session->userdata('username');
  if(!isset($username)) :
    redirect(base_url('login.html'));
  endif;
  $user = $this->login_model->get_user_by_username($username);
?>
<?php
    ob_start();
    $page = uri_string();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>../public/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>../public/admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?php echo base_url(); ?>../public/admin/css/lines.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>../public/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?php echo base_url();?>../public/admin/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->
<!-- Nav CSS -->
<link href="<?php echo base_url(); ?>../public/admin/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>../public/admin/js/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>../public/admin/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="<?php echo base_url();?>../public/admin/js/d3.v3.js"></script>
<script src="<?php echo base_url();?>../public/admin/js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
    <style type="text/css" media="screen">
        #top1{
            margin-bottom: 0;
        }
    </style>
     <!-- Navigation -->
        <?php $this->load->view('admin/modules/header.php'); ?>
	<!-- End Navigation -->
        <div id="page-wrapper">
        <?php
	         if(isset($com,$view)){

	            $this->load->view('admin/components/'.$com.'/'.$view);
	         }
	     ?>
      <!-- /#page-wrapper -->
  		</div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>../public/admin/js/bootstrap.min.js"></script>
</body>
</html>
