<section class="navigation-menu clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12  ">
                <nav class="navbar nav-menu">
                    <div class="navbar-header">
                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                <nav id="mobile-menu" class="mobile-menu collapse navbar-collapse">
                    <ul class='menu nav navbar-nav'><li class="level0"><a class='' href="<?php echo base_url("index.html"); ?>"><span>Trang chủ</span></a></li>
                        <li class="level0"><a class='' href="<?php echo base_url("gioi-thieu.html"); ?>"><span>Giới thiệu</span></a></li>
                        <li class="level0"><a class='' href="<?php echo base_url("san-pham.html"); ?>"><span>Sản phẩm</span></a></li>
                        <li class="level0"><a class='' href='#'><span>Tin tức</span></a></li>
                        <li class="level0"><a class='' href="<?php echo base_url("lien-he.html"); ?>"><span>Liên hệ</span></a></li>
                    </ul class='menu nav navbar-nav'>
                </nav>
                </nav>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
    var str = location.href.toLowerCase();
    $("ul.menu li:first").addClass("active-first");
    $("ul.menu li:first").addClass("active");
    $("ul.menu li a").each(function () {
    if (str.indexOf(this.href.toLowerCase()) >= 0) {
    $("ul.menu li").removeClass("active");
    $(this).parent().addClass("active");
    }
    });
    });
</script>