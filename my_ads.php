<?php 
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$travel_ads = "SELECT * FROM travel WHERE Posted_by = '$user_name' ";
$result = $conn->query($travel_ads);
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Ads</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
	<div class="container">
		<nav class="navbar navbar-expand-sm bg-success navbar-dark">
		 	<a class="navbar-brand" href="home.php"><i class="fa fa-drupal fa-lg"></i></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
				  <div class="dropdown">
				    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
				    <i class="fa fa-bars fa-lg"></i>
				    </button>
				    <div class="dropdown-menu">
				    	<a class="dropdown-item" href="post_ad.php">
				    		<i class="fa m-2 fa-pencil fa-lg"></i>   
				    		Post Ad
				    	</a>
				    	<a class="dropdown-item" href="my_ads.php">
				    		<i class="fa m-2 fa-adn fa-lg"></i>   
				    		My Ads
				    	</a>
				    	<a class="dropdown-item" href="#">
				    		<i class="fa m-2 fa-file-text fa-lg"></i>   
				    		My Proposal
				    	</a>
				    	<a class="dropdown-item" href="#">
				    		<i class="fa m-2 fa-line-chart fa-lg"></i>   
				    		App Usage
				    	</a>
				    	<a class="dropdown-item" href="#">
				    		<i class="fa m-2 fa-user-circle-o fa-lg"></i>   
				    		Account
				    	</a>
				    	<a class="dropdown-item" href="login.html">
				    		<i class="fa m-2 fa-sign-out fa-lg"></i>   
				    		Logout
				    	</a>
				    </div>
				  </div>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container">
			<div class="m-2 card">
<?php 
if ($result->num_rows > 0) {
	while($ads = $result->fetch_assoc()) {?>
				<div class="m-2 card">
					<div class="card-body">
						<h5 class="card-title">Want to Go!</h5>
						<?php echo '<h6 class="card-subtitle text-muted">from '.$ads["starting_location"].' to '.$ads["destination"].'</h6><br>';?>
						<button type="button" class="m-1 btn btn-outline-success" onclick="location.href = 'see_responses.php'">
						    See responses
						</button>
						<button type="button" class="m-1 btn btn-outline-secondary" onclick="cancel_ad();">cancel</button>
					</div>
				</div>
	<?php }
} 
else {
	echo "<h4>No Ads posted</h4>";
}?>
			</div>
		</div>
	</div>
	<script src="js/main.js"></script>
</body>
</html>