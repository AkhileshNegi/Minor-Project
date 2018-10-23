<?php 
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
	    while($row = $result->fetch_assoc()) {
		session_unset();
		session_start();
		$_SESSION["name"] = $row['first_name']." ".$row['last_name'];
   		}
	$sql = "SELECT starting_location, destination, fare, timing FROM travel";
	$travels = $conn->query($sql);
   	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
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
	<div class="container">
		<nav class="navbar navbar-expand-sm bg-success navbar-dark">
		 	<a class="navbar-brand" href="index.php"><i class="fa fa-drupal fa-lg"></i></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
				  <div class="dropdown">
				    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
				    <i class="fa fa-bars fa-lg"></i>
				    </button>
				    <div class="dropdown-menu">
				    	<a class="dropdown-item" href="post_ad.php?name=value1" method="GET">
				    		<i class="fa m-2 fa-pencil fa-lg"></i>   
				    		Post Ad
				    	</a>
				    	<a class="dropdown-item" href="my_ads.php">
				    		<i class="fa m-2 fa-adn fa-lg"></i>   
				    		My Ads
				    	</a>
				    	<a class="dropdown-item" href="my_proposals.php">
				    		<i class="fa m-2 fa-file-text fa-lg"></i>   
				    	My Proposal
				    	</a>
				    	<a class="dropdown-item" href="payment.php">
				    		<i class="fa m-2 fa-inr fa-lg"></i>   
				    		Payments
				    	</a>
				    	<a class="dropdown-item" href="profile.php">
				    		<i class="fa m-2 fa-user-circle-o fa-lg"></i>   
				    		Account
				    	</a>
				    	<a class="dropdown-item" href="login.html">
				    		<i class="fa m-2 fa-sign-out fa-lg"></i>   
				    		Logout
				    	</a>
				    	<a>
				    		<p class='text-primary text-center'>
				    			<?php echo "Logged in as ".$_SESSION["name"];?>
				    		</p>
				    	</a>
				    </div>
				  </div>
				</li>
			</ul>
		</nav><br>
		<div class="container">
			<div class="m-2 card">
<?php
if ($travels->num_rows > 0) {
	while($travel = $travels->fetch_assoc()) {?>
				<div class="m-2 card">	
					<div class="card-body">	
						<h5 class="card-title">Want to Go!</h5>	
						<h6 class="card-subtitle mb-2 text-muted">from <?php echo $travel["starting_location"];?> to <?php echo $travel["destination"];?></h6><br>	
						<button type="button" class="m-1 btn btn-outline-info" disabled>	
							<i class="fa fa-inr fa-lg"></i> 
							<?php echo $travel["fare"];?>	
						</button>	
						<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#response_box">	
							Respond	
						</button>	
						<button type="button" class="m-1 btn btn-outline-success" disabled>
							<?php echo date('g:i A', strtotime($travel["timing"]));?>
						</button>	
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
					<h4 class="modal-title">I'll Take You</h4>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<form action="offer_made.php">
					<div class="modal-body text-center">
						<div class="p-2 mx-auto w-50 fare">
						<h4 >Fair</h4>
						<i class="fa fa-inr fa-lg text-primary"></i>
						<input type="number" name="fair" class="m-2 w-25 outline-primary" value="20" min="20"><br>
						<button type="submit" class="m-1 btn btn-outline-success">Come Along</button>
						<button type="reset" class="m-1 btn btn-outline-secondary">Reset</button>
						</div>
					</div>
				</form>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<script src="js/main.js"></script>
</body>
</html>
<?php
   	}
}
else{
	die("incorrect password or user name");
}