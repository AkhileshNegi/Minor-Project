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
				    	<a class="dropdown-item" href="logout.php">
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
				</li>
			</ul>
		</nav><br>
	    <div class="p-5 my-5 mx-auto w-75 payment text-center">
	      <table class="table">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Fare</th>
				<th>From</th>
				<th>To</th>
		        <th>Make Payment</th>
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
					<button type="button" class="m-1 btn btn-outline-success" id="user_payment">Yes!</button>
					<button type="button" class="m-1 btn btn-outline-secondary">No</button>
				</td>
		      </tr>      
<?php 
		}?>
			</tbody>
		</table>
	</div>
	<div id="user_payment_success" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Payment Success</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
	<script src="js/main_jquery.js"></script>
</body>
</html>