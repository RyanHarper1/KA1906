<?php
   require_once('dbConnection.php');

   session_start();

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
	    <img src="logo.JPG" alt="logo" style="width:700px; height:250px;">
	
	     <?php if(!isset($_SESSION['who'])) {?>
	    <h2><b>Welcome to sales Script! </b></h2>
	  <?php } else { ?>
	    <h2><b> Welcome, <?php echo $_SESSION['firstname']; ?>! </b></h2>
	  <?php } ?>
	  </div>
	</div>
	
	<div class="container-fluid bg-3 text-center">
	
	</div><br>
</body>
<footer class="container-fluid text-center">
	<p>Sales Script &copy;</p>
</footer>
<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>
</html>
