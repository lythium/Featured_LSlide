$=jQuery.noConflict();
$(document).ready(function(){
	var $buttonAdd = $(".btn_lslide_add button");
    var $buttonCancel = $(".btn-cancel");
	var $formAdd = $(".form-add-SLide");
    var $buttonSubmit = $(".btn-submit");

	$buttonAdd.on("click", function(){
		$buttonAdd.hide(0);
		$formAdd.show(0);
	})
    $buttonCancel.on("click", function(){
        $formAdd.hide(0);
		setTimeout(function () {
		   $buttonAdd.show(0);
       },0);
	})
});
