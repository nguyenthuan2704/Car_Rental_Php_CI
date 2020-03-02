<?php
    $id = $this->uri->segment(2);
    $vehicle = $this->vehicle_model->get_vehicle_for_id($id);
?>
<style type="text/css" media="screen">
    .sp{
        height: 148px;
        width: 237px;
    }
</style>
<div class="breadcrumb clearfix">
    <ul>
        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
            <a title="Đến trang chủ" href="<?php echo base_url("index.html"); ?>" itemprop="url"><span itemprop="title">Chi Tiết Xe</span></a>
        </li>
        <li class="icon-li"><strong><?php echo $vehicle->name; ?></strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>
<style type="text/css">
    .introduction
    {
        font-size: 15px;
    }
    .image-intro
    {
        width: 570px;
        height: 360px;
    }
</style>
<section class="product-content clearfix">
    <div class="product-block clearfix">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                <div class="sp-loading"><img src="" alt=""><!-- <br>LOADING IMAGES --></div>
                <div class="sp-wrap">
                    <a href="#"><img class="sp" src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vehicle->url_image; ?>" alt="<?php echo $vehicle->name; ?>"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                <h1><?php echo $vehicle->name; ?></h1>
                <div class="price">
                        <span class="product-code">Mã SP: <?php echo $vehicle->id; ?></span>
                </div>
                <div class="price">
                    <span class="product-code">Liên Hệ</span>
                </div>
                <div class="des" ng-bind-html="Summary|unsafe">
                </div>
                <div class="option" ng-repeat="item in ProductOptions">
                    <label><?php echo $vehicle->name; ?></label>
                    <div class="dropdown-option ">
                        <ul class="option1">
                            <li>
                            <a href=""><strong></strong></a>
                            </li>
                        </ul>
                        <ul class="option2">
                            <li>
                            <a href=""><strong></strong></a>
                            </li>
                        </ul>
                        <ul class="option3">
                            <li>
                            <a><strong></strong></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="quantity clearfix">
                    <label>Số lượng</label>
                    <div class="quantity-input">
                        <input type="number" value="1" class="text" />
                    </div>
                </div>
                <div class="button">
                    <a href="" class="btn btn-default"><i class="glyphicon glyphicon-shopping-cart"></i>Thêm giỏ hàng</a>
                    <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>Mua ngay</a>
                </div>
<!--                 <div class="button">
                    <button class="btn btn-primary" disabled="disabled"><i class="glyphicon glyphicon-shopping-cart"></i>Hết hàng</button>
                </div> -->
                <div class="call">
                    <b><p class="title">Để lại số điện thoại, chúng tôi sẽ tư vấn ngay sau từ 5 › 10 phút</p></b>
                    <div class="input">
                        <div class="input-group">
                            <input class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-phone"></i> Gọi lại cho tôi</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tabs">
        <ul class="nav nav-tabs">
            <li role="presentation">
                <a href=""></a>
            </li>
        </ul>
        <h1 class="title clearfix"><span>Thông Tin Xe</span></h1>
<!--         <div class="tab-content">
            <div class="tab-pane fade in">
                <div></div>
            </div>
        </div> -->
    </div>
        <div class="introduction">
            <p><?php echo $vehicle->content; ?></p>
        </div>
</section>