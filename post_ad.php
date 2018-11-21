<?php 
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}?>
<!DOCTYPE html>
<html>
<head>
	<title>My Ads</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
</head>
<body>
	<?php
	if (empty($user_name)) {?>
	<div class="container d-flex mt-3 justify-content-center">
			<div class="w-50 alert text-center border-success" role="alert">
				<h4 class="alert-heading text-center">
					<?php
					echo "You're not Logged in";
					?>
				</h4>
				<button class="btn btn-outline-success bg-light">
					<a href="login.php" class="text-dark">Login now</a>
				</button>
			</div>
		</div>
	</div>
</body>
</html>
	<?php
	die();
	}
	?>
	<nav class="navbar navbar-expand-sm navbar-dark p-2">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<img src="img/mountain.png" alt="logo" style="width:100px;">
				<strong class="Logo">HillCart</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link px-3 m-1" href="post_ad.php?name=value1" method="GET">
							<i class="fa fa-pencil fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">Post Ad</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-3 m-1" href="my_ads.php">
							<i class="fa fa-adn fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">My Ads</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-3 m-1" href="my_proposals.php">
							<i class="fa fa-file-text fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">My Proposal</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-3 m-1" href="payment.php">
							<i class="fa fa-inr fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">Payments</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-3 m-1" href="profile.php">
							<i class="fa fa-user-circle-o fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">Account</span>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<div class="dropdown">
					    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
					    	<i class="fa fa-bars fa-lg"></i>
					    </button>
					    <div class="dropdown-menu">
							<a class="dropdown-item " href="logout.php">
								<i class="fa m-2 fa-sign-out fa-lg"></i>
								Logout
							</a>
							<a>
								<p class='text-primary text-center'>
								<?php echo "(".$_SESSION["name"].")";?>
								</p>
							</a>					    	
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav><br>
		<div class="container">
			<div class="p-4 mx-auto w-75 new_ad text-center">
				<center>
					<h3>Post an Ad:</h3>
				</center>
				<form action="thankyou.php" id="post_ad" method="POST">
					<!-- <div class="form-group text-left">
						<label for="Type of use">Type of use</label>
						<select class="form-control" id="use" name="use">
							<option>Want to go!</option>
							<option>I'm Going</option>
						</select>
					</div> -->
					<div class="form-group text-left">
						<label for="from">From:</label>
						<input type="text" class="form-control" name="start_location" id="from" placeholder="Enter starting location" >
					</div>
					<div class="form-group text-left">
						<label for="to">To:</label>
						<input type="text" class="form-control" name="destination" id="to" placeholder="Enter destination" >
					</div>
					<div class="form-group text-left">
						<label for="fare">Fare:</label>
						<input type="number" class="form-control" name="fare" id="fare" placeholder="Enter fare" >
					</div>
					<div class="form-group text-left">
						<label for="Timing">Timing:</label>
						<input type="time" class="form-control" name="time" id="Timing" placeholder="Enter Timing" >
					</div><br>
					<button type="submit" class="m-1 btn btn-success" >Submit</button>
					<button type="reset" class="m-1 btn btn-secondary">Reset</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/main.js"></script>
	<script src="js/main_jquery.js"></script>
</body>
</html>