<?php 
// $email = $_POST['email'];
// $password = $_POST['password'];
$conn = new mysqli('localhost', 'root', '', 'alchemist');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// $sql="SELECT * FROM admin WHERE Email='$email' AND Password='$password'";
// $result = $conn->query($sql);
// if(mysqli_num_rows($result) > 0)
// {
// 	echo"hell";
// }
$sql = "SELECT starting_location, destination, fare, timing FROM travel";
$questions = $conn->query($sql);

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
				    	<a class="dropdown-item" href="my_proposals.php">
				    		<i class="fa m-2 fa-file-text fa-lg"></i>   
				    	My Proposal
				    	</a>
				    	<a class="dropdown-item" href="payment.php">
				    		<i class="fa m-2 fa-inr fa-lg"></i>   
				    		Payments
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
		</nav><br>
		<div class="container">
			<div class="m-2 card">
<?php
if ($questions->num_rows > 0) {
	while($question = $questions->fetch_assoc()) {
echo '<div class="m-2 card">';
echo '<div class="card-body">';
echo '<h5 class="card-title">Want to Go!</h5>';
echo '<h6 class="card-subtitle mb-2 text-muted">from ' . $question["starting_location"] . ' to ' . $question["destination"].'</h6><br>';
echo '<button type="button" class="m-1 btn btn-outline-info" disabled>';
echo '<i class="fa fa-inr fa-lg"></i>'.$question["fare"];
echo '</button>';
echo '<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#response_box">';
echo 'Respond';
echo '</button>';
echo '<button type="button" class="m-1 btn btn-outline-success" disabled>';
echo date('g:i A', strtotime($question["timing"]));
echo '</button>';
echo '</div>';
echo '</div>';
	}
}
?>

				<!-- <div class="m-2 card">
					<div class="card-body">
					<h5 class="card-title">Want to Go!</h5>
					<h6 class="card-subtitle mb-2 text-muted">from Bpuram to Baurari</h6><br>
					<button type="button" class="m-1 btn btn-outline-info" disabled>
						<i class="fa fa-inr fa-lg"></i>  20
					</button>
					<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#response_box">
					    Respond
					</button>
					<button type="button" class="m-1 btn btn-outline-success" disabled>4:00 pm</button>
					</div>
				</div> -->
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