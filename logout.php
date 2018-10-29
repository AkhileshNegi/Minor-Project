<?php
session_start();
session_unset($_SESSION["name"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Proposal</title>
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
	<nav class="navbar navbar-expand-sm bg-success navbar-dark p-2">
		<div class="container">
			<a class="navbar-brand" href="index.php"><i class="fa fa-drupal fa-lg"></i></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<div class="dropdown">
					    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
					    	<i class="fa fa-bars fa-lg"></i>
					    </button>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item " href="post_ad.php?name=value1" method="GET">
					    		<i class="fa m-2 fa-pencil fa-lg"></i>   
					    		Post Ad
					    	</a>
					    	<a class="dropdown-item " href="my_ads.php">
					    		<i class="fa m-2 fa-adn fa-lg"></i>   
					    		My Ads
					    	</a>
					    	<a class="dropdown-item " href="my_proposals.php">
					    		<i class="fa m-2 fa-file-text fa-lg"></i>   
					    	My Proposal
					    	</a>
					    	<a class="dropdown-item " href="payment.php">
					    		<i class="fa m-2 fa-inr fa-lg"></i>   
					    		Payments
					    	</a>
					    	<a class="dropdown-item " href="profile.php">
					    		<i class="fa m-2 fa-user-circle-o fa-lg"></i>   
					    		Account
					    	</a>
					    	<a class="dropdown-item " href="logout.php">
					    		<i class="fa m-2 fa-sign-out fa-lg"></i>   
					    		Logout
					    	</a>
					    </div>
					</div>
				</li>
			</ul>
		</div>
	</nav><br>
	<div class="container d-flex mt-3 justify-content-center">
		<div class="w-50 alert text-center border-success" role="alert">
			<h4 class="alert-heading text-center">
			<?php
			echo "You have been Logged Out";
			?>
			</h4>
			<button class="btn btn-outline-success bg-light">
				<a href="login.php" class="text-dark">Login now</a>
			</button>
		</div>
	</div>
	<footer class="bg-light py-3 text-center mt-1">
<!-- 		<span class="text-primary"><i class="fas fa-code"></i> Developed at CodeTrek Tehri 2018</span> -->
	</footer>
</body>
</html>