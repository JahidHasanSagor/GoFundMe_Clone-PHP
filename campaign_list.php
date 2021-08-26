<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}
?>
<body>
	
	<div id="data-show"></div>
	<div id="edit-form"></div>



	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.get('profile.php',function(data){
				$('#data-show').html(data);
			})
		})


	</script>
</body>