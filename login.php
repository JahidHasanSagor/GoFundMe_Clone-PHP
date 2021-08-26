<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <div id="login">
        <h3 class="text-center text-black pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-success">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-success">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md " value="Log In">
                            </div>
                            <div id="register-link" class="text-center">
                            	<p>New here?</p>
                                <a href="user_registration.php" class="text-warning">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
	session_start();

	include_once 'Crud.php';
	
	$crud = new Crud();
  if(isset($_POST['submit'])){
	  
	  $email = $_POST['email'];
	  $password = md5($_POST['password']);
	  
	  
	  $query = "select * from user_registration where email='$email' AND password='$password'";
	
	  $result = $crud->getData($query);
	if($result) {
		foreach($result as $res){
			$email = $res['email'];
			$name = $res['user_name'];
		}
		$_SESSION['email'] = $email;
		$_SESSION['user_name'] = $user_name;
		header("Location:add.php");
	}else{
		echo "Login Problem";
	}
	
	
	
  }
	
	
?>