$(document).raedy(function(){
	$(document).on("change", "#file", function(){
		var image_name = $("#file").val();
		$("#file-lable").html(image_name);
	})
})