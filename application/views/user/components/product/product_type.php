<?php
    $vehicle_type_id = $this->uri->segment(2);
    $vehicle_type = $this->vehicle_model->get_vehicle_type_for_vehicle_type_id($vehicle_type_id);
?>
<style type="text/css" media="screen">
    .nof { color: blue; font-family: 'Trocchi', serif; font-size: 30px; font-weight: normal; line-height: 48px; margin: 0; text-align: center; }
    .thong-bao { color: red; font-size: 18px; font-weight: normal; margin-top: -10px; }
    .pag{padding-right: 200px;}
</style>
<div class="breadcrumb clearfix">
    <ul>
        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
            <a title="Đến trang chủ" href="<?php echo base_url("index.html"); ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
        </li>
        <li class="icon-li"><strong>Sản phẩm</strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>
<section class="product-content clearfix">
    <h1 class="title clearfix"><span><?php echo $vehicle_type->name; ?></span></h1>
    <div class="product-block product-grid clearfix">
    <?php
        if($this->vehicle_model->total_vehicle() > 0){
            $config['total_rows'] = $this->vehicle_model->total_vehicle_by_type($vehicle_type_id);
            $config['per_page'] = 8;
            $config['uri_segment'] = 3;
            $config['suffix'] = '.html';
            $config['use_page_numbers'] = true;
            $config['base_url'] = base_url('san-pham/page/');
            $config['first_url'] = '1.html';
            $config['full_tag_open'] =
                '<div class="text-center clear">
                    <nav>
                        <ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            if($this->uri->segment(3) > 1)
            {
                $page = ($this->uri->segment(3) + 0) * $config['per_page'] - $config['per_page'];
            }else
            {
                $page = 0;
            }
            $vehicle = $this->vehicle_model->pagination_vehicle_by_type($vehicle_type_id,$config['per_page'], $page);
        foreach($vehicle as $vh):
    ?>
        <div class="col-md-6 col-sm-6 col-xs-12 product-resize product-item-box">
            <div class="product-item">
                <div class="image image-resize">
                    <a href="<?php echo base_url("vehicle-detail/$vh->id.html"); ?>" title="<?php echo $vh->name; ?>">
                        <img src="<?php echo base_url(); ?>../public/user/images/vehicle/<?php echo $vh->url_image; ?>" class="img-responsive" />
                    </a>
                    <!-- <span class="hot"></span> -->
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
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php }else { ?>
        <div class="col-md-6 col-sm-6 col-xs-12 product-resize product-item-box">
            <?php echo 'Chưa có sản phẩm nào.'; ?>
        </div>
     <?php } ?>
    </div>
<div class="pag"><?php echo $this->pagination->create_links(); ?></div>
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