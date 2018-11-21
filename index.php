<?php
session_unset();
session_start(); 
$conn = new mysqli('localhost', 'root', '', 'alchemist');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   	if($_POST){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql="SELECT * FROM user WHERE email='$email' AND password = '$password'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($user = $result->fetch_assoc()) {
			$_SESSION['name'] = $user['first_name']." ".$user['last_name'];
   		}
	}
	else{
		echo"Credentials does not match";
		die();
	}
}
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}
   	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	if (empty($_SESSION["name"])) {?>
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
				</i>
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
			<div class="m-2 card">
<?php
$sql = "SELECT * FROM travel WHERE NOT Posted_by = '$user_name' AND status = 'Active'";
$travels = $conn->query($sql);
if ($travels->num_rows > 0) {
	while($travel = $travels->fetch_assoc()) {?>
				<div class="m-2 card">	
					<div class="card-body want_to_go">	
						<h5 class="card-title First_color"><?php echo $travel["Posted_by"];?> wants to Go</h5>	
						<h6 class="card-subtitle mb-2 Second_color">From <?php echo $travel["starting_location"];?> to <?php echo $travel["destination"]." at ";echo date('g:i A', strtotime($travel["timing"]));?></h6>	
						<h6 class="Third_color">Offering fare: 
							<span class="badge badge-primary money">
								<i class="fa fa-inr fa-lg"></i><?php echo $travel["fare"];?>
							</span>
						</h6>
							<?php
	echo '<input type="button" name="theButton" value="Respond"  class="m-1 btn btn-outline-warning respond" data-travel="'.$travel['fare'].','.$travel['AdID'].','.$user_name.'"data-toggle="modal" data-target="#response_box" />';?>		
					</div>	
				</div>	
<?php
	}
}?>
			</div>
		</div>
	</div>
	<div class="modal" id="response_box">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title First_color">Making an Offer</h4>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<form action="" id="offer">
					<div class="modal-body text-center" id="offer_popup">
						<div class="p-2 mx-auto w-50 fare">
						<h4 class="First_color">Come with me at</h4>
						<i class="fa fa-inr fa-lg text-primary"></i>
						<input type="number" id = "fare" name="fare" class="m-2 w-25 outline-primary" value=""><br>
						<input type="hidden" id = "AdID" name="AdID" class="m-2 w-25 outline-primary" value="">
						<input type="hidden" id = "user_name" name="user_name" class="m-2 w-25 outline-primary" value="">
						<button type="button" class="m-1 btn btn-outline-warning" id="comealong">Make Offer</button>
						<button type="reset" class="m-1 btn btn-outline-secondary">Reset</button>
						</div>
					</div>
				</form>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel Offer</button>
				</div>
			</div>
		</div>
	</div>
<script src="js/main.js"></script>
<script src="js/main_jquery.js"></script>
</body>
</html>