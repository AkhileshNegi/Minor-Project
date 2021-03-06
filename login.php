<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/media.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <div class=" container">
    <div class="p-3 my-3 mx-auto w-75 login text-center">
      <div id="changeform">
        <center>
          <h3>Welcome:</h3>
          <h5>Login or</h5> 
          <button type="button" class="btn btn-outline-info" onclick="signup();">Sign up </button>
        </center><br>
        <form action="index.php" method="POST">
          <div class="form-group text-left">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
          </div>
          <div class="form-group text-left">
            <label for="pwd" >Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
          </div>
          <button type="submit" class="m-1 btn btn-success ">Submit</button>
          <button type="reset" class="m-1 btn btn-secondary ">Reset</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
</body>
</html>