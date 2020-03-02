<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="<?php echo base_url(); ?>../public/admin/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>../public/admin/css/font-awesome.min.css" rel="stylesheet" />
    <style type="text/css">
      .isa_info, .isa_success, .isa_warning, .isa_error {
      margin: 10px 0px;
      padding:12px;
      }
      .isa_info {
          color: #00529B;
          background-color: #BDE5F8;
      }
      .isa_success {
          color: #4F8A10;
          background-color: #DFF2BF;
      }
      .isa_warning {
          color: #9F6000;
          background-color: #FEEFB3;
      }
      .isa_error {
          color: #D8000C;
          background-color: #FFD2D2;
      }
      .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
          margin:10px 22px;
          font-size:2em;
          vertical-align:middle;
      }
    </style>
  </head>
  <body>
    <div class="padding-all">
      <div class="header">
        <h1><img src="<?php echo base_url(); ?>../public/admin/login/images/5.png" alt=" "> Gaming Login Form</h1>
      </div>
      <div class="design-w3l">
        <div class="mail-form-agile">
          <form name="form1" action="<?php echo base_url('process-login.html'); ?>" method = "POST" role="form">
            <input type="text" name="username" placeholder="Username" required=""/>
            <input type="password"  name="password" class="padding" placeholder="Password" required=""/>
            <input type="submit" name="login-submit" value="submit">
              <div class="error-login" id="password_error"><?php echo form_error('username')?></div>
              <div class="error-login" id="password_error"><?php echo form_error('password')?></div>
              <?php if(isset($error)): ?>
              <div class="row">
                <div class="isa_error">
                  <i class="fa fa-times-circle"></i>
                  <?php echo $error; ?>
                </div>
              </div>
              <?php endif; ?>
          </form>
        </div>
        <div class="clear"></div>
      </div>
      <div class="footer">
      <p>© 2017 Gaming Login form. All Rights Reserved | Design by  <a href="https://w3layouts.com/" >  w3layouts </a></p>
      </div>
    </div>
  </body>
</html>