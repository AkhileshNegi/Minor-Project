function signup(){
	document.getElementById("changeform").innerHTML = signupform();
}
function signupform(){
	var signup ='';

    signup += '<h3>Welcome:</h3>';
    signup += '<h5>Sign up or</h5>';
	signup += '<button type="button" class="btn btn-outline-info" onclick="login();">Log in </button>';
    signup += '</center><br>';

	signup += '<div class="form-group text-left">';
	signup += '<label for="first_name">First Name:</label>'
	signup += '<input type="text" class="form-control" id="fname">'
	signup += '</div>'

	signup += '<div class="form-group text-left">';
	signup += '<label for="last_name">Last Name:</label>'
	signup += '<input type="text" class="form-control" id="lname">'
	signup += '</div>'

	signup += '<form action="home.php">';
	signup += '<div class="form-group text-left">';
	signup += '<label for="email" >Email:</label>'
	signup += '<input type="text" class="form-control" id="email">'
	signup += '</div>'

	signup += '<div class="form-group text-left">'
	signup += '<label for="pwd" >Password:</label>'
	signup += '<input type="password" class="form-control" id="password">'
	signup += '</div>'
	signup += '<button type="submit" class="btn btn-primary center-block">Submit</button>'
	signup += '</form>'
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
	login += '<form action="home.php">';
	login += '<div class="form-group text-left">';
	login += '<label for="email" >Email:</label>';
	login += '<input type="text" class="form-control" id="email">';
	login += '</div>';
	login += '<div class="form-group text-left">'
	login += '<label for="pwd" >Password:</label>';
	login += '<input type="password" class="form-control" id="password">';
	login += '</div>';
	login += '<button type="submit" class="btn btn-primary center-block">Submit</button>'
	login += '</form>';
	
	return login;
}