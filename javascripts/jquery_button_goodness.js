$(document).ready(function(){
	$(".dropdown-menu li a").click(function(){
		$(this).parents(".input-group-btn").find('.btn').text($(this).text());
	  $(this).parents(".input-group-btn").find('.btn').val($(this).text());

	  //alert($('.input-group-btn').find('.btn').val());
	});
	$('#edit_submit').click(function(e){
		var value = $('.btn-group').find('.active').children('.visibility').val();
		$('#subject_form').append("<input type='hidden' name='visible' value='" + value +"'/>");
		$('#subject_form').append("<input type='hidden' name='position' value='" + $('.dropdown-toggle').text() + "'/>");
		
	})

	$('#new_subject_submit').click(function(e){
		$('#subject_form').append("<input type='hidden' name='position' value='" + $('.dropdown-toggle').text() + "'/>");
	});
	$('#edit_page_submit').click(function(e){
		$('#edit_page_form').append("<input type='hidden' name='position' value='" + $('.dropdown-toggle').text() + "'/>");
		var value = $('.btn.btn-default.active').find('.visibility').val();
		$('#edit_page_form').append("<input type='hidden' name='visible' value='" + value + "'/>" );
	});
	$('#create_page_submit').click(function(e){
		$('#create_page_form').append("<input type='hidden' name='position' value='" + $('.dropdown-toggle').text() + "'/>");
		
		$('#visibility_value').val($('.btn.btn-default.active').find('.create_page_visibility').val());
	});
})