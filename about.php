<?php
  require_once 'connect.php';
  session_start();

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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="login.php" class="mybutton">Login</a>
      <a href="register.php" class="mybutton">Register</a>
    </form>
  </div>
</nav>
<div id="center" class="myForm jumbotron myText">
  <img src="alena2.gif" alt="image of alena">
  <h3 class="display-3">Hello!</h3>    
  <p>My name is Alena and I'm a self-taught web developer from Belgrade, Serbia. I started learning to code six months ago and I absolutely loved it, now that is pretty much all I do and soon enough I hope to start doing it professionally.</p>
  <br>
  <p>This app is my Harvard CS50 final project and it's done using HTML, CSS, Bootstrap, JavaScript(ES6), PHP and MySQL. The idea originated from my love towards cooking, especially making one very special Serbian dish called Sarma! Although I'm never telling my secret recipe for Sarma, I would like to give the opportunity to everyone to store their favorite recipes in this simple note-taking app. Create your own categories, label your recipes and browse through them anytime.</p> 
  <p>Hopefully this app will make cooking, even more, fun!</p>
  <div>
    <span class="fa fa-linkedin social"><a href="https://www.linkedin.com/in/alena-bukilic-7b2a3928/"></a></span>
    <span class="fa fa-github social"><a href="https://github.com/AlenaBukilic"></a></span>
    <span class="fa fa-codepen social"><a href="https://codepen.io/alenabukilic/"></a></span>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>