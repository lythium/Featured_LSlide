$=jQuery.noConflict();
$(document).ready(function(){
    var $Click = $(".btn button");

    var currentIndex = 0,
    $Lists = $('.list-item-sliderApo'),
    $item1 = $Lists.find(".item-image1"),
    $item2 = $Lists.find(".item-image2"),
    $item3 = $Lists.find(".item-image3"),
    $itemAmt = $Lists.length;

    $Click.click(function(e) {
        e.stopPropagation();
        switchInterv($itemAmt);
    });
    setInterval(function() {
        switchInterv($itemAmt);
    }, 7000);
    $(".content-item-list").hover(function(e){
        e.stopPropagation();
        $(this).parent().children("h2").slideDown(500);
    }, function(e) {
        e.stopPropagation();
        $(this).parent().children("h2").slideUp(500);
    });

    function Anim(currentIndex) {
        var $List = $('.list-item-sliderApo').eq(currentIndex);
        console.log(currentIndex);
        AnimOut($Lists);
        setTimeout(function(){
            AnimIn($List);
        }, 1500)
    };
    function goQueue() {
        $List.queue(function(){
        });
    };

    function AnimOut($Lists) {
        // $Lists.find(".item-image1").toggleClass("flipInX").toggleClass("flipOutX").fadeOut(1000);
        $Lists.find(".item-image1").toggleClass("flipInX flipOutX").delay(500).fadeOut(800);
        $Lists.find(".item-image2").toggleClass("flipInY flipOutY").delay(500).fadeOut(800);
        $Lists.find(".item-image3").toggleClass("flipInX flipOutX").delay(500).fadeOut(800);
        setTimeout(function(){
            $Lists.removeClass("current").dequeue();
        }, 1000);

    };
    function AnimIn($List) {
        $List.queue(function(){
            $List.addClass("current").dequeue();
        });
        $List.find(".item-image1").toggleClass("flipOutX flipInX").delay(500).fadeIn(500);
        $List.find(".item-image2").toggleClass("flipOutY flipInY").delay(500).fadeIn(500);
        $List.find(".item-image3").toggleClass("flipOutX flipInX").delay(500).fadeIn(500);
    };
    function switchInterv($itemAmt) {
        currentIndex += 1;
        if (currentIndex > $itemAmt - 1) {
            currentIndex = 0;
        }
        Anim(currentIndex);
    };
});
