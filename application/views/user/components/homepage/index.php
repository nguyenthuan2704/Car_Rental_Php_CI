<style type="text/css" media="screen">
    .nof { color: blue; font-family: 'Trocchi', serif; font-size: 30px; font-weight: normal; line-height: 48px; margin: 0; text-align: center; }
    .thong-bao { color: red; font-size: 18px; font-weight: normal; margin-top: -10px; }
</style>
<section class="product-content clearfix">
    <h1 class="title clearfix"><span>Xe Mới</span></h1>
    <div class="product-block product-grid clearfix">
        <?php
            $vehicle = $this->vehicle_model->show_vehicle();
            foreach ($vehicle as $vh):
        ?>
        <div class="col-md-6 col-sm-6 col-xs-12 product-resize product-item-box">
            <div class="product-item">
                <div class="image image-resize">
                    <a href="<?php echo base_url("vehicle-detail/$vh->id.html"); ?>" title="<?php echo $vh->name; ?>">
                        <img src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vh->url_image; ?>" class="img-responsive" />
                    </a>
                    <span class="hot">New</span>
                </div>
                <div class="right-block">
                    <h2 class="name">
                        <a href="<?php echo base_url("vehicle-detail/$vh->id.html"); ?>" title="<?php echo $vh->name; ?>"><?php echo $vh->name; ?></a>
                    </h2>
                    <div class="rating">
                        <div class="rating-1">
                            <span class="rating-img">
                            </span>
                        </div>
                    </div>
                    <div class="price">
                        <span class="price-new">Liên Hệ</span>
                    </div>
                    <div class="addtocart-button clearfix">
                        <a class="add-to-cart"<?php $email = $this->session->userdata('email');
                                                if(!isset($email)):
                                                    echo "data-toggle='modal' data-target='#myModalLogin'";
                                                else:
                                                    $page = base_url("dat-xe/$vh->id.html");
                                                    echo "href=$page";
                                                endif;
                                              ?>>
                            <i class="fa fa-shopping-cart"></i>Đặt Xe
                        </a>
<!--                         <form action="</?php echo base_url("them-gio-hang.html"); ?>" method="POST">
                                <input type="hidden" name="id" value="</?php echo $vh->id; ?>" />
                                <input type="hidden" name="name" value="</?php echo $vh->name; ?>" />
                                <input type="hidden" name="slug_name" value="</?php echo $vh->slug_name; ?>" />
                                <input type="hidden" name="url_image" value="</?php echo $vh->url_image; ?>" />
                                <input type="hidden" name="vehicle_brand_id" value="</?php echo $vh->vehicle_brand_id; ?>" />
                                <input type="hidden" name="vehicle_type_id" value="</?php echo $vh->vehicle_type_id; ?>" />
                                <button type="button" class="add-to-cart" name="cart-btn"><i class="fa fa-shopping-cart"></i>Đặt Xe</button>
                                <input type="submit" name="submit" value="Đặt Xe" class="add-to-cart"/>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
         <?php endforeach; ?>
    </div>
</section>
<!--     <nav class="navbar navbar-default product-filter">
<ul class="display">
<li id="grid" class="active grid"><a href="#" title="Grid"><i class="fa fa-th-large"></i></a></li>
<li id="list" class="list"><a href="#" title="List"><i class="fa fa-th-list"></i></a></li>
</ul>
<div class="limit">
<span>Sản phẩm/trang</span>
<select id="lblimit" name="lblimit" class="nb_item" onchange="window.location.href = this.options[this.selectedIndex].value">
<option value="?limit=10">10</option>
<option selected="selected" value="?limit=12">12</option>
<option value="?limit=20">20</option>
<option value="?limit=50">50</option>
<option value="?limit=100">100</option>
<option value="?limit=250">250</option>
<option value="?limit=500">500</option>
</select>
</div>
<div class="sort">
<span>Sắp xếp</span>
<select class="selectProductSort" id="lbsort" onchange="window.location.href = this.options[this.selectedIndex].value">
<option selected="selected" value="?sort=index&amp;order=asc">Mặc định</option>
<option value="?sort=price&amp;order=asc">Gi&#225; tăng dần</option>
<option value="?sort=price&amp;order=desc">Gi&#225; giảm dần</option>
<option value="?sort=name&amp;order=asc">T&#234;n sản phẩm: A to Z</option>
<option value="?sort=name&amp;order=desc">T&#234;n sản phẩm: Z to A</option>
</select>
</div>
</nav> -->
<section class="product-content clearfix">
    <h1 class="title clearfix"><span>Xe Hot</span></h1>
    <div class="product-block product-grid clearfix">
        <?php
            $vehicle_hot = $this->vehicle_model->show_vehicle_hot();
            foreach ($vehicle_hot as $vc):
        ?>
        <div class="col-md-6 col-sm-6 col-xs-12 product-resize product-item-box">
            <div class="product-item">
                <div class="image image-resize">
                    <a href="<?php echo base_url("vehicle-detail/$vc->id.html"); ?>" title="<?php echo $vc->name; ?>">
                        <img src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vc->url_image; ?>" class="img-responsive" />
                    </a>
                    <span class="hot">Hot</span>
                </div>
                <div class="right-block">
                    <h2 class="name">
                        <a href="<?php echo base_url("vehicle-detail/$vh->id.html"); ?>" title="<?php echo $vc->name; ?>"><?php echo $vc->name; ?></a>
                    </h2>
                    <div class="rating">
                        <div class="rating-1">
                            <span class="rating-img">
                            </span>
                        </div>
                    </div>
                    <div class="price">
                        <span class="price-new">Liên Hệ</span>
                    </div>
                    <div class="addtocart-button clearfix">
                        <a class="add-to-cart"<?php $email = $this->session->userdata('email');
                                                if(!isset($email)):
                                                    echo "data-toggle='modal' data-target='#myModalLogin'";
                                                else:
                                                    $page = base_url("dat-xe/$vc->id.html");
                                                    echo "href=$page";
                                                endif;
                                              ?>>
                            <i class="fa fa-shopping-cart"></i>Đặt Xe
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <?php endforeach; ?>
    </div>
</section>
<!-- Nofication Book Form -->
<div class="container">
    <div class="modal fade" id="myModalLogin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="nof">Đăng nhập để đặt xe</h1>
                </div>
                <div class="modal-body">
                        <div class="contact-feedback">
                            <a class="btn btn-default" href="<?php echo base_url("dang-nhap.html"); ?>">Đăng Nhập</a>
                            <a class="btn btn-default" href="<?php echo base_url("dang-ky.html"); ?>"> Đăng ký</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                </div>
                <div class="modal-footer"><div class="col-md-6 col-sm-12 col-xs-12"></div></div>
            </div>
        </div>
    </div>
</div>