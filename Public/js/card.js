$(function() {
    var fee = $("input[name=price]:checked").attr('data-fee');
    $("#cardFee").val(fee);
    $("input[name=price]").on("click", function() {
        var cardFee = $(this).attr('data-fee');
        $("#cardFee").val(cardFee);
    })
})