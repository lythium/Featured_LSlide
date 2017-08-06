$=jQuery.noConflict();
$(document).ready(function(){
    var $Click = $(".btn button");

    var currentIndex = 0,
    $Lists = $('.list-item-sliderApo'),
    $item1 = $Lists.find(".item-image1"),
    $item2 = $Lists.find(".item-image2"),
    $item3 = $Lists.find(".item-image3"),
    $itemAmt = $Lists.length;

    $Click.click(function() {
        switchInterv($itemAmt);
    });
    // setInterval(function() {
    //     switchInterv($itemAmt);
    // }, 7000);

    function Anim(currentIndex) {
        var $List = $('.list-item-sliderApo').eq(currentIndex);
        AnimOut($Lists);
        AnimIn($List);
    };
    function goQueue() {
        $List.queue(function(){
        });
    };

    function AnimOut($Lists) {
        $Lists.find("h2").fadeOut(500);
        $Lists.find(".item-image1").toggleClass("flipInX").toggleClass("flipOutX").fadeOut(1000);
        $Lists.find(".item-image2").toggleClass("flipInY").toggleClass("flipOutY").fadeOut(1000);
        $Lists.find(".item-image3").toggleClass("flipInX").toggleClass("flipOutX").fadeOut(1000);
        setTimeout(function(){
            $Lists.css("display", "none").removeClass("current");
        }, 1500)
    };
    function AnimIn($List) {
        setTimeout(function(){
            $List.css("display", "flex").addClass("current");
            $List.find(".item-image1").toggleClass("flipOutX").toggleClass("flipInX").fadeOut(1000);
            $List.find(".item-image2").toggleClass("flipOutY").toggleClass("flipInY").fadeOut(1000);
            $List.find(".item-image3").toggleClass("flipOutX").toggleClass("flipInX").fadeOut(1000);
            setTimeout(function(){
                $List.find("h2").fadeIn(500);
            }, 500)
        }, 1500)
    };
    function switchInterv($itemAmt) {
        currentIndex += 1;
        if (currentIndex > $itemAmt - 1) {
            currentIndex = 0;
        }
        Anim(currentIndex);
    };
});
