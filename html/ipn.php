<?php
require_once('dbConnection.php');
//collect and store all data sent from paypal after a transaction
	
	  $utxnid = $_REQUEST['txn_id'];  //PayPal Transaction ID
	  $ucurrency = $_REQUEST['mc_currency']; //PayPal Currency Code
	  $ustatus = $_REQUEST['payment_status'];    //PayPal Payment Status
	  $ids = explode('|', $_REQUEST['custom']); // Split up our string by '|'
	  $storeid = $ids[0];
	  $scriptid = $ids[1]; 
	  $userid = $ids[2]; 
	  $curuser = $ids[3];
	  $cat = $ids[4];
	  $curusername = $ids[5];
	  $curuseremail = $ids[6];
	  $uemail = $_REQUEST['payer_email']; // Email Address of PayPal User who made payment
	  $ufname = $_REQUEST['first_name']; // First Name of PayPal User who made payment
	  $ulname = $_REQUEST['last_name'];  // Last Name of PayPal User who made payment
	  $uaddress = $_REQUEST['address_street']; 
	  $ucity = $_REQUEST['address_city'];
	  $ustate = $_REQUEST['address_state'];
	  $uzip = $_REQUEST['address_zip'];
	  $ucountry = $_REQUEST['address_country'];
	  $uphone = $_REQUEST['address_phone'];
	  $uamount = $_REQUEST['mc_gross']; // Amount Paid
	  $item_number = $_REQUEST['item_number'];  // Item Code we sold 
          $item_name = $_REQUEST['item_name'];   // Item name we sold 
	  $date_format = date("l jS \of F Y h:i:s A");
    $dt = date("Y-m-d");


	  
	  if( ($ustatus == 'Completed') && (isset($utxnid)) && ($ucurrency == 'AUD') && ($ids !="") ) {
		  
		  // Add To Database
		  
		    $sqlPurchase = "INSERT INTO sales (scriptid, userid, curuserid, storeid, username, useremail, script, transactionid, category, price, paypalemail, fname, lname, address, city, state, zip, country, phone,  dt, datephp, paymentstatus) VALUES ($scriptid, $userid, $curuser, $storeid, '$curusername', '$curuseremail', '$item_name', '$utxnid', '$cat', $uamount, '$uemail', '$ufname', '$ulname', '$uaddress', '$ucity', '$ustate', '$uzip', '$ucountry', '$uphone', '$dt', '$date_format', '$ustatus')";
    		mysqli_query($dbConnection, $sqlPurchase);
			
			// Update To Database
			$sqlUpdateScript = "UPDATE script set purchased = 'Y', userId = '$curuser' WHERE scriptId = '$scriptid' ";
			mysqli_query($dbConnection, $sqlUpdateScript);
			
			
			//Send Email Notification
			$to = $uemail;  
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
			$headers .= 'To:'.$ufname.' '.$ulname.'<'.$uemail.','.$curuseremail.'>' . "\r\n";
			$headers .= 'From: Sale Script <info@salesscript.com.au>' . "\r\n";
			$headers .= 'CC: Sale Script <avishkagajanayake@hotmail.com>' . "\r\n";	
			$headers .= 'BCC: Sale Script <info@wewebweavers.com>' . "\r\n";		  
			$notify_subject = "Your Purchase Receipt -"." ".$utxnid." ";
			$notify_body =  "<b>Hi</b><br>".
							"<br>This mail is to notify you that you have purchased $item_name from SaleScript.com.au.<br>".
							"<br>Script Information<br>".
							"<br><b>Script Name:</b> $item_name<br>".
							"<br><b>Script Category:</b> $cat<br>".
							"<br><br><br><br>".
							"<br>Transaction Information<br>".
							"<br><b>Purchase ID: </b> $utxnid<br>".
							"<br><b>Customer Name: </b> $ufname $ulname<br>".
							"<br><b>Email: </b> $uemail<br>".				
							"<br><br><br>Best Regards".
							"<br>Sale Script";	  	  
			                                mail($to, $notify_subject, $notify_body, $headers);				
	  }else{
	 	
	 }
?>