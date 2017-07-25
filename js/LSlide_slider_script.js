$=jQuery.noConflict();
$(document).ready(function(){
	var $Click = $(".btn button");

	var currentIndex = 0,
		$Lists = $('.list-item-sliderApo'),
		itemAmt = $Lists.length;

	function Anim(currentIndex) {
		var $List = $('.list-item-sliderApo').eq(currentIndex);
		AnimOut($Lists);
		AnimIn($List);
	};
	function AnimOut($Lists) {
		$Lists.find("h5").fadeOut(500);
		$Lists.find(".item-image1").removeClass("flipInX").delay(500).addClass("flipOutX").fadeOut(1000);
		$Lists.find(".item-image2").removeClass("flipInY").delay(500).addClass("flipOutY").fadeOut(1000);
		$Lists.find(".item-image3").removeClass("flipInX").delay(500).addClass("flipOutX").fadeOut(1000);
		setTimeout(function(){
			$Lists.css("display", "none").removeClass("current");
		}, 1500)
	};
	function AnimIn($List) {
		setTimeout(function(){
			$List.css("display", "flex").addClass("current");
			$List.find(".item-image1").removeClass("flipOutX").delay(500).addClass("flipInX").fadeIn(0);
			$List.find(".item-image2").removeClass("flipOutY").delay(500).addClass("flipInY").fadeIn(0);
			$List.find(".item-image3").removeClass("flipOutX").delay(500).addClass("flipInX").fadeIn(0);
			setTimeout(function(){
			$List.find("h5").fadeIn(500);
		}, 500)
	}, 1500)
	}
	$Click.on("click", function(){
		currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
			currentIndex = 0;
		}
		Anim(currentIndex);
	});
});
