<!DOCTYPE html>
<html>
<head>
	<title>My Ads</title>
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
			<div class="m-2 card">
				<div class="m-2 card" id="ad1">
					<div class="card-body">
					<h5 class="card-title">Want to Go!</h5>
					<h6 class="card-subtitle text-muted">from Baghi to Chamba</h6><br>
					<button type="button" class="m-1 btn btn-outline-success" data-toggle="modal" data-target="#see_responses">
					    See responses
					</button>
					<button type="button" class="m-1 btn btn-outline-secondary" onclick="cancel_ad();">cancel</button>
					</div>
				</div>
				<div class="m-2 card" id="ad2">
					<div class="card-body">
					<h5 class="card-title">Want to Go!</h5>
					<h6 class="card-subtitle text-muted">from Baghi to Chamba</h6><br>
					<button type="button" class="m-1 btn btn-outline-success" data-toggle="modal" data-target="#see_responses">
					    See responses
					</button>
					<button type="button" class="m-1 btn btn-outline-secondary" onclick="cancel_ad();">cancel</button>
					</div>
				</div>
				<div class="m-2 card" id="ad3">
					<div class="card-body">
					<h5 class="card-title">Want to Go!</h5>
					<h6 class="card-subtitle text-muted">from Tehri to Chamba</h6><br>
					<button type="button" class="m-1 btn btn-outline-success" data-toggle="modal" data-target="#see_responses">
					    See responses
					</button>
					<button type="button" class="m-1 btn btn-outline-secondary" onclick="cancel_ad();">cancel</button>
				</div>
			</div>
		</div>
	</div>
<div class="modal" id="see_responses">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Responses on your Ad</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
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
				        <td><button type="button" class="btn btn-outline-success">Accept</button></td>
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	<script src="js/main.js"></script>
</body>
</html>