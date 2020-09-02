<?php
session_start();
require_once("Config.php");
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.html');
    exit();
}
$result2 = mysqli_query($conn, "SELECT sub FROM `flogin` WHERE fid='".$_SESSION['username']."'");
$query2= mysqli_fetch_row($result2);
$_SESSION["sub1"]="$query2[0]";
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="K-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.css"> 
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
        <title>Faculty Portal</title>
  </script>
	</head>
	<script type = "text/javascript" >
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()", 0);
		window.onunload=function(){null};
    </script>
<body>
<?php
include('nav.php');
?>
<div class="row">
  <div class="col-xl-2 col-lg-2 col-sm-3 col-xs-4">
    <div class="nav flex-column nav-pills" id="side" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">View Assignments</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Upload Assignments</a>
      <a class="nav-link" id="v-pills-ass-tab" data-toggle="pill" href="#v-pills-ass" role="tab" aria-controls="v-pills-ass" aria-selected="false">My Assignments</a>
      </div>
  </div>
  <div class="col-xl-10 col-lg-10 col-sm-9 col-xs-8">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      <div class="home"><br>
            <?php
            if($_SESSION["sub1"] == "SE")
            {
                $subtable = "sub_se";
            }
            elseif($_SESSION["sub1"] == ".NET")
            {
                $subtable = "sub_net"; 
            }
            elseif($_SESSION["sub1"] == "WT")
            {
                $subtable = "sub_wt"; 
            }
            elseif($_SESSION["sub1"] == "AJ")
            {
                $subtable = "sub_aj"; 
            }
            elseif($_SESSION["sub1"] == "TOC")
            {
                $subtable = "sub_toc"; 
            }
            elseif($_SESSION["sub1"] == "DE")
            {
                $subtable = "sub_de"; 
            }
            require_once("Config.php");
						// Get images from the database
						$query = $conn->query("SELECT * FROM $subtable ORDER BY upload_t DESC");
						//$file1 = $conn->query("SELECT ass FROM sub_wt where enumber=$enumber1 ORDER BY upload_t DESC");
						if($query->num_rows > 0){
							while($row = $query->fetch_assoc()){
								$imageURL = 'uploads/'.$row["ass"];
            ?>
            <div class="card mb-3" id="acard" style="max-width: 700px;">
						<div class="row no-gutters">
							<div class="col-md-6">
							<iframe src="<?php echo $imageURL; ?>" width="330px" height="162px"></iframe>
							</div>
							<div class="col-md-6">
							<div class="card-body">
								<p class="card-text">
                                Enrollment No :- <?php echo $row["enumber"]; ?><br>
								File Name :- <?php echo $row["ass"]; ?> 
								/ <?php echo $row["chapter"]; ?><br>
								Uploaded On :- <?php echo $row["upload_t"]; ?><br>
                                Greade :- 
                                <?php 
                                if($row["greade"] == null)
                                {?>
                                    <input class="gr" name=gr type="text"> <button type="button" class="btn btn-primary" id="dd">Add</button>
                                    <?php
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
							<p>No Assignments found...</p>
						<?php } ?>
                            </div>
                            </div>

      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <div class="home">
          <div class="row">
          <div class="col-sm-3 col-xs-0"></div>
          <div class="col-sm-6 col-xs-12">
      <form action="upload.php" class="fff" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Select Chapter</label>
        <select class="form-control" name="chap" id="exampleFormControlSelect1">
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
            <option value="Chapter-13">13</option>
            <option value="Chapter-14">14</option>
            <option value="Chapter-15">15</option>
        </select>
     </div>
        <div class="form-group">
                <input type="file" name="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Submission Date(yyyy-mm-dd)</label>
            <input type="text" name="sdate" class="form-control" id="exampleInputPassword1" placeholder="yyyy-mm-dd">
         </div>
         <div class="form-group">
                 <input type="submit" name="submit" value="Upload" class="btn btn-success">
         </div>
      </form>
      </div>
      <div class="col-sm-3"></div>
      </div>
    </div>
    </div>

      <div class="tab-pane fade" id="v-pills-ass" role="tabpanel" aria-labelledby="v-pills-ass-tab">
      <div class="home">
      <br>
			  <?php
						// Include the database configuration file
						require_once("Config.php");
						$fid1 = $_SESSION["username"];
						// Get images from the database
						$query = $conn->query("SELECT * FROM f_ass where fid='".$fid1."' ORDER BY upload_t DESC");
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
								File Name :- <?php echo $row["ass"]; ?><br>
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
    </div>
  </div>
</div>
          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.js"></script>
          <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
          <script type="text/javascript" src="js/jquery-ui.min.js"></script>
</body>
</html>