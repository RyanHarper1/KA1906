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
      <title>Error Processing your order</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdn.quilljs.com/1.1.3/quill.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
         
      <br>
      <div class="container text-center">
         <h1 style="font-size:70px; color:red;"><b>Error Occured<b></h1>
      </div>

      <div align="center">
        <p style="color:#ffffff;"><b>Your Purchased has been cancelled, please check and try again.</b></p>
      </div>
      <div align="center">
        <button style="background-color: #347AB6; color: white; border: 1px solid #347AB6;" onClick=window.location="http://salesscript.com.au/store.php">Back to Store</button>
      </div>
      <br><br><br><br><br><br><br>
      <br><br>
    
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

    //  var content = root.innerHTML

    function loadQuestion(){

      var formData = new FormData();

      formData.append("questionId", questionId);
      formData.append("scriptId", scriptId);
      formData.append("answerId", answerId);


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var loadResponse = JSON.parse(this.responseText);

              counter = loadResponse.i;
              pitch = loadResponse[0].texts; //load pitch
              document.getElementById("pitch").value= pitch;
              //quill.setText(pitch); //set quill to pitch
              scriptname = loadResponse.scriptName;
              category = loadResponse.category;
              counters++;



              //dynamically create amount of text boxes needed to display answers per pitch
              for (var i = 1; i < counter; i++) {

                questionId = loadResponse[i].nextId;

                $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+i+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+i+'" name="a'+i+'"></div></div> </div>'); //add input box
                document.getElementById("a"+i).value= loadResponse[i].id;

                if (counters <= 1) {
                document.getElementById("s"+i).innerHTML = '<button value="click here" onClick=window.location="http://localhost/preview.php?script='+scriptId+'&question='+questionId+'&price='+price+'&scriptName='+scriptname+'&category='+category+'&createddate='+createddate+'&rating='+rating+'&counters='+counters+'">NEXT PITCH</button>';
                }

            }

          }
      };
      xmlhttp.open("POST", "getQuestion.php", true);
      xmlhttp.send(formData);

    }






</script>





</html>
