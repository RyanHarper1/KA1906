<?php



   require_once('dbConnection.php');

   session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

    $scriptid = $_GET['sname'];
   



   $sql=("SELECT * FROM store WHERE scriptID='".$scriptid ."'");


            $results=mysqli_query($dbConnection,$sql);
           
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
         <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
            <div class="container text-center">
                <h1 style="font-size:70px; color:white;"><b>Rating<b></h1>
            </div><br><br><br>

            <div class="container1" align="center">
            <table align="center" >
          <tr align="center" colspan="4"> 
             
             <th>Script Name</th>
             
			 <th>Rating
			 
			 </th>
			 
            </tr>
				  <?php

            while ($row = mysqli_fetch_array($results)) {
            



        ?>
          <tr>

		      <td>
			 
			    <?php echo $row["scriptName"]?>
                
			  
             </td>
           
			 <td>
                   <?php foreach(range(1,5)as $rating):?>
				    <a href="rate.php?sname=<?php echo  $scriptid; ?>&rating=<?php echo $rating;?>"><?php echo $rating; ?></a>
				   <?php endforeach; ?>
             </td>

            </tr>
        <?php

            }

        ?>
	
           </table>
   </div>

                <footer class="container-fluid text-center">
                    <p>Sales Script &copy;</p>
                </footer>




    </body>

<script>
$(function(){
  $("#nav-placeholder").load("nav.html");
});
</script>


</html>