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


       if(isset($_POST["showrec"])){
		   $dtfrm = $_POST["fromDate"];
		   $dtto = $_POST["toDate"];
		   
		          $sql="SELECT sales.*, user.username as uname, user.email as email FROM sales, user WHERE sales.userid = user.id AND sales.paidout = 'N' AND sales.refund = 'N' AND (dt BETWEEN '$dtfrm' AND '$dtto') ORDER BY sales.saleid DESC";
		   
	   }else{
       
       $sql="SELECT sales.*, user.username as uname, user.email as email FROM sales, user WHERE sales.userid = user.id AND sales.paidout = 'N' AND sales.refund = 'N' ORDER BY sales.saleid DESC";
	   }
	   
       $results=mysqli_query($dbConnection,$sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Make Payment To Sellers & Refund To Buyers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.coqwdm/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="css_salesscipt.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type= "text/javascript">
jQuery(document).ready(function(){
    jQuery(".datepicker").each(function() {
        jQuery(this).datepicker();
    });
});
    </script>
    <style>
      
      	  
           body {
          background-color: white;
          }
          
          td {
          border-bottom: 9px solid #ddd;
          padding: 5px;

          }

          th {
           border-bottom: 1px solid #ddd;
           color: white;
           background-color: #347AB6;
           padding: 9px;
           text-align: center;
           height: 9px;
           width: 10%;

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
         
         }
      </style>
</head>

<body>

   <div id="nav-placeholder">

        </div>
         
    
        <div class="container text-center">
            <h1 style="color: black; font-size:70px"><b>Refund & Payout</b></h1>
      </div>
                      </br>
                      </br>
                    </br>
                    </div>
            </div>
 <footer>
	
<div align = "left"><fieldset><form method = "post" action = ""><p>From Date: <input type="text" id="fromDate"  name="fromDate" class="datepicker" placeholder="<?php echo date("Y-m-d");  ?>"> To Date: <input type="text" id="toDate" name="toDate" class="datepicker" placeholder="<?php echo date("Y-m-d");  ?>"> &nbsp; &nbsp; <input type = "submit" value="Show Records" name="showrec"></p></form></fieldset></div>
<p>&nbsp;</p>
<div align="right"><button><a href="./payout/MassPay/index.php" target = "_blank">Customers Payout</a></button></div>
<table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>

      <th class="th-sm">Script Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Price
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Category
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">Sold On
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  
      <th class="th-sm">Buyer Username
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Paypal ID
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Buyer Name
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	   <th class="th-sm">Buyer Email
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Seller Username
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
	  <th class="th-sm">Seller Email
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
            <th class="th-sm">Refund
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
    </tr>
  </thead>
  <tbody>
            <?php
			$amt=0;
             while ($row = mysqli_fetch_array($results)) { 
			 $amt=$amt+ $row["price"];
			 ?>
            <tr>
             <td>
                <?php echo $row["script"]; ?>
             </td>
             <td>
                <?php echo $row["price"]; ?>
             </td>
             <td>
                <?php echo $row["category"]; ?>
             </td>
             <td>
               <?php echo $row["datepurchased"]; ?>
             </td>
             <td>
               <?php echo $row["username"]; ?>
             </td>
             <td>
               <?php echo $row["paypalemail"]; ?> <br> <?php echo $row["transactionid"]; ?>
             </td>
             <td>
               <?php echo $row["fname"]." ".$row["lname"]; ?>
             </td>
             <td>
               <?php echo $row["useremail"]; ?>
             </td>
             <td>
               <?php echo $row["uname"]; ?>
             </td>
             <td>
               <?php echo $row["email"]; ?>
             </td>
             <td>
               <a href = "refund/PaymentSettlements/index.php?TID=<?php echo $row["transactionid"]; ?>" target = "_blank">REFUND</a>
             </td>
            </tr>
            <?php } ?>
        </tbody>
</table>
<div align="right"><button><a href="./payout/MassPay/index.php" target = "_blank">Customers Payout</a></button></div>

<p>&nbsp;</p>
<hr>
<b>Total Business:</b> <?php echo $amt; ?>
<hr>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>KS1811 copyrighted</p>
 </footer>
    </body>
<script src="table_creation.js"></script>
<script src="tablecreation.js"></script>

<script>
$(function(){
  $("#nav-placeholder").load("nav.html");
});

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
$(function(){
  $("#nav-placeholder").load("nav.php");
});
</script>

</html>