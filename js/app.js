$(document).ready(function() {
	$.get('profile.php',function(data){
		$('#data-show').html(data);
	})
})