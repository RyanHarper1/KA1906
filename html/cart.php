<?php

   require_once('dbConnection.php');

 session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
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
        <script src="https://cdn.quilljs.com/1.1.3/quill.js"></script>
        <script src="https://cdn.quilljs.com/1.1.3/quill.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://cdn.quilljs.com/1.1.3/quill.snow.css" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.1.3/quill.bubble.css" rel="stylesheet">
        <link href="app.css" rel="stylesheet" type="text/css">



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

             body {
               background-color: #223458;
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
			 td {
    border-bottom: 1px solid #ddd;
	padding: 5px;
}

th {
   border-bottom: 1px solid #ddd;
   color: white;
   background-color: #009900;
   text-align: center;
   padding: 8px;

}

tr{
	background-color: #f2f2f2

}
.center-table {
   margin-left: auto;
   margin-right: auto;
}


table {
	width: 100%;
    text-align: center;
	float: left;
	border-collapse: collapse;
}




             }
        </style>
    </head>

    <body>

        <div id="nav-placeholder">

         </div>


            <br>
<div class="container">
<?php
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>Script Number</th>
                        <th>Item Name</th>
	  		<th>Price of Script</th>
	  		<th>Remove Script</th>
	  		<th>Pay Now</th>
	  	</tr>
		<?php
		$total = '';
		$i=0;
		 foreach ($cartitems as $key=>$scriptid) {

			$sql = "SELECT * FROM store WHERE scriptID = $key";
			$res=mysqli_query($dbConnection, $sql);
			$r = mysqli_fetch_assoc($res);
		?>	
	  	<tr>
	  		<td><?php echo $i; ?></td>
        <td><?php echo $r['scriptName']; ?> </td>
        <td>$<?php echo $r['price']; ?></td>
	  		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['name']; ?></td>
	  		<td><div align="center">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="F4W8JQWMVEK6A">
	<input type="hidden" name="item_name" value="<?php echo $scriptname ?>">
	<input type="hidden" name="item_number" value="<?php echo $itmcode ?>">
	<input type="hidden" name="amount" value="<?php echo $price ?>">
	<input type="hidden" name="custom" value="<?php echo $cust ?>">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="return" value="http://salesscript.com.au/thankyou.php" />
	<input type="hidden" name="cancel_return" value="http://salesscript.com.au/cancel.php" />
	<input type="hidden" name="notify_url" value="http://salesscript.com.au/ipn.php" />
	<input type="hidden" name="currency_code" value="AUD">
	<input type="hidden" name="landing_page" value="billing">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" id = "Image8" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	</form>
	</div> 
	</td>

	  	</tr>
		<?php
			$total = $total + $r['price'];
			$i++;
			}
		?>
		<tr>
			<td><strong>Total Price</strong></td>
			<td></td>
      <td><strong>$<?php echo $total; ?></strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
			<td><div align="center">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="F4W8JQWMVEK6A">
	<input type="hidden" name="item_name" value="<?php echo $scriptname ?>">
	<input type="hidden" name="item_number" value="<?php echo $itmcode ?>">
	<input type="hidden" name="amount" value="<?php echo $price ?>">
	<input type="hidden" name="custom" value="<?php echo $cust ?>">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="return" value="http://salesscript.com.au/thankyou.php" />
	<input type="hidden" name="cancel_return" value="http://salesscript.com.au/cancel.php" />
	<input type="hidden" name="notify_url" value="http://salesscript.com.au/ipn.php" />
	<input type="hidden" name="currency_code" value="AUD">
	<input type="hidden" name="landing_page" value="billing">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" id = "Image8" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	</form>
	</div> 
	</td>

		</tr>
	  </table>

	</div>

</div>

<footer class="container-fluid text-center">
    <p>Sales Script &copy;</p>
</footer>




</body>

<script>
$(function(){
  $("#nav-placeholder").load("nav.php");
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




</html>
