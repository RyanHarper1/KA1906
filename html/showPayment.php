<?php
     require_once('dbConnection.php');

   session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

   $userId = $_SESSION["who"];

if($userId != 2){
header('Location: login.php'); //redirect user if not logged in
}

       




		$sql="SELECT * FROM store";
       $results=mysqli_query($dbConnection,$sql);
       
       
       $sql="SELECT * FROM sales";
       $presults=mysqli_query($dbConnection,$sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sales Script</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.coqwdm/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="css_salesscipt.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
      
      	  
           body {
          background-color: white;
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
      </style>
</head>

<body>

   <div id="nav-placeholder">

        </div>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
         
    
        <div class="container text-center">
            <h1 style="color: black; font-size:70px"><b>Payments</b></h1>
      </div>
                      </br>
                      </br>
                    </br>
                    </div>
            </div>
 <footer>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Store ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">User ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Script ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Script Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Price
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Upload Date
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Category
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Rating
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Question
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Description
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
             while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
             <td>
                <?php echo $row["storeID"]?>
             </td>
             <td>
                <?php echo $row["userID"]?>
             </td>
             <td>
                <?php echo $row["scriptID"]?>
             </td>
             <td>
               <?php echo $row["scriptName"]?>
             </td>
             <td>
               <?php echo $row["price"]?>
             </td>
             <td>
               <?php echo $row["uploadDate"]?>
             </td>
             <td>
               <?php echo $row["category"]?>
             </td>
             <td>
               <?php echo $row["rating"]?>
             </td>
             <td>
               <?php echo $row["question"]?>
             </td>
             <td>
               <?php echo $row["description"]?>
             </td>


            </tr>
            <?php } ?>
        </tbody>
  <tfoot>
    <tr>
      <th>Store ID
      </th>
      <th>User ID
      </th>
      <th>Script ID
      </th>
      <th>Script Name
      </th>
      <th>Price
      </th>
      <th>Upload Date
      </th>
      <th>Category
      </th>
      <th>Rating 
      </th>
      <th>Question
      </th>
      <th>Description
      </th>
    </tr>
  </tfoot>
</table>
<br>
<br>
<br>
<br>	

<form action="showPayment.php" method="POST">
<div class="year_dropdown" >
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Year of Payment
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-2018" href="#">2018</a></li>
    <li><a class="dropdown-2019" href="#">2019</a></li>
    <li><a class="dropdown-2020" href="#">2020</a></li>
    <li><a class="dropdown-2021" href="#">2021</a></li>
    </ul>
  </div>
</div>
<br>
<br>
<br>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Months of the Year
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a class="dropdown-jan" href="#">January</a></li>
    <li><a class="dropdown-feb" href="#">February</a></li>
    <li><a class="dropdown-mar" href="#">March</a></li>
	<li><a class="dropdown-apr" href="#">April</a></li>
    <li><a class="dropdown-may" href="#">May</a></li>
    <li><a class="dropdown-jun" href="#">June</a></li>
	<li><a class="dropdown-jul" href="#">July</a></li>
    <li><a class="dropdown-aug" href="#">August</a></li>
    <li><a class="dropdown-sep" href="#">September</a></li>
	<li><a class="dropdown-oct" href="#">October</a></li>
    <li><a class="dropdown-nov" href="#">November</a></li>
    <li><a class="dropdown-dec" href="#">December</a></li>
    </ul>
  </div>
<br>
</form>

<table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Item ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Script ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Script Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Price
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Category
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Created date of Script
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  
      <th class="th-sm">UserName
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Paypal Email
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Name of Customer
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	   <th class="th-sm">Address
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Phone Number
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Email Address
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
             while ($row = mysqli_fetch_array($presults)) { ?>
            <tr>
             <td>
                <?php echo $row["saleid"]?>
             </td>
             <td>
                <?php echo $row["scriptid"]?>
             </td>
             <td>
                <?php echo $row["script"]?>
             </td>
             <td>
               <?php echo $row["price"]?>
             </td>
             <td>
               <?php echo $row["category"]?>
             </td>
             <td>
               <?php echo $row["datepurchased"]?>
             </td>
             <td>
               <?php echo $row["username"]?>
             </td>
             <td>
               <?php echo $row["paypalemail"]?>
             </td>
             <td>
               <?php echo $row["fname"]." ".$row["lname"] ?>
             </td>
             <td>
               <?php echo $row["address"]." , ".$row["city"]." , ".$row["state"]." - ".$row["zip"]." , ".$row["country"]; ?>
             </td>
             <td>
               <?php echo $row["phone"]?>
             </td>
             <td>
               <?php echo $row["useremail"]?>
             </td>
            </tr>
            <?php } ?>
        </tbody>
  <tfoot>
    <tr>
      <th>Item ID
      </th>
      <th>Script ID
      </th>
      <th>Script Name
      </th>
      <th>Price
      </th>
	  <th>Category
      </th>
      <th>Created date of Script
      </th>
      <th>UserName
      </th>
	  <th>Paypal Email
      </th>
	  <th>Name of Customer
      </th>
	  <th>Address
      </th>
	  <th>Phone Number
      </th>
	  <th>Email Address
      </th>
    </tr>
  </tfoot>
</table>

            <?php
             while ($row = mysqli_fetch_array($sumresults)) { ?>
             Price for the selected month:<br><input type="text" name="price_month"><br><?php echo $row["price"]?>
             <input type="checkbox" name="check_paid" id="check_paid" value="yes" <?php echo ($dbvalue['check_paid']==1 ? 'checked' : '');?>
			 /* for($m=1; $m<=12; ++$m){
			 echo date('F', mktime(0, 0, 0, $m, 1)).'<br>'; } */
			<?php } ?>
<br>
<br>
<br>
	<button>Pay the Customer now</button>
<br>
<br>
<br>
<br>
<br>
<div id="paypal-button-container"></div>
<br>
<br>
<br>
<br>

<p>KS1811 copyrighted</p>
 </footer>
    </body>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="table_creation.js"></script>
<script src="tablecreation.js"></script>

<script>
$(function(){
  $("#nav-placeholder").load("nav.html");
});
</script>

<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'buynow',
            fundingicons: true, // optional
            branding: true, // optional
            size:  'small', // small | medium | large | responsive
            shape: 'rect',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
		client: {
            sandbox: 'AYdg8ytDD8EBsQVIdoFAx4I57xKkIeqY2yUBAzvrvQ2-nO8wdaumof7_flpvOeG9knN1arin1zrt2GMR',
            production: '<AY6T1wp_3WeqFPfPQm_fmsPZdBsFRE-MmkNLUd94TpViGX4FUNRlSGllj4YrK832QniqPED2kFKotEIW>'
        },

        // Show the buyer a 'Pay Now' button in the checkout flow
        commit: true,

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [
                    {
                        amount: { total: '0.01', currency: 'AUD' }
                    }
                ]
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
<script>
$(document).ready(function() {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script>
$(document).ready(function() {
  $('#table').DataTable();
  $('.dataTables_length').addClass('bs-select');
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
<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>
</html>