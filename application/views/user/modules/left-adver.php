<script src="<?php echo base_url(); ?>../public/user/js/moduleServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/moduleController.js"></script>
<!--Begin-->
<!-- <div class="box-adv" ng-controller="moduleController" ng-init="initAdvMenuController('AdvMenus')"> -->
<div class="box-adv">
    <h3><span><i class="fa fa-bookmark"></i>Quảng cáo</span></h3>
    <img src="<?php echo base_url(); ?>../public/user/images/adver1.png" class="img-responsive">
    <br><br>
    <img src="<?php echo base_url(); ?>../public/user/images/adver2.png" class="img-responsive">
    <br><br>
    <img src="<?php echo base_url(); ?>../public/user/images/adver3.png" class="img-responsive">
    <br><br>
    <img src="<?php echo base_url(); ?>../public/user/images/adver4.png" class="img-responsive">
    <br><br>
    <img src="<?php echo base_url(); ?>../public/user/images/adver5.png" class="img-responsive">
</div>
<!--End-->
<script src="<?php echo base_url(); ?>../public/user/js/widgetServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/widgetController.js"></script>
<!--Begin-->
<div class="box-exchange" ng-controller="widgetController" ng-init="initExchangeRateController()">
    <h3><span><i class="fa fa-bookmark"></i>Tỉ giá ngoại tệ</span></h3>
    <div class="exchange-block">
        <table class="table-bordered table">
            <thead>
                <tr>
                <th>Mã</th>
                <th>Mua TM</th>
                <th>Mua CK</th>
                <th>Bán ra</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in exchangeRate.Items" ng-class="{'hidden':item.IsMain==false&&exchangeRate.ViewMore==false}">
                <td>{{item.Code}}</td>
                <td>{{item.BuyCash| number:0}}</td>
                <td>{{item.BuyTransfer| number:0}}</td>
                <td>{{item.Sell| number:0}}</td>
                </tr>
            </tbody>
        </table>
    <div class="help-block">
        <span>Đơn vị: VNĐ</span>
        <span class="pull-right"><a href="javascript:void(0)" ng-click="exchangeRateViewMore()">Xem tất cả</a></span>
    </div>
    <div class="docs">Nguồn: <img width="40" src="<?php echo base_url(); ?>../public/user/images/Logo-vietcombank.png"></div>
    <!--<div class="docs">Nguồn: <a href="#">Ngân hàng Việt Nam</a></div>-->
    <i>Cập nhật lúc: {{exchangeRate.UpdateDate}}</i>
    </div>
</div>
<!--End-->
<script src="<?php echo base_url(); ?>../public/user/js/widgetServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/widgetController.js"></script>
<!--Begin-->
<div class="box-weather" ng-controller="widgetController" ng-init="initWeatherController()">
    <h3><span><i class="fa fa-bookmark"></i>Thời tiết</span></h3>
    <div class="weather-block">
        <div class="form-group">
            <label>Chọn địa điểm</label>
            <select ng-model="LocationId"
            ng-options="item.Code as item.Name for item in Locations" ng-change="getWeathers()"></select>
        </div>
        <div class="docs"><i>Thời tiết hiện tại {{weather.DayOfWeek}} ngày {{weather.CurrentDate}}</i></div>
        <div class="clearfix">
            <span class="weather-icon clearfix"><img ng-src="{{weather.Image}}" class="img-responsive" /></span>
            <span class="weather-desc">
                <strong>{{weather.Temp}}ºC</strong>
                <span class="tmp">{{weather.Description}}</span>
                <span>Độ ẩm: {{weather.Humidity}}%</span>
                <span>Tầm nhìn: {{weather.Visibility}}{{weather.Distance}}</span>
                <span>Gió: {{weather.Direction}}, {{weather.Wind}}{{weather.WindSpeed}}</span>
            </span>
        </div>
        <!--<div class="docs">Nguồn: <img src="Images/logosacombank.png" width="100" /></div>-->
        <div class="docs">Nguồn: <a href="https://weather.yahoo.com/" target="_blank">Yahoo</a></div>
        <i>Cập nhật lúc: {{weather.UpdateDate}}</i>
    </div>
</div>
<!--End-->
<script src="<?php echo base_url(); ?>../public/user/js/moduleServices.js"></script>
<script src="<?php echo base_url(); ?>../public/user/js/moduleController.js"></script>
<!--Begin-->
<div class="box-counter" ng-controller="moduleController" ng-init="initAccessController()">
    <h3><span><i class="fa fa-bookmark"></i>Thống kê truy cập</span></h3>
    <ul>
        <li><i class="fa fa-globe"></i>Trực tuyến : <b>{{access.AccessOnline}}</b></li>
        <li><i class="fa fa-area-chart"></i>Trong ngày : <b>{{access.AccessDay}}</b></li>
        <li><i class="fa fa-line-chart"></i>Trong tháng : <b>{{access.AccessMonth}}</b></li>
        <li><i class="fa fa-pie-chart"></i>Tổng truy cập : <b>{{access.AccessNumber}}</b></li>
    </ul>
</div>