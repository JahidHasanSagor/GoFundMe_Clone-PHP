<?php

	include_once 'Crud.php';
	
	$crud = new crud();
	
	$id = $_POST['delete_id'];
	
	if($crud->delete($id,"campaign")){
		echo "success";
	}


?>