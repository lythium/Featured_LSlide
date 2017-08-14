$=jQuery.noConflict();
$(document).ready(function(){
	var $buttonAdd = $(".LSlide-display-backoff .btn_lslide_add button");
    var $buttonCancel = $(".LSlide-display-backoff .btn-cancel");
	var $formAdd = $(".LSlide-display-backoff .form-add-SLide");
    var $buttonSubmit = $(".LSlide-display-backoff .btn-submit");

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

    var $buttonUpdate = $('.LSlide-display-backoff [id^=btn-update_]');
    var $buttonCancelUpdate = $('.LSlide-display-backoff [id^=btn-cancel-update_]');


    $buttonUpdate.on('click',function(e){
        e.preventDefault();
        var $id = this.id.substr(11);
        var $hideResume = ".LSlide-display-backoff .hide-update_"+$id;
        var $showResume = ".LSlide-display-backoff .show-update_"+$id;
        $($hideResume).hide(0);
        $($showResume).show(0);
        $("form.update_LSlide_"+$id).parent().addClass("is-expanded");
    });
    $buttonCancelUpdate.on('click',function(e){
        e.preventDefault();
        var $idCancel = this.id.substr(18);
        var $hideResume = ".LSlide-display-backoff .hide-update_"+$idCancel;
        var $showResume = ".LSlide-display-backoff .show-update_"+$idCancel;
        $($hideResume).show(0);
        $($showResume).hide(0);
        $("form.update_LSlide_"+$idCancel).parent().removeClass("is-expanded");
    });
});
