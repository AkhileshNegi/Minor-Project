<?php 
$id = $_GET['AdID'];
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}
$conn = new mysqli('localhost', 'root', '', 'alchemist');
$sql="SELECT * FROM proposal WHERE AdID='$id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>See Responses</title>
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
						<a class="nav-link px-3 m-1" href="usage.php">
							<i class="fa fa-line-chart fa-lg"></i>
							<span class="navtext d-inline d-sm-inline">Usage</span>
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
					    	<a class="dropdown-item " href="profile.php">
								<i class="fa m-2 fa-user fa-lg"></i>
								My Profile
							</a>
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
	<div class="container w-75">
		<table class="table">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Fare</th>
		        <th>Respond</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php
		    while($ads = $result->fetch_assoc()) { 
		    	?>
		      <tr>
		        <td><?php echo $ads['Offered_by']; ?></td>
		        <td><?php echo $ads['price']; ?></td>
		        <td>
<?php
echo '<input type="button" name="theButton" value="Accept"  class="m-1 btn btn-outline-success proposal_acceptance" data-ads="'.$ads['price'].','.$ads['AdID'].','.$ads['Offered_by'].'"data-toggle="modal" data-target="#accept_responses" />';
?>				
		        </td>
		      </tr>      
<?php 
		}?>
			</tbody>
		</table>
	</div>
	<div class="modal" id="accept_responses">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title ">Confirming!</h4>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body text-center">
					<div class="p-2 mx-auto w-50 fare">
						<h6>Send a notification to take you?</h6>
						<input type="hidden" id = "fare" name="fare" class="m-2 w-25 outline-primary" value=""><br>
						<input type="hidden" id = "AdID" name="AdID" class="m-2 w-25 outline-primary" value="">
						<input type="hidden" id = "Offered_by" name="Offered_by" class="m-2 w-25 outline-primary" value="">
						<button type="button" class="m-1 btn btn-outline-success" id="takeme">Yes !</button>
						<button type="button" class="m-1 btn btn-outline-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
				<div class="modal-footer">
	        	</div>
			</div>
		</div>
	</div>
</div>
	<script src="js/main.js"></script>
	<script src="js/main_jquery.js"></script>
</body>
</html>