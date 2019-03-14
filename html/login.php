<?php

    $error = " "; //initialize error message

    //When user selects submit
    if (isset($_POST["submit"])){

      //connect to database
		  require_once('dbConnection.php');

			//securely store entered username and password, to stop inception occruing
			$username = mysqli_real_escape_string($dbConnection, $_POST['email']);
			$password = mysqli_real_escape_string($dbConnection, $_POST['password']);

			//select user information for database
			$sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password'";

			$results =  mysqli_query($dbConnection, $sql)
			or die (mysqli_error($dbConnection));

			$numrows = mysqli_num_rows($results);

			//if entered email and password matches a record in the DB
			if ( $numrows == 1 ) {

				session_start();
				//fetch the record
				$user = mysqli_fetch_assoc($results);
				//log user onto website
				$_SESSION["who"] = $user['id'];
			        $_SESSION["username"] = $user['username'];
			        $_SESSION["firstname"] = $user['firstname'];
			        $_SESSION["lastname"] = $user['lastname'];
			        $_SESSION['email'] = $user['email'];
			        $_SESSION['admin'] = $user['admin'];

				header('Location: home.php'); //redirect user to home page as they are logged in

        //If User log in details are incorrect
			} else {
			   //redirect to login page if login credentials are incorrect
			   $error = "Your Login Name or Password is invalid";
			}
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sales Script</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <h1><b>Sales Script</b></h1>
    <h2><b>Welcome to sales Script</b> </h2>
  </div>
</div>

<div class="container">

<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

<form action = "" method = "post">
<label for="email">Email address:</label> <br>
<input type="text" id="email" name="email"><br><br>

<label for="password">Password:</label> <br>
<input type="password" id="password" name="password"><br><br><br>
<input type="submit" id="submit" name="submit" value="Login"><br>
</form><br><br><br><br>


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
