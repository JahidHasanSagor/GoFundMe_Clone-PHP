<?php 

	include_once 'Crud.php';
 
	$crud = new Crud();

		$goal=$_POST['goal'];
		$camp_title=$_POST['camp_title'];
		$zip=$_POST['zip'];
		$img=$_POST['img'];
		$catagory=$_POST['catagory'];
		$story=$_POST['story'];

		$query= "INSERT into campaign(goal,title,catagory,image,zip_code,story) VALUES('$goal','$camp_title','$catagory','$img','$zip','$story')";
		$result = $crud->execute($query);
		
		if($result){
			echo "success";
		}else{
			echo "problem";
		}

 ?>