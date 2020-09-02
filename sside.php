
<?php
session_start();
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="K-UA-Compatible" content="ie-edge">
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="css/bootstrap.css"> 
		<style>
			body {
			background: url('photos/book.jpg') no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
			-o-background-size: cover;
			}
		</style>
		<title>Assignment Portal</title>
	</head>
	<script type = "text/javascript" >
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()", 0);
		window.onunload=function(){null};
	</script>
<body>
	<script>
		var input = document.getElementById( 'file-upload' );
		var infoArea = document.getElementById( 'file-upload-filename' );

		input.addEventListener( 'change', showFileName );

		function showFileName( event )
		 {
		
		// the change event gives us the input it occurred in 
		var input = event.srcElement;
		
		// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
		var fileName = input.files[0].name;
		
		// use fileName however fits your app best, i.e. add it into a div
		infoArea.textContent = 'File name: ' + fileName;
		}
	</script>
		<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="nclr">
			<img src="photos/logo2.jpg" class="zoom img-fluid" alt="assignment">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
		  
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto" id="fsize">
				<li class="nav-item active">
					<a class="nav-link" id="bnav" href="#">Collage Information</a>
				  </li>
				  <li class="nav-item active">
					<a class="nav-link" id="bnav" href="#">Time Table</a>
				  </li>
				<li class="nav-item active">
				  <a class="nav-link" id="bnav" href="#">EBooks</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" id="bnav" href="#">Events</a>
				  </li>
			  </ul>
			  <div class="nav-item active">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dd" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php
						echo $_SESSION["name1"];
						?>
					</button>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					  <a class="dropdown-item" href="profile.php" id="ditem">My profile</a>
					  <a class="dropdown-item" href="logout.php" id="ditem">Log-out</a>
					</div>
				  </div>
			</div>
			</div>
		  </nav>

		  <div class="row">
  <div class="col-xl-2 col-lg-2 col-sm-3 col-xs-4">
    <div class="nav flex-column nav-pills" id="side" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Upload Assignment</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Download Assignment</a>
	 <a class="nav-link" id="v-pills-assignment-tab" data-toggle="pill" href="#v-pills-assignment" role="tab" aria-controls="v-pills-assignment" aria-selected="false">My Assignments</a>
	 <a class="nav-link" id="v-pills-prof-tab" data-toggle="pill" href="#v-pills-prof" role="tab" aria-controls="v-pills-prof" aria-selected="false">My Profile</a>
    </div>
  </div>
  <div class="col-xl-10 col-lg-10 col-sm-9 col-xs-8">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

			<div class="home">
			
			</div>

	  </div>

      <div class="tab-pane fade"  id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	  		<div class="home">
			<div class="row">
			  <div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">Web Technology</h5>
				<button type="button" data-toggle="modal" data-target="#subwt" id="dd" class="btn btn-primary">Submit</button>

				<div class="modal fade" role="dialog" id="subwt">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your WT Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="wt.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						<option value="Chapter-7">7</option>
						<option value="Chapter-8">8</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>
	
			</div>
			</div>

			<div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">Software Engineering</h5>
				<button type="button" data-toggle="modal" data-target="#subse" id="dd" class="btn btn-primary">Submit</button>
				<div class="modal fade" role="dialog" id="subse">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your SE Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="se.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						<option value="Chapter-7">7</option>
						<option value="Chapter-8">8</option>
						<option value="Chapter-9">9</option>
						<option value="Chapter-10">10</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>

			</div>
			</div>

			<div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">Advance JAVA</h5>
				<button type="button" data-toggle="modal" data-target="#subaj" id="dd" class="btn btn-primary">Submit</button>
				<div class="modal fade" role="dialog" id="subaj">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your AJ Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="aj.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						<option value="Chapter-7">7</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>



			</div>
			</div>
			</div>

			<div class="row">
			  <div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">Dot Net Technology</h5>
				<button type="button" data-toggle="modal" data-target="#subnet" id="dd" class="btn btn-primary">Submit</button>
				<div class="modal fade" role="dialog" id="subnet">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your .NET Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="net.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						<option value="Chapter-7">7</option>
						<option value="Chapter-8">8</option>
						<option value="Chapter-9">9</option>
						<option value="Chapter-10">10</option>
						<option value="Chapter-11">11</option>
						<option value="Chapter-12">12</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>



				
			</div>
			</div>

			<div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">TOC</h5>
				<button type="button" data-toggle="modal" data-target="#subtoc" id="dd" class="btn btn-primary">Submit</button>
				<div class="modal fade" role="dialog" id="subtoc">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your TOC Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="toc.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>

			</div>
			</div>

			<div class="card border-success col-lg-3 col-sm-4"  id="scard">
				<div class="card-header">Subject</div>
				<div class="card-body">
				<h5 class="card-title">Design Engineering</h5>
				<button type="button" data-toggle="modal" data-target="#subde" id="dd" class="btn btn-primary">Submit</button>

				<div class="modal fade" role="dialog" id="subde">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="color: black;">Upload your DE Assignments</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        <form action="de.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<select class="form-control" name="ch" required id="exampleFormControlSelect1">
						<option selected hidden value="">Select Chapter</option>
						<option value="Chapter-1">1</option>
						<option value="Chapter-2">2</option>
						<option value="Chapter-3">3</option>
						<option value="Chapter-4">4</option>
						<option value="Chapter-5">5</option>
						<option value="Chapter-6">6</option>
						<option value="Chapter-7">7</option>
						<option value="Chapter-8">8</option>
						<option value="Chapter-9">9</option>
						<option value="Chapter-10">10</option>
						<option value="Chapter-11">11</option>
						<option value="Chapter-12">12</option>
						</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    </div>
                </form>
                </div>
        	</div>
    
		</div>


			</div>
			</div>
			</div>
			</div>
	  </div>

      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	  		<div class="home">
			  <br>
			  <?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM f_ass ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'fuploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<p class="card-text">
								Subject Name :- <?php echo $row["sub"]; ?> <br>
								File Name :- <?php echo $row["ass"]; ?> / 
								<?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Submission Date :- <?php echo $row["s_date"]; ?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No Assignments found...</p>
						<?php } ?>

			</div>
	  </div>
      <div class="tab-pane fade" id="v-pills-assignment" role="tabpanel" aria-labelledby="v-pills-assignment-tab">
	  		<div class="home">
				  <br>
			  <?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Web Technology</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :- <?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No Web Technology Assignments found...</p>
						<?php } ?>





						<?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_se where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Software Engineering</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :-<?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No Software Engineering Assignments found...</p>
						<?php } ?>


						<?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_aj where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Advance JAVA</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :- <?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No Advance JAVA Assignments found...</p>
						<?php } ?>


						
						<?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_net where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">.NET Technology</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :- <?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No .NET Technology Assignments found...</p>
						<?php } ?>


						<?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_toc where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Theory of Computation</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :- <?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No TOC Assignments found...</p>
						<?php } ?>



						<?php
						// Include the database configuration file
						require_once("Config.php");
						$enumber1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM sub_de where enumber=$enumber1 ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
								
						?>
						<div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="160px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title">Design Engineering</h5>
								<p class="card-text">
								File Name :- <?php echo $row["ass"]; ?><br>
								Chapter :- <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
								Greade :- <?php 
								if($row["greade"] == null){
									echo "Pendding";
								}
								else{
									echo $row["greade"];
								}
								?>
								</p>
							</div>
							</div>
						</div>
						</div>
							
							
						<?php }

						}else{ ?>
							<p>No Design Engineering Assignments found...</p>
						<?php } ?>


			</div>
	  </div>

	  <div class="tab-pane fade" id="v-pills-prof" role="tabpanel" aria-labelledby="v-pills-prof-tab">

				<div class="home">
					<br>
							<form class="p" action="profile.php" method="post">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											First Name <input type="text" name="f_name" value="<?php echo $_SESSION["name1"]; ?>" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											Last Name <input type="text" name="l_name" value="<?php echo $_SESSION["lname"]; ?>" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											Enrollment Number <input type="number" name="e_number" value="<?php echo $_SESSION["enumber"]; ?>" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											Mobile Number <input type="number" name="m_number" value="<?php echo $_SESSION["mnumber"]; ?>" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											Email Id <input type="text" name="email_id" value="<?php echo $_SESSION["emailid"]; ?>" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											Branch <select class="form-control" value="<?php echo $_SESSION["branch"]; ?>" name="s_branch" required id="exampleFormControlSelect1">
													<option selected hidden ><?php echo $_SESSION["branch"]; ?></option>
													<option value="Computer-M">Computer-M</option>
													<option value="Computer-E">Computer-E</option>
													<option value="IT">IT</option>
													<option value="Electrical-M">Electrical-M</option>
													<option value="Electrical-E">Electrical-E</option>
													<option value="Civil">Civil</option>
													<option value="EC">EC</option>
													<option value="Text-tile">Text-tile</option>
													</select>
										</div>
									</div>
									<div class="col-sm-2">
										Year  <select class="form-control" name="s_year" required id="exampleFormControlSelect1">
												<option selected hidden ><?php echo $_SESSION["year"]; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>
									</div>
								</div>

								<button class="btn btn-primary" id="dd1" type="submit">Update Profile</button>
							</form>
							<br>
							<form class="p" action="" method="post">
								<h6 align="center">Change Password</h6>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											Enter Current Password <input type="text" name="c_pass" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											Enter New Password <input type="text" name="n_pass" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											Re-Enter New Password <input type="text" name="c=rn_pass" class="form-control" id="exampleFormControlInput1">
										</div>
									</div>
								</div>
								<button class="btn btn-primary" id="dd1" type="submit">Submit</button>
							</form>
				</div>

		</div>

    </div>
  </div>
</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>