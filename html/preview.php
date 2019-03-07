<?php
   require_once('dbConnection.php');

   session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

   //variables required to display script and perform paypal payment
    $scriptid = $_GET['script'];
    $scriptname = $_GET["scriptName"];
    $category = $_GET["category"];
    $uploadDate = $_GET["createddate"];
    $price = $_GET["price"];
    $rating = $_GET["rating"];
    $userid = $_SESSION["who"];
  	$storeid = $_GET["storeid"];
  	$userid = $_GET["userid"];
  	$curuser = $_SESSION["who"];
  	$curusername = $_SESSION["username"];
  	$curuseremail = $_SESSION["email"];
  	$cat = strtoupper($category);
  	$cust = $storeid."|".$scriptid."|".$userid."|".$curuser."|".$cat."|".$curusername."|".$curuseremail;
  	$itmcode = $cat."-".$scriptid;

   //query to determine if a user has bought a script
    $results = mysqli_query($dbConnection,"SELECT * FROM sales WHERE scriptid = '$scriptid' AND userid = '$userid'");
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
      </style>
   </head>
   <body>
      	<div id="nav-placeholder">

         </div>

         <!-- Shopping cart -->
         <?php
            if(isset($_GET['status']) & !empty($_GET['status'])){

        		    if($_GET['status'] == 'success'){
        			       echo "<div class=\"alert alert-success\" role=\"alert\">Item Successfully Added to Cart</div>";
        		   } elseif ($_GET['status'] == 'incart') {
        			      echo "<div class=\"alert alert-info\" role=\"alert\">Item is Already Exists in Cart</div>";
        		   } elseif ($_GET['status'] == 'failed') {
        			      echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to Add item, try to Add Again</div>";
        		}
          }
        ?><br>

      <div class="container text-center">
         <h1 style="font-size:70px; color:white;"><b>Preview<img src="loggg.JPG" alt="logo" style="width:200px; height:200px;"><b></h1>
      </div>

      <div align="center">
         <table align="center" >
            <tr align="center" colspan="6">
               <th>Script Name</th>
               <th>Price</th>
               <th>Upload Date</th>
               <th>Category</th>
               <?php if (mysqli_num_rows($results) == 1){ ?>
               <th>Rating</th>
               <?php } ?>
               <th></th>
            </tr>

            <tr>
               <td>
                  <?php echo $scriptname ?>
               </td>
               <td>
                  <?php echo "$".$price?>
               </td>
               <td>
                  <?php echo $uploadDate?>
               </td>
               <td>
                  <?php echo $category?>
               </td>
                  <?php if (mysqli_num_rows($results) == 1){ ?>
               <td>
          		    <?php foreach(range(1,5)as $rating):?>
          		        <a href="rate.php?script=<?php echo  $scriptid; ?>&rating=<?php echo $rating;?>"><?php echo $rating; ?></a>
          		    <?php endforeach; ?>
	             </td>
	             <?php } ?>
	             <td>
                 <a href="addtocart.php?script=<?php echo $scriptid; ?>" class="btn btn-primary" role="button">Add to Cart</a>
               </td>
            </tr>
         </table>
      </div>
      <br><br><br><br>
      <div id="back">

      </div><br><br>
      <br>
      <!-- ADD TEXT BOX FUNCTION --->
      <div class="container1">
         <div class="row" style="width: 100%;">
            <div class="col-sm-4">
            </div>
         </div>
      </div>
      <br>
      <div class="container-fluid text-center">
      </div>
      <br><br>
      <!-- PITCH FUNCTION -->
      <div class="container-fluid text-center" style="height: 200px; width: 700px;">
      <div class="panel panel-primary" style="box-shadow: 15px 15px black;">
         <div class="panel-heading" style="background-color: #347AB6;"><b>Pitch</b></div>

            <br><br>
             <input style="width:100%; border: none;" type="text" id="pitch" name="pitch" readonly>
             <br><br><br>

      </div>

    	<p>&nbsp;</p>
    	<div align="center">
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
    	<p>&nbsp;</p>

   </body>

   <script>
      $(function(){
        $("#nav-placeholder").load("nav.php");
      });
  </script>

  <script type="text/javascript">

      //variables
      var counter         = 0;
      var ansId           = 0;
      var content         = 0;
      var questionId, scriptId, answerCount, saveResponse, responseText, answerQuestion, nextQn, answerId, pitch, scriptname, category, price, createddate, rating, counters;
      var wrapper         = $(".container1");
      var add_button      = $(".add_form_field");


      $(document).ready(function() {
          var max_fields      = 11;
          var wrapper         = $(".container1");
          var add_button      = $(".add_form_field");

          questionId = getAllUrlParams().question;
          scriptId = getAllUrlParams().script;
          answerId = getAllUrlParams().answerid;
          price = getAllUrlParams().price;
          createddate = getAllUrlParams().createddate;
          rating = getAllUrlParams().rating;
          counters = getAllUrlParams().counters;


          if (questionId != 0){
             loadQuestion();

          }

          var x = 1;

          $(add_button).click(function(e){
              e.preventDefault();
              if(x < max_fields){
                  x++;
                  counter++;
                  ansId++;
                  $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+ansId+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+ansId+'" name="'+ansId+'"></div></div> </div>'); //add input box


              } else {

            alert('You Reached the limits');
          }
          });

          $(wrapper).on("click",".delete", function(e){
              e.preventDefault(); $(this).parent('div').remove(); x--;
          })


      });


    function getAllUrlParams(url) {

      // get query string from url (optional) or window
      var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

      // we'll store the parameters here
      var obj = {};

      // if query string exists
      if (queryString) {

        // stuff after # is not part of query string, so get rid of it
        queryString = queryString.split('#')[0];

        // split our query string into its component parts
        var arr = queryString.split('&');

        for (var i=0; i<arr.length; i++) {
          // separate the keys and the values
          var a = arr[i].split('=');

          // in case params look like: list[]=thing1&list[]=thing2
          var paramNum = undefined;
          var paramName = a[0].replace(/\[\d*\]/, function(v) {
            paramNum = v.slice(1,-1);
            return '';
          });

          // set parameter value (use 'true' if empty)
          var paramValue = typeof(a[1])==='undefined' ? true : a[1];

          // (optional) keep case consistent
          paramName = paramName.toLowerCase();
          paramValue = paramValue.toLowerCase();

          // if parameter name already exists
          if (obj[paramName]) {
            // convert value to array (if still string)
            if (typeof obj[paramName] === 'string') {
              obj[paramName] = [obj[paramName]];
            }
            // if no array index number specified...
            if (typeof paramNum === 'undefined') {
              // put the value on the end of the array
              obj[paramName].push(paramValue);
            }
            // if array index number specified...
            else {
              // put the value at that index number
              obj[paramName][paramNum] = paramValue;
            }
          }
          // if param name doesn't exist yet, set it
          else {
            obj[paramName] = paramValue;
          }
        }
      }

      return obj;
      }


    function loadQuestion(){

      var formData = new FormData();

      //pass variables to getQuestion.php
      formData.append("questionId", questionId);
      formData.append("scriptId", scriptId);
      formData.append("answerId", answerId);


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var loadResponse = JSON.parse(this.responseText);

              counter = loadResponse.i; //number of answers
              pitch = loadResponse[0].texts; //load pitch
              document.getElementById("pitch").value= pitch; //set pitch
              scriptname = loadResponse.scriptName; //scriptname
              category = loadResponse.category; //category
              counters++;

              //dynamically create amount of text boxes needed to display answers per pitch
              for (var i = 1; i < counter; i++) {

                questionId = loadResponse[i].nextId;
                //dynamically create answer textbox
                $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+i+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+i+'" name="a'+i+'" readonly></div></div> </div>'); //add input box
                document.getElementById("a"+i).value= loadResponse[i].id; //display answer

                //let users only see 2 pitches when previewing
                if (counters <= 1) {
                  document.getElementById("s"+i).innerHTML = '<button value="click here" onClick=window.location="http://salesscript.com.au/preview.php?script='+scriptId+'&question='+questionId+'&price='+price+'&scriptName='+scriptname+'&category='+category+'&createddate='+createddate+'&rating='+rating+'&counters='+counters+'">NEXT PITCH</button>';
                //if user is on 2nd pitch, do not let them proceed any further
                } else {
                  document.getElementById("back").innerHTML = '&nbsp&nbsp&nbsp&nbsp<button style="height: 40px; width: 70px; font-size: 18px; border-radius: 4px" value="click here" onClick="history.back();"><b>Back<b></button>';
                }

            }

          }
      };
      xmlhttp.open("POST", "getQuestion.php", true);
      xmlhttp.send(formData);

    }
  </script>

</html>
