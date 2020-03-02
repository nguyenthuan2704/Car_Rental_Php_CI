<?php
    ob_start();
    $page = uri_string();
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta charset="UTF-8" />
<title><?php echo $title; ?></title>
<meta content="RUNECOM15" name="description" />
<meta content="" name="keywords" />
<link rel="shortcut icon" type="image/x-icon" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="fb:app_id" content="227481454296289" />

<meta content="vi_VN" property="og:locale" />
<meta content="website" property="og:type" />
<meta content="RUNECOM15" property="og:title" />
<meta content="RUNECOM15" property="og:description" />
<meta content="http://runecom15.runtime.vn" property="og:image" />
<meta content="http://runecom15.runtime.vn/trang-chu.html" property="og:url" />
<meta content="RUNTIME" property="og:site_name" />

<link href="<?php echo base_url(); ?>../public/user/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>../public/user/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>../public/user/css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>../public/user/css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>../public/user/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="<?php echo base_url(); ?>../public/user/js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/jquery-ui.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>../public/user/js/fix-height.js" data-img-box=".image-resize" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/mycard.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../public/user/js/jquery.lazyload.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>../public/user/js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/angular-sanitize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>../public/user/js/spin.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>../public/user/js/angular-spinner.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>../public/user/js/angular-loading-spinner.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/appMain.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/directive.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/angular-summernote.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/paging.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/ajaxServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/alertsServices.js"></script>
<link href="<?php echo base_url(); ?>../public/user/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>../public/user/css/responsive.css" rel="stylesheet" type="text/css" />
<script>
    (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=227481454296289";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<style type="text/css">
    .loading-mas{
        display: none;
    }
    #back-to{
        display: inline;
    }
    .adver{
        padding-top: 10px;
    }
</style>
</head>
<body ng-app="appMain">
    <div id="fb-root"></div>
    <div class="wrapper page-home">
        <?php $this->load->view('user/modules/header.php'); ?>
        <?php $this->load->view('user/modules/top-menu.php'); ?>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php
                            if($com == 'homepage' || $com == 'product'):
                                $this->load->view('user/modules/left-menu.php');
                            else:
                                if($com == 'intro'):
                                    $this->load->view('user/modules/left-menu-intro.php');
                                endif;
                            endif;
                        ?>
                        <?php
                            if($com == 'homepage'):
                                $this->load->view('user/modules/left-adver.php');
                            endif;
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                            if($com == 'homepage'):
                                $this->load->view('user/modules/slider.php');
                            endif;
                        ?>
                        <?php
                            if(isset($com,$view)):
                                $this->load->view('user/components/'.$com.'/'.$view);
                            endif;
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            if($com == 'homepage' || $com == 'product' || $com == 'intro' || $com == 'vehicle'):
                            $this->load->view('user/modules/right-support.php');
                            endif;
                        ?>
                        <?php
                            if($com == 'homepage'):
                            $this->load->view('user/modules/right-news.php');
                            $this->load->view('user/modules/right-adver.php');
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $this->load->view('user/modules/partner.php');
        ?>
        <?php
            $this->load->view('user/modules/footer.php');
        ?>
    </div>
    <a class="back-to-top" href="#" id="back-to">
        <i class="fa fa-angle-up"></i>
    </a>
</body>
<!-- Mirrored from runecom15.runtime.vn/trang-chu.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Oct 2018 07:16:54 GMT -->
</html>
<script type="text/javascript">
    $(".header-content").css({ "background": '' });
    $("html").addClass('');
    $(document).ready(function () {
    $("img.lazy-img").each(function () {
    //$(this).attr("data-original", $(this).attr("src"));
    //$(this).attr("src", "/Images/blank.gif");
    });
    $("img.lazy-img").lazyload({
    effect: "fadeIn",
    threshold: 200
    });
    });
</script>

