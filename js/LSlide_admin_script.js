$=jQuery.noConflict();
$(document).ready(function(){
	var $buttonAdd = $(".btn_lslide_add button");
	var $buttonSubmit = $(".btn-submit");
	var $formAdd = $(".tr-add-SLide");

	$buttonAdd.on("click", function(){
		$buttonAdd.toggle(500);
		$formAdd.toggle(250);
	})
});
