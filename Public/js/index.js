var indexFlashNum=0;
function indexFlashAtuo(){
    $('.indexFlash').find('li').eq(indexFlashNum).fadeOut(2000);
    $('.flashBtn').find('li').eq(indexFlashNum).animate({paddingTop: 7}, "slow");
    if(indexFlashNum<$('.indexFlash').find('li').length-1){
        indexFlashNum++;
    }else{
        indexFlashNum=0;
    }
    $('.indexFlash').find('li').eq(indexFlashNum).fadeIn(2000);
    $('.flashBtn').find('li').removeClass('liNow');
    $('.flashBtn').find('li').eq(indexFlashNum).addClass('liNow');
    $('.flashBtn').find('li').eq(indexFlashNum).animate({paddingTop: 0}, "slow");
}

$(function(){
    $('.indexFast').find('li').each(function(i){
        $(this).hover(
            function(){
                $(this).find('.num').show();
            },
            function(){
                $(this).find('.num').hide();
            }
        )
    })
    var indexFlashTime;
    if($('.indexFlash').length>0){
        $('.indexFlash').find('li:first').show();
        indexFlashTime=setInterval("indexFlashAtuo()",5000);
    }
    $('.flashBtn').find('li').each(function(i){
        $(this).click(function(){
            clearInterval(indexFlashTime);
            $('.indexFlash').find('li').eq(indexFlashNum).fadeOut(2000);
            $('.flashBtn').find('li').eq(indexFlashNum).animate({paddingTop: 7}, "slow");
            indexFlashNum=i;
            $('.indexFlash').find('li').eq(indexFlashNum).fadeIn(2000);
            $('.flashBtn').find('li').removeClass('liNow');
            $('.flashBtn').find('li').eq(indexFlashNum).addClass('liNow');
            $('.flashBtn').find('li').eq(indexFlashNum).animate({paddingTop: 0}, "slow");
            indexFlashTime=setInterval("indexFlashAtuo()",5000);
        })
    });

    var glen = $("#gundiv ul li").length;
    $("#gundiv ul").css("width", 224 * (glen));
    $("#gundiv li").hover(function () {
        $("#gundiv li").removeClass("zslion");
        $(this).addClass("zslion");
    }, function () {
        $(this).removeClass("zslion");
    })

    $("#r3_img1").mouseenter(function () {
        $(this).attr("src", imgUrl + "/117x127图标1.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/127x117图标1.png");
    });
    $("#r3_img2").mouseenter(function () {
        $(this).attr("src", imgUrl + "/127x117图标 2.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/117x127图标2.png");
    });
    $("#r3_img3").mouseenter(function () {
        $(this).attr("src", imgUrl + "/127x117图标 3.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/117x127图标3.png");
    });
    $("#r3_img4").mouseenter(function () {
        $(this).attr("src", imgUrl + "/127x117图标 4.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/117x127图标4.png");
    });

    $("#r3_img5").mouseenter(function () {
        $(this).attr("src", imgUrl + "/127x117图标 5.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/117x127图标5.png");
    });
    $("#r3_imgnew").mouseenter(function () {
        $(this).attr("src", imgUrl + "/127x117图标 6.png");
    }).mouseleave(function () {
        $(this).attr("src", imgUrl + "/117x127图标6.png");
    });
})
$("#zsgun").hScrollPane({
    mover: "ul",
    moverW: function () { return $("#zsgun li").length * 224 - 53; } (),
    showArrow: true,
    handleCssAlter: "draghandlealter"
});

