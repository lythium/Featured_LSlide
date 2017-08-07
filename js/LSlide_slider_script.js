$=jQuery.noConflict();
$(document).ready(function(){
    var $Click = $(".btn button");

    var currentIndex = 0,
    $Lists = $('.list-item-sliderApo'),
    $itemAmt = $Lists.length;

    $(".content-item-list").hover(function(e){
        e.stopPropagation();
        $(this).parent().children("h2").slideDown(500);
    }, function(e) {
        e.stopPropagation();
        $(this).parent().children("h2").slideUp(500);
    });

    // setInterval(function() {
    //     switchInterv($itemAmt);
    // }, 7000);

    $Click.click(function(e) {
        e.stopPropagation();

        switchInterv($itemAmt);
    });

    function switchInterv($itemAmt) {
        currentIndex += 1;
        if (currentIndex > $itemAmt - 1) {
            currentIndex = 0;
        }
        console.log($itemAmt);
        Anim(currentIndex);
    };

    function Anim(currentIndex) {
        console.log(currentIndex);
        var $List = $Lists.eq(currentIndex);
        console.log($List);
        console.log($Lists);
        fixAnimOut($Lists);
        setTimeout(function(){
            AnimOut($Lists);
            setTimeout(function(){
                fixAnimIn($List);
                setTimeout(function(){
                    AnimIn($List);
                }, 2000);
            }, 1000);
        }, 500);
    };

    function fixAnimOut($Lists) {
        $Lists.find(".item-image1").toggleClass("flipInX flipOutX");
        $Lists.find(".item-image2").toggleClass("flipInY flipOutY");
        $Lists.find(".item-image3").toggleClass("flipInX flipOutX");
    };
    function AnimOut($Lists) {
        // $Lists.find(".item-image1").toggleClass("flipInX").toggleClass("flipOutX").fadeOut(1000);
        $Lists.find(".item-image1").fadeOut(1000);
        $Lists.find(".item-image2").fadeOut(1000);
        $Lists.find(".item-image3").fadeOut(1000);
        setTimeout(function(){
            $Lists.removeClass("current");
        }, 1000);
    };

    function fixAnimIn($List) {
        $List.find(".item-image1").toggleClass("flipOutX flipInX");
        $List.find(".item-image2").toggleClass("flipOutY flipInY");
        $List.find(".item-image3").toggleClass("flipOutX flipInX");
    };

    function AnimIn($List) {
        $List.addClass("current");
        $List.find(".item-image1").fadeIn(1000);
        $List.find(".item-image2").fadeIn(1000);
        $List.find(".item-image3").fadeIn(1000);
    };

});
