<?php
    require_once 'connect.php';
    session_start();
    $id = $_SESSION['id'];
    
    $result = $db->query("SELECT * FROM four WHERE id='$id'");
    $resultCat = $db->query("SELECT * FROM categories WHERE id='$id'");

    if (isset($_POST['submit'])) {
     
         if(!empty($_POST['recepie'])){
          $recepie = $db->real_escape_string($_POST['recepie']);
          
          $sql = "INSERT INTO four (id, recepie) VALUES ('$id','$recepie')";
          
          if ($db->query($sql) === true) {
              header( "location: notes.php" );
          }
          
          $db->close();
         }
    }
    else if(isset($_GET['recordId'])) {
        
          $id = $db->real_escape_string($_GET['recordId']);
          
          $sql = "DELETE FROM four WHERE postid=$id"; 
         
          if ($db->query($sql) === true) {
              header( "location: notes.php" );
          }
          
          $db->close();
    }
    else if(isset($_POST['update'])){
        
        if(!empty($_POST['recepie'])){
          $count = count($_POST['update']);
          if($count>0){
          for($i=0;$i<$count;$i++){
              $recepie = $db->real_escape_string($_POST['recepie']);
              $sql = "UPDATE four SET recepie='$recepie' WHERE postid='$_POST[update][$i]'";
              if ($db->query($sql) === true) {
                header( "location: notes.php" );
              }
                
              $db->close();
            }
          }
        }
    }
    else if(isset($_POST['postCategory'])){
      
          $count = count($_POST['postCategory']);
          
          if($count>0){
          for($i=0;$i<$count;$i++){
              
              $category = $_POST['nameValue'];
              $sql = "UPDATE four SET category='$category' WHERE postid='$_POST[postCategory][$i]'";
              if ($db->query($sql) === true) {
                header( "location: notes.php" );
              }
                
              $db->close();
            }
          }
    }
    else if (isset($_POST['submitCategory'])) {
         
        if(!empty($_POST['submitCategory'])){
          $catName = $db->real_escape_string($_POST['submitCategory']);
          
          $sql = "INSERT INTO categories (id, name) VALUES ('$id','$catName')";
          
          if ($db->query($sql) === true) {
              header( "location: notes.php" );
          }
          
          $db->close();
         }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Final CS50</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Sedgwick+Ave" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="notes">
<nav id="navNotes" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a id="logoNotes" class="navbar-brand" href="notes.php">Pro Cooking</a>
  <div class="alert alert-error" style="color:#fff; margin:0;">Welcome, <?= $_SESSION['name'] ?>!</div>
  <a id="signOut" href="login.php" class="mybutton">Sign out</a>
</nav>
<div class="box">
  <div class="addButtons">
    <span id="plus">Add a recipe</span>
    <button type="submit" name="newCat" class="addCategory" id="newCat">Add a category</button>
  </div>
  <form class="boxCategory" method="post" enctype="multipart/form-data" autocomplete="off">
      <?php
       while($cat=$resultCat->fetch_assoc()){
         echo "<button class='category' type='submit' name='categorySearch' value='$cat[name]'>$cat[name]</button>";
        }
        
     ?>
 </form>
  <form action="" class="search-form">
      <div class="form-group has-feedback">
      <input type="text" class="form-control search-input" name="search" id="search">
      <span class="fa fa-search form-control-feedback"></span>
    </div>
  </form>
</div>
<form action="notes.php" method="post" enctype="multipart/form-data" autocomplete="off">
<div class="flexBox">
  <?php
  
    if(isset($_POST['categorySearch'])) {
        
        $name = $db->real_escape_string($_POST['categorySearch']);
          
        $result = $db->query("SELECT * FROM four WHERE category='$name' AND id='$id'");
          
        while($user=$result->fetch_assoc()){
        	     echo "<div class='words'>
            <div class='realtext' spellcheck='false' contenteditable>$user[recepie]</div>
            <span  name='$user[category]' class='smallCat firstCatBut'>$user[category]</span>
            <button type='submit' name='update' value='$user[postid]' class='savebutton'><span class='fa fa-floppy-o'></span></button>
            <a href='notes.php?recordId=$user[postid]' class='deletebutton'><span class='fa fa fa-trash-o'></span></a>
          </div>";
	    }
    }
    else {
	   while($user=$result->fetch_assoc()){
	      if(!empty($user[category])){
        	     echo "<div class='words'>
            <div class='realtext' spellcheck='false' contenteditable>$user[recepie]</div>
            <span  name='$user[category]' class='smallCat firstCatBut'>$user[category]</span>
            <button type='submit' name='update' value='$user[postid]' class='savebutton'><span class='fa fa-floppy-o'></span></button>
            <a href='notes.php?recordId=$user[postid]' class='deletebutton'><span class='fa fa fa-trash-o'></span></a>
          </div>";
	      }
	      else {
	          echo "<div class='words'>
            <div class='realtext' spellcheck='false' contenteditable>$user[recepie]</div>
            <span  name='cat' class='smallCat firstCatBut'>Category</span>
            <button type='submit' name='update' value='$user[postid]' class='savebutton'><span class='fa fa-floppy-o'></span></button>
            <a href='notes.php?recordId=$user[postid]' class='deletebutton'><span class='fa fa fa-trash-o'></span></a>
          </div>";
	      }
	   }
     }
	 ?>
	 <textarea id="onlyText" type='text' style='display:none' name='recepie'></textarea>
	 </div>
</form>

<script type="text/javascript" src="script2.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>