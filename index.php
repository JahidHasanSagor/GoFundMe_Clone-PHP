<!DOCTYPE html>
<html>
<head>
	<title>GoFundMe</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index.css"> 
</head>
<body>
	<div class="header">
		 <div class="header-title">
		 	<h3>gofundme</h3>
		</div>
	<div class="heading-left">
		<ul>
			<li><a href="#">Search</a></li>
			<li><a class="a1" href="#">Discover</a></li>
			<li><a href="#">Fundraise For</a></li>
		</ul>
	</div>
	<div class="heading-right">
		<ul>
			<li><a href="#" border="1">How it works</a></li>
			<li><a href="#">Sign In</a></li>
			<li><a href="campaign_list.php">Profile</a></li>
		</ul>
	</div>
	<div class="mid-heading">
		<h1 class="mid-heading1">Fundraising for the people and causes you care about</h1>
		<h3 class="mid-heading2">Get Started Today.</h3>
		<a type="button" href="user_registration.php" class="mid-head-btn">Start a GoFundMe</a>
		<p class="mid-head-para">Standard transaction fees apply to credit and debit card transactions</p>
	</div>
	</div>
	<h2 class="story-title">Top Fundraisers</h2>
	<div class="top-stories">
		<div class="story">
			<img src="img/charity2.jpg">
			<p>Fortunately, the situation has moved out of the emergency phase and The Humane Society of the United States and Humane Society International have taken on responsibility for the lifetime care of the chimpanzees. The research organization that used the chimpanzees in research has provided approximately half of the estimated funding needed for the chimps’ lifetime care. But, we need your help to make up the difference!</p>
		</div>

		<div class="story">
			<img src="img/helping1.jpg">
			<p>Quilts Of Hope makes personalized quilts for children with serious or chronic medical conditions. What makes our quilts so special is they are not only personalized with any theme your child picks out, but they also include messages of encouragement that i collect from family, friends, and supporters of your child. Family and friends email their messages to me and i write them I went over to see what was wrong. </p>
		</div>
		<div class="story nomrgn">
			<img src="img/charity12.jpg">
			<p>All the children were running around excited with the new footballs except one young girl who sat by a tree crying. I went over to see what was wrong, and discovered she had a nasty burn to her leg which was starting to get infected. The girls was named Promise, and she was 5 years old. Her family couldn't afford medical treatment so myself, Promise and Ronald hopped on a Boda Boda (motorbike taxi) to the nearest town to get treatment.</p>
		</div>
		<div class="story-btn">
			<a href="#" >See more> </a>
		</div>

	</div>
	<div class="team-fund">
		<div class="team-img">
			<img src="img/charity15.jpg">
		</div>
		<div   class="team-list" >
			<h3 style="font-family:Lato,Arial,sans-serif;font-size: ;font-size: 20px ">GoFundMe Team Fundraising</h3>
			<ul>
				<li>Collaborate with team members to rally support</li>
				<li>Keep track of contributions and manage your team</li>
				<li>Motivate team members with fundraising leaderboards</li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
		<?php 
		
		include_once 'Crud.php';
	
		$crud = new Crud();
		$query = "select * from campaign";
		$result = $crud->getData($query);
		 
		 ?>
		 <div class="image">
		 	<?php 
		 	foreach ($result as $key => $res) {
		 	 	echo "<img style='width: 250px;margin-top: 50px' src=".$res['image']." >";
		 	 	echo "<br>";
		 	 	echo $res['title'];
		 	 	echo "<br>";
		 	 	echo "<form action='index.php' method='POST'>";
		 	 	echo "<input type='text' name='money' value=".$res['raiser_money'].">";
		 	 	echo "<input type='submit' name='submit'  value='Donate Now'>";
		 	 	echo "<br>";
		 	 	echo "</form>";
		 	 	$id=$res['id'];
		 	 	$donation= $_POST['money'];
		 	 } 
		 	 	if(isset($_POST['submit'])){
		 	 		$query= "UPDATE campaign SET raiser_money='$donation' where id=$id";
		 	 		$result= $crud->execute($query);
		 	 		if($result){
			
					echo "Donation Successfull";
		 	 	}
		 	 }
		 	 ?>
		 </div>
		 
		 	 
		 	  
		 </div>
	</div>
	<footer>
		<div class="mt-5 pt-5 pb-5 footer">
			<div class="container">
  			<div class="row">
    			<div class="col-lg-5 col-xs-12 about-company">
      				<h2>GoFundMe</h2>
      				<div class="col-lg-3 col-xs-12 links" id="link">
				      <h4 class="mt-lg-0 mt-sm-3">Links</h4>
				        <ul>
				          <li><a href="#">About Us</a></li>
				          <li><a href="#">How It works</a></li>
				        </ul>
				    </div>
				</div>
				<div class="col-lg-4 col-xs-12">
			      <h4 class="mt-lg-0 mt-sm-4">Location</h4>
			      <p>32,Dhanmondi Dhaka</p>
			      <p class="mb-0"><i class="fa fa-phone mr-3"></i>01754-30310</p>
			      <p><i class="fa fa-envelope-o mr-3"></i>info@gofundme.com</p>
		   		 </div>
			</div>
			<div class="row mt-5">
			    <div class="col copyright">
			      	<p class=""><small class="text-white-50">© 2019. All Rights Reserved.</small></p>
			    </div>
  			</div>
		</div>
	</div>
	</footer>
	
</body>
</html>