<?php
session_start();
	if(!isset($_SESSION['email'])){
		header('location:login.php');
	}
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	$id = $_POST['edit_id'];
	
	$query = "select * from campaign where id=$id";
	$result = $crud->getData($query);
	
	foreach($result as $res){
		$goal = $res['goal'];
		$donation = $res['raiser_money'];
		$title = $res['title'];
		$catagory = $res['catagory'];
		$img = $res['image'];
		$zip_code = $res['zip_code'];
		$story = $res['story'];

	}
?>
<div class="container">
<table class="table table-striped">
	<input type="int" name="id" id="uid" hidden value="<?php echo $id;?>"/><br>
	Goal: <input type="number" name="goal" id="ugoal"  value="<?php echo $goal;?>"/><br>
	Title: <input type="int" name="title" id="title"  value="<?php echo $title;?>"/><br>
	Catagory: <input type="int" name="catagory" id="catagory"  value="<?php echo $catagory;?>"/><br>
	<img id="preview" style="width:10%" src="<?php echo($img) ?>"/></br>
	Zip code: <input type="int" name="zip_code" id="zip"  value="<?php echo $zip_code;?>"/><br>
	Story: <input type="int" name="story" id="story"  value="<?php echo $story;?>"/><br>
	<input type="button" id="updt" name="update" value="Update"/>
	<input type="button" onclick="$('#edit-form').slideUp();" name="cancel" value="Cancel"/>

</div>



<script type="text/javascript">
	$(document).ready(function(){
		
		$('#updt').click (function(){
			 
			var id = $('#uid').val();
			var goal = $('#ugoal').val();
			var title = $('#title').val();
			var catagory = $('#catagory').val();
			 
			var zip_code = $('#zip').val();
			var story = $('#story').val();
		
			$.ajax({
				url:"editAction.php",
				type:"POST",
				data: {id:id,goal:goal,title:title, catagory:catagory,zip_code:zip_code,story:story},
				success: function(data){
					
					if(data == 'success'){
						 
						$('#uid').val('');
						$('#ugoal').val('');
						$('#title').val('');
						$('#catagory').val('');
						 
						$('#email').val('');
						$('#edit-form').slideUp();
						 
						$.get('profile.php',function(response){
							$('#data-show').html(response);
						})
					
					}else{
						if(data=="error"){
							alert("Error");
						}
					}
				}
			})
		})
		
		
		
	})
</script>