<?php 
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql="SELECT * FROM payments WHERE Posted_BY='$user_name'";
$result = $conn->query($sql);
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
	    <div class="p-3 mx-auto w-75 payment text-center">
	      <table class="table">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Fare</th>
				<th>From</th>
				<th>To</th>
		        <th>Payment Status</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php
		    while($ads = $result->fetch_assoc()) { 
		    	?>
		      <tr>
		        <td><?php echo $ads['Fullfilled_By']; ?></td>
		        <td><?php echo $ads['Accepted_Price']; ?></td>
		        <td><?php echo $ads['Starting_Location']; ?></td>
		        <td><?php echo $ads['Destination']; ?></td> 
				<td>
				<?php
				if($ads['end_payment'] == 'Paid'){?>
					<span class="m-1 text-success">
						Paid
					</span><?php
				}
				else{
				echo '<input type="button" name="theButton" value="Yes!"  class="m-1 btn btn-outline-success user_payment" data-payment="'.$ads['Transaction_No'].'"data-toggle="modal"/>';	?>
					<button type="button" class="m-1 btn btn-outline-secondary">No</button>
				<?php }
				?>
				</td>
		      </tr>      
<?php 
		}?>
			</tbody>
		</table>
	</div>
	<div class="container">
		<div class="modal" id="user_payment_success">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Payment: <?php echo $ads['Fullfilled_By']; ?></h4>
						<button type="button" class="close" data-dismiss="modal"></button>
					</div>
						<div class="modal-body text-center" id="offer_popup">
							
						</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal" id="close_payment_modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="js/main_jquery.js"></script>
</body>
</html>