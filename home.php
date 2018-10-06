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
				    	<a class="dropdown-item" href="#">
				    		<i class="fa m-2 fa-pencil fa-lg"></i>   
				    		Post Ad
				    	</a>
				    	<a class="dropdown-item" href="#">
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
		</nav><br>
		<div class="container">
			<div class="m-2 card">
				<div class="card-body">
				<h5 class="card-title">Want to Go!</h5>
				<h6 class="card-subtitle mb-2 text-muted">from Bpuram to Baurari</h6><br>
				<button type="button" class="m-1 btn btn-outline-info">
					<i class="fa fa-inr fa-lg"></i>  20
				</button>
				<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#myModal">
				    Respond
				</button>
				<button type="button" class="m-1 btn btn-outline-success">4:00 pm</button>
				</div>
			</div>
			<div class="m-2 card">
				<div class="card-body">
				<h5 class="card-title">Want to Go!</h5>
				<h6 class="card-subtitle mb-2 text-muted">from Baghi to Chamba</h6><br>
				<button type="button" class="m-1 btn btn-outline-info">
					<i class="fa fa-inr fa-lg"></i>  15
				</button>
				<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#myModal">
				    Respond
				</button>
				<button type="button" class="m-1 btn btn-outline-success">2:00 pm</button>
				</div>
			</div>
			<div class="m-2 card">
				<div class="card-body">
				<h5 class="card-title">Want to Go!</h5>
				<h6 class="card-subtitle mb-2 text-muted">from Tehri to Chamba</h6><br>
				<button type="button" class="m-1 btn btn-outline-info">
					<i class="fa fa-inr fa-lg"></i> 10
				</button>
				<button type="button" class="m-1 btn btn-outline-warning" data-toggle="modal" data-target="#myModal">
				    Respond
				</button>
				<button type="button" class="m-1 btn btn-outline-success">9:00 am</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal text-center" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">I'll Take You!</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="number" name="fair" class="m-2 outline-primary"><br>
					<button type="button" class="m-1 btn btn-outline-success">4:00 pm</button>
					<button type="button" class="m-1 btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				<div class="modal-footer align-items-center">
	        	</div>
			</div>
		</div>
</div>
</body>
</html>