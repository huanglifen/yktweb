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
})