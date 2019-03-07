<?php

   require_once('dbConnection.php');

  session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

       $sql="SELECT * FROM store";
       $results=mysqli_query($dbConnection,$sql);


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Sales Script</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- font awesome -->
  	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	<!-- rating star css -->
  	<link rel="stylesheet" href="ratingstar.css">  	
        <script src="https://cdn.quilljs.com/1.1.3/quill.js"></script>
        <script src="https://cdn.quilljs.com/1.1.3/quill.min.js"></script>
    
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
               background-color: #347AB6;
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
			#mySearch {
           width: 50%;
           font-size: 18px;
         padding: 11px;
         border:1px solid #ddd;
	     align: right;
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

    <br>
    <div class="container text-center">
        <h1 style="font-size:70px; color:white;"><b>Store<b></h1>
    </div><br><br><br>

    <div class="container1" align="right">
	

      <div class="container1" align="center">
	   <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." >
      <table align="center"  id= "myMenu">
    <tr align="center" colspan="4">

       <th style="border-right: 3px solid #ddd;">Script Name</th>
       <th style="border-right: 3px solid #ddd;">Price</th>
       <th style="border-right: 3px solid #ddd;">Uploaded Date</th>
       <th style="border-right: 3px solid #ddd;">Category</th>
		<th style="border-right: 3px solid #ddd;">Rating</th>
      </tr>
      <?php
       while ($row = mysqli_fetch_array($results)) {
		 $scriptname = $row['scriptName'];
		 $scriptid = $row['scriptID'];
	         $price = $row['price'];
	         $createdDate = $row['uploadDate'];
	         $rating = $row['rating'];
	         $category = $row['category'];
	         $question = $row['question'];
	         $storeid = $row['storeID'];
	         $userid = $row['userID'];
	         
	          
		$sql1 = "SELECT AVG (rating) as rating FROM Rating WHERE scriptID = '$scriptid'";
		$result1=mysqli_query($dbConnection,$sql1);
		$results2 = mysqli_fetch_array($result1);
		
		$rating = $results2["rating"];
	       	
      ?>
      <tr>

       <td style="color: #347AB6; text-decoration: underline; ">
          <?php echo '<a href="preview.php?script=' . $scriptid . '&price=' . $price . '&createddate=' . $createdDate . '&rating=' .$rating . '&category=' . $category . '&scriptName=' . $scriptname . '&storeid=' . $storeid . '&userid=' . $userid . '&question=' . $question . '&counters=0">' . $scriptname . '</a>'; ?>
		  <!--  echo ('<a href="preview.php?sname=' . $scriptname . '">' $scriptname  '</a>') -->
       </td>
       <td>
         <?php echo "$".$row["price"]?>
       </td>
       <td>
         <?php echo $row["uploadDate"]?>
       <td>
         <?php echo $row["category"]?>
       </td>
       <td>
        <?php
        $rating = round($rating);
        					
	if($rating==1){ echo "<i class='fa fa-star' style='color: #FF4500;' ></i>"; }
	if($rating==2){ echo "<i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i>"; }
	if($rating==3){ echo "<i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i>"; }
	if($rating==4){ echo "<i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star' style='color: #FF4500;'></i>"; }
	if($rating==5){ echo "<i class='fa fa-star' style='color: #FF4500;'></i><i class='fa fa-star'style='color: #FF4500;'></i><i class='fa fa-star'style='color: #FF4500;'></i><i class='fa fa-star'style='color: #FF4500;'></i><i class='fa fa-star'style='color: #FF4500;'></i>"; }			
       ?>
       </td>

      </tr>
      <?php } ?>
     </table>
     </div>

   </div>

    </body>
    <footer class="container-fluid text-center" style="height: 50px;">
              <p>Sales Script &copy;</p>
          </footer>
 <script>
	$(function(){
	  $("#nav-placeholder").load("nav.php");
	});
    </script>
	
	<script>
function myFunction() {
    var input, filter, table, tr, th, td, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    tr = document.getElementById("myMenu");
    td = ul.getElementsByTagName("td");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            td[i].style.display = "";
        } else {
            td[i].style.display = "none";
        }
    }
}
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
