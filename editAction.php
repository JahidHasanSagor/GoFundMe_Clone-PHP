<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header('location:login.php');
	}
	include_once 'Crud.php';
	
	$crud = new Crud();

	
		$ids=$_POST['id'];
		$goal=$_POST['goal'];
		$title=$_POST['title'];
		$catagory=$_POST['catagory'];
		 
		$zip_code=$_POST['zip_code'];
		$story=$_POST['story'];

		$result = $crud->execute("Update campaign SET goal='$goal',title='$title',catagory='$catagory',zip_code='$zip_code',story='$story' where id=$ids");
		

		if($result){
			
			echo "success";
		}else{
			echo "error";
		}
	
	?>