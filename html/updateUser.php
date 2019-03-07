<?php

  session_start();

  require_once('dbConnection.php');

  //check user is logged in
  if (!isset($_SESSION["who"])) {
      header('Location: login.php'); //redirect user if not logged in
  }

  $user = $_SESSION["who"]; //store userId

  if (isset($_POST["update"])) {

      $username  = $_POST['username']; //store username
      $firstname = $_POST['firstname']; //store firstname
      $lastname  = $_POST['lastname']; //store lastname
      $email     = $_POST['email']; //store email
      $password  = $_POST['password']; //store password

      //query to update user table
      $sqlUpdate = "UPDATE user SET username = '$username', firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password'  WHERE id = '$user'";

      mysqli_query($dbConnection, $sqlUpdate) or die('Problem with script query' . mysqli_error()); //execute query

      //update session variables
      $_SESSION['firstname'] = $firstname;
      $_SESSION['email'] = $email;
      $_SESSION['lastname'] = $lastname;
      $_SESSION['username'] = $username;

  }

  //query to get user details
  $sqlScript = "SELECT * FROM user WHERE id = '$user'";
  
  $results = mysqli_query($dbConnection, $sqlScript); //execute and store query results

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sales Script</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         /* Remove the navbar's default margin-bottom and rounded borders */
         .navbar {
         margin-bottom: 0;
         border-radius: 0;
         }
         /* Add a gray background color and some padding to the footer */
         footer {
         background-color: #f2f2f2;
         padding: 25px;
         }
         .dropdown-submenu {
         position: relative;
         }
         .dropdown-submenu>.dropdown-menu {
         top: 0;
         left: 100%;
         margin-top: -6px;
         margin-left: -1px;
         -webkit-border-radius: 0 6px 6px 6px;
         -moz-border-radius: 0 6px 6px;
         border-radius: 0 6px 6px 6px;
         }
         .dropdown-submenu:hover>.dropdown-menu {
         display: block;
         }
         .dropdown-submenu>a:after {
         display: block;
         content: " ";
         float: right;
         width: 0;
         height: 0;
         border-color: transparent;
         border-style: solid;
         border-width: 5px 0 5px 5px;
         border-left-color: #ccc;
         margin-top: 5px;
         margin-right: -10px;
         }
         .dropdown-submenu:hover>a:after {
         border-left-color: #fff;
         }
         .dropdown-submenu.pull-left {
         float: none;
         }
         .dropdown-submenu.pull-left>.dropdown-menu {
         left: -100%;
         margin-left: 10px;
         -webkit-border-radius: 6px 0 6px 6px;
         -moz-border-radius: 6px 0 6px 6px;
         border-radius: 6px 0 6px 6px;
         }
         #txtbox {
         font-size: 10pt;
         height: 100px;
         width : 300px;
         }
         #txtbox1 {
         font-size: 10pt;
         height: 100px;
         width : 500px;
         }
         }
      </style>
   </head>
   <body>

      <div id="nav-placeholder">

      </div>

<div class="jumbotron">
  <div class="container text-center">
    <h1><b>Update Details<b></h1>
  </div>
</div>



<div class="container-fluid bg-3 text-center">

<h4> Update the required details </h4>

<div class="container">


<form method="post" action="updateUser.php" accept-charset='UTF-8'>

  <?php
       while ($row = mysqli_fetch_array($results)) {
    ?>


    <div class="input-group">
      <label for="username"> <b> Username</b> </label> <br>
      <input type="text" name="username" placeholder="username" maxlength="30" value="<?php echo $row['username']; ?>" required autofocus>
    </div> <br> <br>

   <div class="input-group">
     <label for="firstname"> <b> First name </b> </label> <br>
     <input type="text" name="firstname" placeholder="Your first name" maxlength="30" value="<?php echo $row['firstname']; ?>" required autofocus>
   </div> <br> <br>

   <div class="input-group">
     <label for="lastname"> <b> Last name </b> </label> <br>
     <input type="text" name="lastname" placeholder="Your last name" maxlength="30" value="<?php echo $row['lastname']; ?>" required autofocus>
   </div> <br> <br>

   <div class="input-group">
     <label for="email"> <b> Email address </b> </label> <br>
      <input type="text" name="email" placeholder="example@email.com" maxlength="30" value="<?php echo $row['email']; ?>" required autofocus>
   </div> <br> <br>

   <div class="input-group">
     <label for="password"> <b>Current Password </b> </label> <br>
      <input type="password" name="password" placeholder="Enter Current Password" maxlength="30" value="">
   </div> <br> <br>

   <div class="input-group">
     <label for="password2"> <b>New Password</b> </label> <br>
      <input type="password" name="password2" placeholder="At least 8 characters" maxlength="30" value="">
   </div> <br> <br>

   <div class="input-group">
     <label for="password3"> <b>Retype New Password </b> </label> <br>
      <input type="password" name="password3" placeholder="At least 8 characters" maxlength="30" value="">
   </div> <br> <br>


   <div class="input-group">
     <button type="submit" class="btn" name="update">Update</button>
   </div>

 <?php } ?>
</form><br><br><br>



<footer class="container-fluid text-center">
  <p>Sales Script &copy;</p>
</footer>

</body>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>

</html>
