<script src="<?php echo base_url(); ?>../public/user/js/moduleServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/moduleController.js"></script>
<!--Begin-->
<link href="<?php echo base_url(); ?>../public/user/css/flexslider.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>../public/user/js/jquery.flexslider-min.js" type="text/javascript"></script>
<div class="flexslider slideshow-content" id="bannerheaderhome" ng-controller="moduleController" ng-init="initSlideshowController('Slideshows')">
    <ul class="slides">
        <li ng-repeat="item in Slideshows">
            <a title="{{item.Name}}" href="#">
                <img alt="{{item.Name}}" ng-src="{{item.Image}}" />
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $('#bannerheaderhome').flexslider({
    directionNav: true,
    controlNav: false,
    animation: "slide",
    itemHeigh: 270,
    itemMargin: 0,
    animationSpeed: 700,
    slideshowSpeed: 3000
    });
    });
</script>
<!--End-->
<script type="text/javascript">
window.Slideshows = [{"Id":417,"ShopId":94,"Name":"1","Image":"<?php echo base_url(); ?>../public/user/images/slider-1.jpg","Link":"#","Index":1,"Inactive":false,"Timestamp":"AAAAAAAWgDs="},{"Id":418,"ShopId":94,"Name":"2","Image":"<?php echo base_url(); ?>../public/user/images/slider-2.jpg","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAAWgD0="},{"Id":422,"ShopId":94,"Name":"3","Image":"<?php echo base_url(); ?>../public/user/images/slider-3.jpg","Link":"#","Index":6,"Inactive":false,"Timestamp":"AAAAAAAWgD4="},{"Id":424,"ShopId":94,"Name":"1","Image":"<?php echo base_url(); ?>../public/user/images/slider-4.jpg","Link":"#","Index":1,"Inactive":false,"Timestamp":"AAAAAAAWgDs="},{"Id":426,"ShopId":94,"Name":"1","Image":"<?php echo base_url(); ?>../public/user/images/slider-5.jpg","Link":"#","Index":1,"Inactive":false,"Timestamp":"AAAAAAAWgDs="}];
</script>