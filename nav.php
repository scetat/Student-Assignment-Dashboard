<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="K-UA-Compatible" content="ie-edge">
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="css/bootstrap.css"> 
		<title>Faculty Portal</title>
	</head>
<body>

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
					  <a class="dropdown-item" href="#" id="ditem">My profile</a>
					  <a class="dropdown-item" href="logout.php" id="ditem">Log-out</a>
					</div>
				  </div>
			</div>
			</div>
		  </nav>
</body>
</html>