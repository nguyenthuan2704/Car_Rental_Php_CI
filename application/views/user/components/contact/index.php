<style type="text/css">
    .map
    {
        width: 270px;
        height: 300px;
        border: 0;
    }
</style>
<div class="contact-content clearfix">
    <h1 class="title">
        <span>
            Thông tin liên hệ
        </span>
    </h1>
    <div class="contact-block clearfix">
        <div class="row">
            <div class="col-md-3">
                <a href="index.html">
                    <img class="img-responsive" src="<?php echo base_url(); ?>../public/user/images/logo.png" />
                </a>
            </div>
        <div class="col-md-9">
            <div class="contact-info">
                <div class="docs"><b class="name">CARRENTAL</b></div>
                <div class="docs">
                    <i class="fa fa-map-marker"></i>
                    <b>Địa chỉ:</b> West Nichols Street San Pedro, CA 90731
                </div>
                <div class="docs">
                    <i class="fa fa-phone"></i>
                    <b>Điện thoại:</b> (08) 66 85 85 38
                </div>
                <div class="docs">
                    <i class="fa fa-mobile"></i>
                    <b>Hotline</b> 0908770095
                </div>
                <div class="docs">
                    <i class="fa fa-fax"></i>
                    <b>Fax:</b> (08) 66 85 85 38
                </div>
                <div class="docs">
                    <i class="fa fa-envelope"></i>
                    <a href="#">contact@carrental.com</a>
                </div>
            </div>
        </div>
        </div>
        <hr class="" />
        <h3 class="title">Gửi thông tin liên hệ</h3>
        <div class="description">
            Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
            sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="contact-feedback">
                    <form class="form-horizontal" name="insert-form" method="POST" action="<?php echo base_url("xuly-lien-he.html"); ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                            <input type="text" placeholder="Họ tên" name="fullname" value="<?php echo set_value("fullname"); ?>" class="form-control" />
                        </div>
                            <span><?php echo form_error('fullname'); ?></span>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" placeholder="Email" name="email" value="<?php echo set_value("email"); ?>" class="form-control" />
                        </div>
                            <span><?php echo form_error('email'); ?></span>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                            <input type="text" placeholder="Tiêu đề" name="subject" value="<?php echo set_value("subject"); ?>" class="form-control" />
                        </div>
                            <span><?php echo form_error('subject'); ?></span>
                        <div class="form-group">
                            <textarea placeholder="Nội dung" class="form-control" rows="3" name="content" value="<?php echo set_value("content"); ?>"></textarea>
                            <span><?php echo form_error('content'); ?></span>
                            <button class="btn btn-default" type="submit" name="btn-submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.1353965568974!2d-89.82632278445425!3d35.203096263652114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887f9d65622502c7%3A0x393e12031843af9f!2sBudget+Car+and+Truck+Rental!5e0!3m2!1svi!2s!4v1563791442243!5m2!1svi!2s" frameborder="0"; allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
