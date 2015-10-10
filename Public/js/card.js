$(function() {
    var fee = $("input[name=price]:checked").attr('data-fee');
    $("#cardFee").val(fee);
    $("input[name=price]").on("click", function() {
        var cardFee = $(this).attr('data-fee');
        $("#cardFee").val(cardFee);
    })

    $(".imgCode").on("click", function() {
        var timestamp = new Date().getTime();
        var src = baseUrl+"/code?time="+timestamp;
        $(this).attr('src',src);
    })

    $("#jsGetCode").on("click", function() {
        var mobile = $("#mobile").text();
        alert(mobile);
        var param = {
            "url" : baseUrl + "/card/msg",
            "data" : "mobile="+mobile
        }
        var callback = function() {
            alert('hi');
        }
        Common.request(param, callback);
    })

    $("#jsPaySubmit").on("click", function() {
        var data = $("#buyForm").serialize();
        var param = {
            "url" : baseUrl + "/card/payurl",
            "data" : data
        }
        var callback = function() {

        }
        Common.request(param, callback);
    });

    $("input[name=mobile]").on("blur", function() {
        var name = $("input[name=name]").val();
        var mobile = $(this).val();
        var productId = $("input[name=productId]").val();
        if(! name || ! mobile || ! productId) return false;
        var param = {"data" : "name="+name+"&mobile="+mobile+"&productId="+productId, "url":baseUrl+"/card/saleinfo"};
        var callback = function(data) {
            if(data.status == 1000) {
                var info = data.result.result;
                $("input[name=id]").val(info.id);
                $("input[name=idcard]").val(info.idcard);
                $("textarea[name=address]").text(info.address);
                $("input[name=email]").val(info.email);
                $("input[name=recommender]").val(info.recommender);
                $("#ckbIAgree").attr('checked',true);
            }else{
                $("#ckbIAgree").attr('checked',false);
                $("input[name=id]").val(0);
            }
        }
        Common.request(param, callback);


    });
})