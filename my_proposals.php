<?php 
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql = "SELECT * FROM travel t1 LEFT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.Offered_by = '$user_name' UNION SELECT * FROM travel t1 RIGHT JOIN proposal t2 ON t1.AdID = t2.AdID WHERE t2.Offered_by = '$user_name'";
$offers = $conn->query($sql);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Proposal</title>
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
		<div class="m-2 card">
<?php	
if ($offers->num_rows > 0) {
	while($offer = $offers->fetch_assoc()) {
		$AdID = $offer['AdID'];
		$sqlstatus = "SELECT * FROM payments WHERE AdID = '$AdID'";
		$status = $conn->query($sqlstatus);
		$payment_status = $status->fetch_assoc();
?>
			<div class="m-2 card">
				<div id="ad1">
					<div class="card-body">
						<h5 class="card-title">Want to Go!</h5>
						<?php echo '<h6 class="m-2 card-subtitle text-muted">from '.$offer["starting_location"].' to '.$offer["destination"].'</h6>';?>
						<h6 class="m-2">Posted By: <span class="badge badge-secondary Posted_by"><?php echo $offer["Posted_by"];?></span></h6>
						<h6 class="m-2">You Proposed: 
							<span class="badge badge-secondary">
								<i class="fa fa-inr fa-lg"></i><?php echo $offer["price"];?>
							</span>
						</h6>
						<?php 
							if($payment_status['end_payment'] == ""){?>
								<button type="button" class="m-1 btn btn-outline-success">
									<?php echo "Active";?>
								</button>
							<?php }
								elseif($payment_status['end_payment'] == "Not Paid"){
										if($payment_status['Fullfilled_By'] == $user_name){?>
											<span class="badge badge-success m-2 p-1">Your Ad is selected. Timing is <?php echo $offer["timing"];?>

											</span><br>
										<?php }
									?>
									<button type="button" class="m-1 btn btn-outline-success">
										<?php echo "In Progress";?>
									</button>
								<?php }
								elseif($payment_status['end_payment'] == "Paid"){?>
							<button type="button" class="m-1 btn btn-outline-warning">
								<?php echo "Fullfilled";?>
							</button>
<?php
							}
	echo '<input type="button" name="theButton" value="Cancel"  class="m-1 btn btn-outline-secondary cancel_my_proposal" data-username="'.$offer['OID'].'" />';?>
					</div>
				</div>
			</div>
<?php
	}
}?>
		</div>
	</div>
	<script src="js/main.js"></script>
	<script src="js/main_jquery.js"></script>
</body>
</html>