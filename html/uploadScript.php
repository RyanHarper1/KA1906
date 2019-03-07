<?php
  require_once('dbConnection.php');

  session_start();

  $check = "1.20"; //set mininum value checker variable
  $error = ""; //iniate error variable

  //check user is logged in
  if (!isset($_SESSION["who"])) {
      header('Location: login.php'); //redirect user if not logged in
  }

  //Store variables recieved from currentScript.php
  $scriptname = $_GET["scriptname"];
  $category   = $_GET["category"];
  $scriptID   = $_GET["script"];
  $question   = $_GET["question"];

  //insert script into store if user has pressed submit
  if (isset($_POST["submit"])) {

      //check minimum price is > $1.20 and scriptname & category is set and terms have been agreed to
      if ($_POST["price"] > $check && $_POST["description"] != "" && $_POST["scriptname"] != "" && $_POST["category"] != "" && isset($_POST["terms"])) {

          //store information entered by user into apropriate variables
          $price       = $_POST["price"];
          $description = $_POST["description"];
          $category    = $_POST["category"];
          $scriptName  = $_POST["scriptname"];
          $createdDate = date("d/m/Y H:i:s");
          $scriptID    = $_POST["scriptID"];
          $question    = $_GET["question"];
          $userID      = $_SESSION["who"];

          //insert query to add script to store table
          $sql = "INSERT INTO store (scriptID, userID, price, scriptName, category, uploadDate, question, description) VALUES ('$scriptID', '$userID', '$price', '$scriptName', '$category', '$createdDate', '$question', '$description')";

          mysqli_query($dbConnection, $sql); //execute insert query

          header('Location: currentScripts.php'); //redirect user back to current script upon success

      } else {

          $error = "Ensure All fields are filled in AND Minimum price for script is greater than $1.20"; //display error to user if conditions above are not met

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
        background-color: #223458;
        color: white;
        padding: 25px;
        }
        .form-style-5{
        max-width: 500px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 20px;
        background: #f4f7f8;
        border-radius: 8px;
        font-family: Georgia, "Times New Roman", Times, serif;
        }
        .form-style-5 fieldset{
        border: none;
        }
        .form-style-5 legend {
        font-size: 1.4em;
        margin-bottom: 10px;
        }
        .form-style-5 label {
        display: block;
        margin-bottom: 8px;
        }
        .form-style-5 input[type="text"],
        .form-style-5 input[type="date"],
        .form-style-5 input[type="datetime"],
        .form-style-5 input[type="email"],
        .form-style-5 input[type="number"],
        .form-style-5 input[type="search"],
        .form-style-5 input[type="time"],
        .form-style-5 input[type="url"],
        .form-style-5 textarea,
        .form-style-5 select {
        font-family: Georgia, "Times New Roman", Times, serif;
        background: rgba(255,255,255,.1);
        border: none;
        border-radius: 4px;
        font-size: 16px;
        margin: 0;
        outline: 0;
        padding: 7px;
        width: 100%;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        background-color: #e8eeef;
        color:#8a97a0;
        -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        margin-bottom: 30px;
        }
        .form-style-5 input[type="text"]:focus,
        .form-style-5 input[type="date"]:focus,
        .form-style-5 input[type="datetime"]:focus,
        .form-style-5 input[type="email"]:focus,
        .form-style-5 input[type="number"]:focus,
        .form-style-5 input[type="search"]:focus,
        .form-style-5 input[type="time"]:focus,
        .form-style-5 input[type="url"]:focus,
        .form-style-5 textarea:focus,
        .form-style-5 select:focus{
        background: #d2d9dd;
        }
        .form-style-5 select{
        -webkit-appearance: menulist-button;
        height:35px;
        }
        .form-style-5 .number {
        background: #223458;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255,255,255,0.2);
        border-radius: 15px 15px 15px 0px;
        }
        .form-style-5 input[type="submit"],
        .form-style-5 input[type="button"]
        {
        position: relative;
        display: block;
        padding: 19px 39px 18px 39px;
        color: #FFF;
        margin: 0 auto;
        background: #223458;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        width: 100%;
        border: 1px solid #223458;
        border-width: 1px 1px 3px;
        margin-bottom: 10px;
        }
        .form-style-5 input[type="submit"]:hover,
        .form-style-5 input[type="button"]:hover
        {
        background: #fff;
        color: #223458;
        border: 3px solid #223458;
        }
        body {
        background-color: #223458;
        color: black;
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
        background-color: #f4f7f8;
        border: none;
        color: #223458;
        text-decoration: underline;
        align-content: center;
        }
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }
        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }
        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }
        }
     </style>
  </head>
  <body>
     <div id="nav-placeholder">
     </div>
     <br>
     <div class="container text-center">
        <h1 style="font-size:70px; color:white;"><b>Add<img src="loggg.JPG" alt="logo" style="width:200px; height:200px;">to Store<b></h1>
     </div>
     <br>
     <div class="form-style-5">
        <form method = "post">
           <fieldset>
              <legend><span class="number">1</span>Script Information</legend>
              <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
              <label for="scriptname">Script Name:</label>
              <input type="text" name="scriptname" value="<?php echo htmlentities($scriptname); ?>" placeholder="Script Name *">
              <label for="category">Category:</label>
              <input type="text" name="category" value="<?php echo htmlentities($category); ?>" placeholder="Category *">
              <label for="description">Description:</label>
              <input type="text" name="description" placeholder="Description *">
              <label for="price">Price:</label>
              <input type="text" name="price" placeholder="Min Price $1.20 *">
              <input type="checkbox" name="terms" value="terms"> I agree to Sales Scripts store terms and conditions  <button type="button" id="myBtn">terms and conditions</button><br><br>
              <input type="hidden" name="scriptID" value="<?php echo htmlentities($scriptID); ?>">
              <input type="hidden" name="question" value="<?php echo htmlentities($question); ?>">
           </fieldset>
           <input type="submit" id="submit" name="submit" value="submit" />
        </form>
     </div>
     <footer class="container-fluid text-center">
        <p>Sales Script &copy;</p>
     </footer>
     <!-- The Modal -->
     <div id="myModal" class="modal">
        <div class="modal-content">
           <div class="modal-header">
              <span class="close">&times;</span>
              <h2>TERMS AND CONDITIONS</h2>
           </div>
           <div class="modal-body">
              <p>All scripts have a minimum pricing benchmark of $1.20 which is to cover costs of Paypal and Sales Script. Please see a list of Paypal fees on their website for further details as this pricing includes international rates and varied commissions. Sales Script takes 10% of the total price listed for the script all inclusive with the remainder being transferred into your account. Because of complexities involving the transaction such as settlement funds can take up to a month to be transferred into your account upon purchase. No refunds for purchased scripts will be made available so make sure you give applicable feedback if you are dissatisfied with a script.</p>
           </div>
        </div>
     </div>
  </body>

  <script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
  </script>

  <script type="text/javascript">
      // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

  </script>

  <script type="text/javascript">
     //auto expand textarea
     function adjust_textarea(h) {
         h.style.height = "20px";
         h.style.height = (h.scrollHeight)+"px";
   }
 </script>

 </html>
