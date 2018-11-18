<?php
	session_start();
	if (!empty($_SESSION["name"])) {
		$user_name = $_SESSION["name"];
	}
	$con = mysqli_connect("localhost","root","","alchemist");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$starting =$_POST['start_location'];
	$destination =$_POST['destination'];
	$fare =$_POST['fare'];
	$time =$_POST['time'];
	// $use =$_POST['use'];
	$sql = "INSERT INTO travel (starting_location,destination,fare,timing,Posted_by) VALUES ('$starting', '$destination', '$fare', '$time', '$user_name')";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thankyou</title>
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
				<i class="fa fa-drupal fa-lg">
					<span class="Logo">HillCart</span>
				</i>
			</a>
			<ul class="navbar-nav mx-auto">
				<li class="nav-item">
					<a class="nav-link px-3 m-1" href="post_ad.php?name=value1" method="GET">
						<i class="fa fa-pencil fa-lg"></i>
						<span class="navtext">Post Ad</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link px-3 m-1" href="my_ads.php">
						<i class="fa fa-adn fa-lg"></i>
						<span class="navtext">My Ads</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link px-3 m-1" href="my_proposals.php">
						<i class="fa fa-file-text fa-lg"></i>
						<span class="navtext">My Proposal</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link px-3 m-1" href="payment.php">
						<i class="fa fa-inr fa-lg"></i>
						<span class="navtext">Payments</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link px-3 m-1" href="profile.php">
						<i class="fa fa-user-circle-o fa-lg"></i>
						<span class="navtext">Account</span>
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
	</nav><br>
	<div class="container">		
		<div class="container d-flex mt-3 justify-content-center">
		<div class="w-50 alert text-center border-success" role="alert">
			<h4 class="alert-heading text-center">
<?php
if ($con->query($sql) === TRUE) {
echo "Your ad has been published";
} else {
echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>
			</h4>
			<button class="btn btn-outline-success bg-light">
				<a href="index.php" class="text-dark">Go home</a>
			</button>
		</div>
	</div>
	</div>
</body>
</html>