<?php
   require_once('dbConnection.php');
   
   session_start();
   
   //check user is logged in
   if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }
   
   $userId = $_SESSION["who"];
   
   
   $sqlScript = "SELECT * FROM script WHERE example = 'Y'";
   
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
         //border-radius: 10px;
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
         }
      </style>
   </head>
   <body>
      <div id="nav-placeholder">
      </div>
      <div class="container text-center">
         <h1 style="color: white; font-size:70px"><b>Example<img src="loggg.JPG" alt="logo" style="width:200px; height:150px;"></b></h1>
      </div>
      <div class="container text-center">
         <h3 style="float: left; color: white;"><b>Browse our free example scripts:<b></h3>
         <br>
         <table>
            <tr>
               <th  style="border-top-left-radius: 10px; border-right: 3px solid #ddd; border-bottom-left-radius: 10px;">Name</th>
               <th  style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">Category</th>
            </tr>
            <?php
               while ($row = mysqli_fetch_array($results)) {
               
                    $scriptname = $row['scriptName'];
                    $scriptid = $row['scriptId'];
                    $firstqn = $row['firstQuestionId'];
                    $category = $row['category'];
                    ?>
            <tr>
               <td>
                  <?php echo '<a href="http://salesscript.com.au/viewScript.php?script=' . $scriptid . '&question=' . $firstqn . '&scriptName=' . $scriptname . '&category=' . 
                 $category . '">' . $scriptname . '</a>';?>
               </td>
               <td>
                  <?php echo $row["category"];?>
               </td>
            </tr>
            <?php } ?>
         </table>
         <br><br><br>
      </div>
   </body>
   <script>
      $(function(){
        $("#nav-placeholder").load("nav.php");
      });
   </script>
</html>