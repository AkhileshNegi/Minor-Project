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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
</head>
<body>
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
		<div class="container">
			<div class="p-5 my-5 mx-auto w-50 new_ad text-center">
				<center>
					<h3>Want to Go:</h3>
				</center>
				<form action="thankyou.php" id="post_ad" method="POST">
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
					</div>
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