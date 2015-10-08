$(function() {
    //查找商户
    $("#JsSearchBusiness").on("click", function(){
        var data =$("#searchBusiness").serialize();
        var url = baseUrl + "/business/search?"+data;
        window.location.href=url;
    })

    $("#jsSearchSite").on("click", function() {
        var data = $("#searchListForm").serialize();
        var url = baseUrl + "/business/sites?"+data;
        window.location.href=url;
    })
    $("#cityId").on("change", function() {
        var cityId = $(this).val();
        var param = {"type":"get","url" : baseUrl+"/city?cityId="+cityId};
        var callback = function(data) {
            if(data.status == 1000) {
                var html = "<option value=\"0\">所有区县</option>";
                $.each(data.result.district, function(i, item) {
                    html +="<option value=\""+item.id+"\">"+item.name+"</option>";
                });
                $("#districtId").html(html);
                var html = "<option value=\"0\">所有商圈</option>";
                $.each(data.result.district, function(i, item) {
                    html +="<option value=\""+item.id+"\">"+item.name+"</option>";
                });
                $("#circleId").html(html);
            }
        }
        Common.request(param, callback);

    })
})