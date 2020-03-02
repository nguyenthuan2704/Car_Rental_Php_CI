<div class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <link href="<?php echo base_url(); ?>../public/user/css/owl.carousel.css" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>../public/user/css/owl.theme.css" rel="stylesheet" />
            <script src="<?php echo base_url(); ?>../public/user/js/owl.carousel.min.js"></script>
            <script src="<?php echo base_url(); ?>../public/user/js/moduleServices.js"></script>
            <script src="<?php echo base_url(); ?>../public/user/js/moduleController.js"></script>
            <!--Begin-->
            <div class="partner-content owl-carousel" ng-controller="moduleController" ng-init="initPartnerController('Partners')">
                <div class="partner-block">
                    <div class="partner-item" ng-repeat="item in Partners">
                        <a href="%7b%7bitem.html" target="_blank" title="{{item.Name}}">
                            <img ng-src="{{item.Logo}}" alt="{{item.Name}}" class="img-responsive" />
                        </a>
                    </div>
                </div>
                <div class="controls boxprevnext">
                    <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                    <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                var owl = $(".partner-block");
                owl.owlCarousel({
                autoPlay: true,
                autoPlay: 5000,
                items: 6,
                slideSpeed: 1000,
                pagination: false,
                itemsDesktop: [1200, 6],
                itemsDesktopSmall: [980, 5],
                itemsTablet: [767, 4],
                itemsMobile: [480, 2]
                });
                $(".partner-content .nextlogo").click(function () {
                owl.trigger('owl.next');
                });
                $(".partner-content .prevlogo").click(function () {
                owl.trigger('owl.prev');
                });
                });
            </script>
            <!--End-->
            <script type="text/javascript">
            window.Partners = [{"Id":850,"ShopId":94,"Name":"1","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner1.png","Index":1,"Inactive":false},{"Id":851,"ShopId":94,"Name":"2","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner2.png","Index":2,"Inactive":false},{"Id":852,"ShopId":94,"Name":"3","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner3.png","Index":3,"Inactive":false},{"Id":853,"ShopId":94,"Name":"4","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner4.png","Index":4,"Inactive":false},{"Id":854,"ShopId":94,"Name":"5","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner5.png","Index":5,"Inactive":false},{"Id":855,"ShopId":94,"Name":"6","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner6.png","Index":6,"Inactive":false},{"Id":856,"ShopId":94,"Name":"7","Link":"#","Logo":"<?php echo base_url(); ?>../public/user/images/partner7.png","Index":7,"Inactive":false}];
            </script>
            </div>
        </div>
    </div>
</div>