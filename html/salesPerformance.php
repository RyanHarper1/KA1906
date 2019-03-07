<?php

   require_once('dbConnection.php');

   session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

   $userId = $_SESSION["who"];


   $sqlScript = "SELECT * FROM sales WHERE userId = '$userId'";

   $results =  mysqli_query($dbConnection, $sqlScript)
   or die (mysqli_error($dbConnection));

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
          body {
          background-color: #223458;
          }
          td {
            border-bottom: 1px solid #ddd;
          padding: 5px;

          }

          th {
           border-bottom: 1px solid #ddd;
           color: white;
           background-color: #347AB6;
           padding: 8px;
           text-align: center;
           height: 50px;
           width: 40%;
           border-radius: 10px;

          }

          tr:nth-child(even){
          background-color: #f2f2f2;
             border-radius: 10px;

          }
          tr:nth-child(odd){
          background-color: #f2f2f2;
             border-radius: 10px;

          }
          .center-table {
           margin-left: auto;
           margin-right: auto;
          }

          table {
          width: 100%;
            text-align: center;
          float: center;

         border-radius: 10px;

          }

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
		 #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
         }
      </style>
   </head>
   <body>
  
         <div id="nav-placeholder">

         </div>
		    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	<br><br>
         <div class="container text-center">
            <h1 style="color: white; font-size:70px"><b>Sales Performance</b></h1>
      </div><br><br>



       <div class="container text-center">
      <p style="float: left; color: white;"><b>These are your purchased scripts:<b></p><br>
        <table>
 	<tr>
 	<th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Total Sold</th>
        <th>Total Earned</th>
	 </tr>
	 <?php
	 while ($row = mysqli_fetch_array($results)) {

          ?>
	 <tr>
	<td>
	   <?php echo $row['script'];?>
	</td>
        <td>
          <?php echo $row["category"];?>
        </td>
        <td>
         <?php echo $row['price'];?>
        </td>
        <td>
          <?php echo $row["paypalemail"];?>
        </td>
        <td>
         <?php echo $row['transactionid'];?>
        </td>
      </tr>
     <?php } ?>
   </table><br><br><br>
 </div>




</body>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</html>