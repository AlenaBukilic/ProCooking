<?php
    require_once 'connect.php';
    session_start();
    $_SESSION['message'] = '';
    
    if (isset($_POST['submit'])) {
    
      $email = $db->real_escape_string($_POST['email']); 
      $result = $db->query("SELECT * FROM users WHERE email='$email'");
      
      if($result->num_rows == 0){
        $_SESSION['message'] = 'User with this email does not exists!';
      }
      else {
        
        $user = $result->fetch_assoc();
        
        if( password_verify($_POST['password'], $user['password']) ) {
          $_SESSION['message'] = 'Success!';
          $_SESSION['name'] = $user['name'];
          $_SESSION['id'] = $user['id'];
          header( "location: notes.php" );
        }
        else {
          $_SESSION['message'] = 'Wrong password, try again!';
        }
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProCooking</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Sedgwick+Ave" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a id="logo" class="navbar-brand" href="index.php">Pro Cooking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="register.php" class="mybutton">Register</a>
    </form>
  </div>
</nav>
<form id="centarLogin" action="login.php" method="post" class="myForm">
  <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
   <h2>Login</h2>
  <div class="form-group">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>