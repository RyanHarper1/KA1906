<?php



   require_once("dbConnection.php");

   
   session_start();


   
   if (isset($_GET['script'], $_GET['rating'])){
     
      $scriptID = $_GET['script'];
     $rating = $_GET['rating']; 

  


    if (in_array($rating,[1, 2, 3, 4, 5])){
	   
     
	    $sql = "INSERT INTO Rating(scriptID, rating) VALUES ('$scriptID' ,'$rating')";
		
	mysqli_query($dbConnection, $sql);
   
            
     }
          header('Location: store.php');
   }
    
?>


