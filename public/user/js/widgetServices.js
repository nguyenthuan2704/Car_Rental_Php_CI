appMain.service('widgetService', ['ajaxService', function (ajaxService) {
    this.getWeathers = function (data, successFunction, errorFunction) {
        ajaxService.AjaxGetWithData(data, "/api/widget/getweathers", successFunction, errorFunction);
    };
    this.getExchangeRates = function (successFunction, errorFunction) {
        ajaxService.AjaxGet("/api/widget/getexchangerates", successFunction, errorFunction);
    };
    this.getGoldPrices = function (successFunction, errorFunction) {
        ajaxService.AjaxGet("/api/widget/getgoldprices", successFunction, errorFunction);
    };
}]);









