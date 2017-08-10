$=jQuery.noConflict();
$(document).ready(function(){
    var $Click = $(".btn button");
        $clickLeft = $(".arrow-left"),
        $clickRight = $(".arrow-right"),
        currentIndex = 0,
        $mainList = $('.list-slideApo'),
        $multi = $(".list-slideApo, .arrow-slide"),
        $Lists = $('.list-item-sliderApo'),
        $itemAmt = $Lists.length;

    $(".content-item").hover(function(e){
        e.stopPropagation();
        $(this).children("h2").slideDown(500);
    }, function(e) {
        e.stopPropagation();
        $(this).children("h2").slideUp(500);
    });

    function autoInterv() {
        interval = setInterval(function() {
            $current = $mainList.find(".current");
            switchInterv($itemAmt);
        }, 7000);
    };
    function stopAutoInterv() {
        clearInterval(interval);
    };
    $(function () {
        autoInterv();
        $multi.hover(function() {
            console.log("stop");
            stopAutoInterv();
        }, function() {
            autoInterv();
        })
    });

    $Click.click(function(e) {
        e.stopPropagation();
        $current = $mainList.find(".current");
        switchInterv();
    });

    $clickLeft.click(function(e){
        e.stopPropagation();
        $current = $mainList.find(".current");
        prevSwitch();
    })
    $clickRight.click(function(e){
        e.stopPropagation();
        $current = $mainList.find(".current");
        nextSwitch();
    })

    function switchInterv() {
        currentIndex += 1;
        if (currentIndex > $itemAmt - 1) {
            currentIndex = 0;
        }
        console.log($itemAmt);
        Anim(currentIndex);
    };
    function nextSwitch() {
        currentIndex += 1;
        if (currentIndex > $itemAmt - 1) {
            currentIndex = 0;
        }
        Anim(currentIndex);
    }
    function prevSwitch() {
        currentIndex -= 1;
        if (currentIndex < 0) {
            currentIndex = $itemAmt - 1;
        }
        Anim(currentIndex);
    }

    function Anim(currentIndex) {
        console.log(currentIndex);
        var $List = $Lists.eq(currentIndex);
        console.log($List);
        console.log($Lists);
        fixAnimOut($current);
        setTimeout(function(){
            AnimOut($current);
            setTimeout(function(){
                fixAnimIn($List);
                setTimeout(function(){
                    AnimIn($List);
                }, 250);
            }, 1000);
        }, 250);
    };

    function fixAnimOut($current) {
        $current.find(".item-image1").removeClass("flipInX").addClass("flipOutX");
        $current.find(".item-image2").removeClass("flipInY").addClass("flipOutY");
        $current.find(".item-image3").removeClass("flipInX").addClass("flipOutX");
    };
    function AnimOut($current) {
        // $current.find(".item-image1").toggleClass("flipInX").toggleClass("flipOutX").fadeOut(1000);
        $current.find(".item-image1").fadeOut(1000);
        $current.find(".item-image2").fadeOut(1000);
        $current.find(".item-image3").fadeOut(1000);
        setTimeout(function(){
            $current.removeClass("current").hide(0);
        }, 1100);
    };

    function fixAnimIn($List) {
        $List.find(".item-image1").removeClass("flipOutX").addClass("flipInX");
        $List.find(".item-image2").removeClass("flipOutY").addClass("flipInY");
        $List.find(".item-image3").removeClass("flipOutX").addClass("flipInX");
    };

    function AnimIn($List) {
        $List.addClass("current").show(0);
        $List.find(".item-image1").fadeIn(500);
        $List.find(".item-image2").fadeIn(500);
        $List.find(".item-image3").fadeIn(500);
    };

});
