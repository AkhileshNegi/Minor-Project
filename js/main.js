function signup(){
	document.getElementById("changeform").innerHTML = signupform();
}
function signupform(){
	var signup ='';
    signup += '<h3>Welcome:</h3>';
    signup += '<h5>Sign up or</h5>';
	signup += '<button type="button" class="btn btn-outline-info" onclick="login();">Log in </button>';
    signup += '</center><br>';

	signup += '<form action="new_registration.php" method="POST">';
	signup += '<div class="row mt-3">';
	signup += '<div class="form-group text-left col-lg-6">';
	signup += '<label for="name">First Name:</label>';
	signup += '<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>';
	signup += '</div>';

	signup += '<div class="form-group text-left col-lg-6">';
	signup += '<label for="name">Last Name:</label>';
	signup += '<input type="text" class="form-control d-inline" id="lname" name="lname" placeholder="Enter Last Name" required>';
	signup += '</div></div>';

	signup += '<div class="form-group text-left">';
	signup += '<label for="name">Sex:</label><br>';
	signup += '<div class="form-check-inline text-left">';
	signup += '<input type="radio" class="form-check-input mr-1" id="radio1" name="optradio" value="male" checked>Male';
	signup += '</div>';
	signup += '<div class="form-check-inline">';
	signup += '<input type="radio" class="form-check-input" id="radio2" name="optradio" value="female">Female';
	signup += '</div>';
	signup += '</div>';

	signup += '<div class="form-group text-left">';
	signup += '<label for="phone" >Phone:</label>';
	signup += '<input type="number" class="form-control" id="phone" name="phone" placeholder="Enter contact number" required>';
	signup += '</div>';

	signup += '<div class="form-group text-left">';
	signup += '<label for="email" >Email:</label>';
	signup += '<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>';
	signup += '</div>';

	signup += '<div class="form-group text-left">';
	signup += '<label for="pwd" >Password:</label>';
	signup += '<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>';
	signup += '</div>';
	signup += '<button type="submit" class="m-1 btn btn-success ">Submit</button>';
	signup += '<button type="reset" class="m-1 btn btn-secondary ">Reset</button>';
	signup += '</form>';
	return signup;
}
function login(){
	document.getElementById("changeform").innerHTML = loginform();
}
function loginform(){
	var login = '';
	login += '<center>';
	login += '<h3>Welcome:</h3>';
	login += '<h5>Login or</h5>';
	login += '<button type="button" class="btn btn-outline-info" onclick="signup();">Sign up </button>';
	login += '</center><br>';
	login += '<form action="index.php" method="POST">';
	login += '<div class="form-group text-left">';
	login += '<label for="email" >Email:</label>';
	login += '<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>';
	login += '</div>';
	login += '<div class="form-group text-left">';
	login += '<label for="pwd" >Password:</label>';
	login += '<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required >';
	login += '</div>';
	login += '<button type="submit" class="m-1 btn btn-success ">Submit</button>';
	login += '<button type="reset" class="m-1 btn btn-secondary ">Reset</button>';
	login += '</form>';
	return login;
}
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}