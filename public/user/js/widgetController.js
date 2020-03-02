appMain.controller('widgetController', function ($scope, $rootScope, $location, $window, widgetService, alertsService) {
    $scope.initExchangeRateController = function () {
        widgetService.getExchangeRates($scope.getExchangeRatesCompleted, $scope.getExchangeRatesError);
    }
    $scope.getExchangeRatesCompleted = function (response) {
        $scope.exchangeRate = response.Data;
        $scope.exchangeRate.ViewMore = false;
    }
    $scope.getExchangeRatesError = function (response) {
    }
    $scope.exchangeRateViewMore = function () {
        $scope.exchangeRate.ViewMore = true;
    }

    $scope.initGoldPriceController = function () {
        widgetService.getGoldPrices($scope.getGoldPricesCompleted, $scope.getGoldPricesError);
    }
    $scope.getGoldPricesCompleted = function (response) {
        $scope.goldPrice = response.Data;
    }
    $scope.getGoldPricesError = function (response) {
    }

    $scope.initWeatherController = function () {
        $scope.Locations = [{ Code: "1252431", Name: "Hồ Chí Minh" }, { Code: "12800712", Name: "Hà Nội" }, { Code: "1252376", Name: "Đà Nẵng" },
        { Code: "1252438", Name: "Huế" }, { Code: "1252351", Name: "Cần Thơ" }, { Code: "1252662", Name: "Vinh" },
        { Code: "1236690", Name: "Hải Phòng" }, { Code: "1229284", Name: "Bắc Giang" }, { Code: "1232334", Name: "Biên Hoà" },
        { Code: "1252672", Name: "Bà Rịa Vũng Tàu" }, { Code: "1252537", Name: "Phan Thiết" }, { Code: "12502425", Name: "Côn Đảo" },
        { Code: "1252353", Name: "Cao Bằng" }, { Code: "1244351", Name: "Phú Quốc" }, { Code: "1252512", Name: "Nam Định" },
        { Code: "1252661", Name: "Việt Trì" }, { Code: "12522952", Name: "Sông Cầu" }, { Code: "12522965", Name: "Tuy Hoà" },
        { Code: "1252392", Name: "Quảng Bình" }, { Code: "1252608", Name: "Thanh Hoá" }, { Code: "1252498", Name: "Mỹ Tho" }];

        $scope.LocationId = "1252431";
        $scope.getWeathers();
    }
    $scope.getWeathers = function () {
        var obj = { locationId: $scope.LocationId }
        widgetService.getWeathers(obj, $scope.getWeathersCompleted, $scope.getWeathersError);
    }
    $scope.getWeathersCompleted = function (response) {
        $scope.weather = response.Data;
    }
    $scope.getWeathersError = function (response) {
    }
});