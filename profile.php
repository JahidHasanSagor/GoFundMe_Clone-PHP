<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}

include_once 'Crud.php';

$crud = new Crud();

$query = "Select * from campaign";

$result = $crud->getData($query);
if($result){

?>
	<div class="container">
	<a href="index.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Home" style=" margin-top: 50px;"></a>
	<a href="add.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Launch New Campaign" style=" margin-top: 50px;"></a>
	<a href="logout.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Log Out" style="float: right; margin-top: 50px;"></a>
	<h2 class="text-center text-orange pt-5">Dashboard</h2>
		<table class="table table-striped">
			<tr>
				<th>Goal</th>
				<th>Rasied Money</th>
				<th>Image</th>
				<th>Title</th>
				<th>Catagory</th>
				<th>Zip Code</th>
				<th>Story</th>
				<th>Action</th>
			</tr>
			
<?php
	 foreach($result as $key=>$res){
		 echo "<tr>";
		 echo "<td>".$res['goal']."</td>";
		 echo "<td>".$res['raiser_money']."</td>";
		 echo "<td><img width='200px' src='".$res['image']."'/></td>";
		 echo "<td>".$res['title']."</td>";
		 echo "<td>".$res['catagory']."</td>";
		 
		 echo "<td>".$res['zip_code']."</td>";
		 echo "<td>".$res['story']."</td>";
		 echo "<td><button id=".$res['id']." class='edit'>Edit</button> | 
		 <button id=".$res['id']." class='delete'>Delete</button></td>";
		 echo "</tr>";
	 }
 
			
		echo "</table>";
		echo "</div>";
		}
		else{
			echo "Please Launch Campaign";
		}	
			
		
?>
		

		

<script type="text/javascript">
	$(document).ready(function(){
		$('.edit').click(function(){
			
			var id = $(this).attr('id');
			
			$.ajax({
				url:'edit.php',
				type:'POST',
				data:{edit_id:id},
				success:function(response){
				 
					$('#edit-form').html(response);
				 
				}
			})
		})
		$('.delete').click(function(){
			
			var id = $(this).attr('id');
			
			$.ajax({
				url:'delete.php',
				type:'POST',
				data:{delete_id:id},
				success:function(response){
					 
						$.get('profile.php',function(response){
							$('#data-show').html(response);
						})
					 
				}
			})
		})
	})
	
</script>