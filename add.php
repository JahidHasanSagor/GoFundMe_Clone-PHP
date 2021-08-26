<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="add">
		<div class="container">
			<h2 class="text-center text-orange pt-5">Create Your Campaign</h2>
			<a href="index.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Home" ></a>
			<div class="form-group  ">

             <a href="campaign_list.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Profile" style="float: right;"></a><br>
        </div>
		<div class="form-group text-center">
        	<a href="logout.php"><input type="submit" name="submit" class="btn btn-info btn-md " value="Log Out" style="float: right; display: inline;"></a>
		</div>
        <div class="row justify-content-center align-items-center">
            <div id="add-column" class="col-md-6">
                <div id="add-box" class="col-md-12">
                    <form  class="form add-form" >
                        <div class="form-group">
                            <label for="goal" class="text-success">Goal:</label><br>
                            <input type="text" name="goal" id="goal" class="form-control" required>
                            <div class="dropdown">
								<select class="form-control" id="currency" name="currency">
								    <option>Euro</option>
								    <option>Dollar</option>
									<option>Taka</option>
								</select>
						  	</div>
						</div>
                    
		                <div class="form-group">
		                    <label for="camp_title" class="text-success">Campaign Title:</label><br>
		                    <input type="text" name="camp_title" id="camp_title" class="form-control" required>
		                </div>
		                <div class="form-group">
			                <label for="zip" class="text-success">ZIP Code:</label><br>
			                <input type="text" name="zip" id="zip" class="form-control" required>
		                </div>
		                <div class="dropdown">
							<select class="form-control" id="catagory" name="catagory">
								<option>Medical</option>
								<option>Education</option>
								<option>Chaity</option>
							</select>
						</div>
		                <div class="form-group">
		                    <img id="preview" style="width:10%" src="images/noimage.png"/></br>
		                    <label for="add_file" class="text-success">Add a cover photo:</label><br>
		                    <input type="file" onchange="showMyImage(this,'preview')"  id="imgURL" class="form-control" >
		                </div>
		                <div class="form-group">
		                        <label for="story" class="text-success">Story:</label><br>
		                        <textarea class="form-control" rows="3" id="story" name="story"></textarea>
		                </div>
		                <div class="form-group">
		                    <input type="button" name="button" id="add_data" class="btn btn-info btn-md text-warning text-center" value="Launch Campaign" style="margin-left: 210px;">
		                </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	function showMyImage(fileInput,id) {
			
			console.log(fileInput);
			
			var files = fileInput.files;
			console.log(files);
			for (var i = 0; i < files.length; i++) {           
					var file = files[i];
					var imageType = /image.*/;     
					if (!file.type.match(imageType)) {
						continue;
					}           
					var img=document.getElementById(""+id);            
					img.file = file;    
					var reader = new FileReader();
					reader.onload = (function(aImg) { 
						return function(e) { 
							aImg.src = e.target.result; 
						}; 
					})(img);
					reader.readAsDataURL(file);
				}    
    }
    $(document).ready(function () {
    	$('#add_data').click(function(){
    		var goal=$('#goal').val();
	    	var camp_title=$('#camp_title').val();
	    	var zip=$('#zip').val();
	    	var catagory=$('#catagory').val();
	    	var story=$('#story').val();
	    	var img = $('#preview').attr('src');
	    	$.ajax({
	    		url:"image_add.php",
				type:"POST",
				data: {goal:goal,camp_title:camp_title,zip:zip,catagory:catagory,img:img,story:story},
				success: function(response){
					if (response=="success") {

						$('#goal').val('');
						$('#camp_title').val('');
						$('#zip').val('');
						$('#catagory').val('');
						$('#story').val('');
						window.location.href="campaign_list.php";

					}
				}

				})
    	})
    })



</script>
