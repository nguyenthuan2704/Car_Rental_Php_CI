<script src="<?php echo base_url(); ?>../public/user/js/moduleServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/moduleController.js"></script>
<!--Begin-->
<div class="box-support-online" ng-controller="moduleController" ng-init="initSupportOnlineController('Shop','SupportOnlines')">
	<h3><span><i class="fa fa-bookmark"></i>Hỗ trợ trực tuyến</span></h3>
	<div class="support-online-block">
		<div class="support-hotline">
			HOTLINE<br><span>099.999.9999</span>
		</div>
		<div class="support-item" ng-repeat="item in SupportOnlines">
			<div class="name">
				CarRental  <b>091.234.5678</b>
			</div>
			<ul>
				<li>
					<a title="">
					<img width="70" src="<?php echo base_url(); ?>../public/user/images/chatbutton_32px.png">
					</a>
				</li>
				<li class="social">
					<a href="" title="" target="_blank">
						<img src="<?php echo base_url(); ?>../public/user/images/icon-viber.png" alt="Viber"> Viber
					</a>
					<span class="phone"><a href="" title="" target="_blank"></a></span>
				</li>
				<li class="social">
					<a href="" title="" target="_blank">
						<img src="<?php echo base_url(); ?>../public/user/images/icon-zalo.png" alt="Zalo"> Zalo
					</a>
					<span class="phone"><a href="" title="" target="_blank"></a></span>
				</li>
				<li class="social">
					<a href="" title="" target="_blank">
						<img src="<?php echo base_url(); ?>../public/user/images/icon-facebook.png" alt="Facebook"> Facebook
					</a>
					<span class="phone"><a href="" title="" target="_blank"></a></span>
				</li>
			</ul>
		</div>
	</div>
</div>
<!--End-->
<script type="text/javascript">
window.Shop = {"Name":"CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME","Email":"info@runtime.vn","Phone":"(08) 66 85 85 38","Logo":"<?php echo base_url(); ?>../public/user/images/logo.png","Fax":"(08) 66 85 85 38","Website":"http://www.runtime.vn","Hotline":"0908770095","Address":"5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.Hồ Chí Minh","Fanpage":"https://www.facebook.com/runtime.vn","Google":null,"Facebook":"https://www.facebook.com/runtime.vn","Youtube":null,"Twitter":null,"IsBanner":false,"IsFixed":false,"BannerImage":null};
window.SupportOnlines = [{"Id":21,"ShopId":94,"FullName":"Hanlena shop","Position":"Chủ cửa hàng","Yahoo":"hanlenashop","Skype":"hanlenashop","Viber":null,"Zalo":null,"Facebook":null,"Phone":"090.230.7731","Phone1":null,"Email":null,"Address":null,"Avatar":null,"Company":null,"Index":1,"Inactive":false}];
</script>