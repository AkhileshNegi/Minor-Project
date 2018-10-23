<?php 
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}?>
<!DOCTYPE html>
<html>
<head>
	<title>See Responses</title>
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
		<table class="table">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Fare</th>
		        <th>Respond</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>Akash</td>
		        <td>20</td>
		        <td>
					<button type="button" class="m-1 btn btn-outline-success" data-toggle="modal" data-target="#accept_responses">
			    	Accept
					</button>
		        </td>
		      </tr>      
		      <tr>
		        <td>Rajat</td>
		        <td>25</td>
		        <td><button type="button" class="btn btn-outline-success">Accept</button></td>
		      </tr>      
		      <tr>
		        <td>Parth</td>
		        <td>20</td>
		        <td><button type="button" class="btn btn-outline-success">Accept</button>
		        </td>
		      </tr>
			</tbody>
		</table>
	</div>
	<div class="modal" id="accept_responses">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title ">I'll Go with You!</h4>
					<button type="button" class="close" data-dismiss="modal"></button>
				</div>
				<div class="modal-body text-center">
					<div class="p-2 mx-auto w-50 fare">
						<h4 >Fair</h4>
						<i class="fa fa-inr fa-lg text-primary"></i>
						<input type="number" name="fair" class="m-2 w-25 outline-primary" value="20"><br>
						<button type="button" class="m-1 btn btn-outline-success">Take Me</button>
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
</body>
</html>