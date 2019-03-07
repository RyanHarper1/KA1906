<?php
  require_once('dbConnection.php');

  session_start();

 //check user is logged in
 if (!isset($_SESSION["who"])){
   header('Location: login.php'); //redirect user if not logged in
 }

 $question = $_GET["question"]; //questionId
 $scriptName = $_GET["scriptName"]; //script name
 $scriptId = $_GET["script"]; //script id
 $category = $_GET["category"]; //category
 $button = 0;

 //obtain id of current question
 $results = mysqli_query($dbConnection,"SELECT * FROM answer WHERE nextQuestionId = '$question'");
 $result = mysqli_fetch_array($results)
  or die('Problem with select answer query' . mysqli_error());
 $question = $result['questionId']; //store questionid

 //check if current question is first question in script
 $question1 = $_GET["question"];
 $results1 = mysqli_query($dbConnection,"SELECT * FROM script WHERE firstQuestionId = '$question1'");

//if it is the first question, do not display back button
 if (mysqli_num_rows($results1) == 1){
 	$button = 1;
 }

 //do not display back button on first qn when building
 if ($scriptId == 0) {
     $button = 1;
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
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
         }
      </style>
   </head>
   <body>
      <div id="nav-placeholder">
      </div>

      <div class="container text-center">
         <!-- Dynamic heading--->
         <?php if ($question == 0 ) {  ?>
         <h1 style="font-size:70px; color:white;"><b>Build<img src="loggg.JPG" alt="logo" style="width:200px; height:200px;"></b></h1>
         <?php } else { ?>
         <h1 style="font-size:70px; color:white;"><b>Update<img src="loggg.JPG" alt="logo" style="width:200px; height:200px;"><b></h1>
         <?php }   ?>
      </div>

      <div id="back">
      </div>

      <div id="visible" style="display: none;">
         &nbsp&nbsp&nbsp<button style="height: 40px; width: 70px; font-size: 18px; border-radius: 4px" value="click here" onClick=window.location="http://salesscript.com.au/buildScript.php?script=<?php echo $scriptId?>&question=<?php echo $question ?>&category=<?php echo $category?>&scriptName=<?php echo $scriptName?>"><b>Back<b></button>
      </div>
      </div>

      <div style="text-align: center; width: 100%;" >
         <div class="container-fluid text-center" style="width: 250px; display: inline-block;">
            <div class="panel panel-primary">
               <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Script Name </div>
               <div class="panel-body">  <input type="text" id="scriptName" name="scriptName" value=""></div>
            </div>
         </div>
         <div class="container-fluid text-center" style="width: 250px; display: inline-block">
            <div class="panel panel-primary">
               <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Category</div>
               <div class="panel-body">
                  <input type="text" id="category" name="category" value="">
               </div>
            </div>
         </div>
      </div>
      <br>
      <!-- ADD TEXT BOX FUNCTION --->
      <div class="container1">
         <div class="row" style="width: 100%">
            <div class="col-sm-4">
               <div class="panel panel-primary">
                  <div class="panel-heading">Add a Script box <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button></div>
               </div>
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
            <div id="toolbar">
               <div id="editor">
                  <input type="text" id="pitch" name="pitch">
               </div>
            </div>
            <br>
            <h5><b>Record A Pitch<b></h5>
            <ol id="recordingsList"></ol>
            <div id="controls">
               <button id="recordButton" style="width: 30%;">Record</button>
               <button id="pauseButton" style="width: 30%;" disabled>Pause</button>
               <button id="stopButton" style="width: 30%;" disabled>Stop</button>
            </div>

            <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
            <script src="app.js"></script><br>

         </div><br><br>

         <?php if ($_GET["question"] == 0 ) { ?>
         <button  style="height: 30px; width: 90px; font-size: 15px; border-radius: 4px" onclick="savePitch()"/>Save Pitch</button>
         <?php } else { ?>
         <button  style="height: 30px; width: 120px; font-size: 15px; border-radius: 4px" onclick="updateQuestion()"/>Update Pitch</button>
         <button  style="height: 30px; width: 120px; font-size: 15px; border-radius: 4px" onclick="location.replace('http://salesscript.com.au/currentScripts.php')"/>Finished</button>
         <?php } ?>
         <br><br>
      </div>
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
        var x               = 1;
        var questionId, scriptId, answerCount, saveResponse, responseText, answerQuestion, nextQn, answerId, pitch, scriptname, category, back, ansId, counter, check;
        var wrapper         = $(".container1");
        var add_button      = $(".add_form_field");

        $(document).ready(function() {
            var max_fields      = 11;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");

            //store parameters from url in appropriate variables
            questionId = getAllUrlParams().question;
            scriptId = getAllUrlParams().script;
            answerId = getAllUrlParams().answerid;
            back = getAllUrlParams().back;
            category = getAllUrlParams().category;
            scriptName = getAllUrlParams().scriptname;
            backId = back - 1;

            //display script name and category to user if they are set
            if (category != 0){
            document.getElementById("scriptName").value= scriptName;
            document.getElementById("category").value = category;
            }

        	 //check if first question of the script to dynamically change back button
        	  if (<?php echo $button ?> == 0){
        	          //if user is creating a completely new pitch
        	          if (questionId == 0){
        	            document.getElementById("back").innerHTML = '&nbsp&nbsp&nbsp&nbsp<button style="height: 40px; width: 70px; font-size: 18px; border-radius: 4px" value="click here" onClick="history.back();"><b>Back<b></button>';
                    //if user is updating or viewing a existing pitch
                    } else {
        	            document.getElementById("visible").style.display='block';
        	          }
                  }

           //load script for user to view
            if (questionId != 0){
               loadQuestion();
            }

            //lets user add new answer to pitch
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    ansId++;
                    counter++;
                    $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+counter+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+counter+'" name="'+counter+'"></div></div> </div>'); //add input box

                //maximum of 10 answers per pitch
                } else {
                  alert('You Reached the limits');
                }
            });
            //delete unwanted answer boxes
            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })


        });

        var toolbarOptions = [
          ['bold', 'italic','underline', 'strike'],
          [{'header': [1,2,3,4,5,6, false] }],
          [{'list':'ordered'}, {'list': 'bullet'}],
          [{'indent':'-1'}, {'indent': '+1'}],
          [{'direction': 'rt1'}],
          [{'size':['small',false,'large','huge'] }],
          ['image' ],
          [{'color': []}, {'background': [] }],
          [{'font': [] }],
          [{'align': [] }],
          ];

      var quill = new Quill('#editor', {

       modules: {
         toolbar: toolbarOptions
       },
       theme: 'snow'
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

    //load script to page
     function loadQuestion(){

        var formData = new FormData();

        //variables needed to display script
        formData.append("questionId", questionId);
        formData.append("scriptId", scriptId);
        formData.append("answerId", answerId);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var loadResponse = JSON.parse(this.responseText);

                counter = loadResponse.i; //answer count
                counter = counter - 1; //minus one to avoid out of bounds
                pitch = loadResponse[0].texts; //load pitch
                quill.setText(pitch); //set quill to pitch
                scriptname = loadResponse.scriptName; //scriptname
                category = loadResponse.category; //category
                back = loadResponse.backId; //backid
                var ans = 0;

                //dynamically create amount of text boxes needed to display answers per pitch
                for (var i = 1; i <= counter; i++) {

                  if (loadResponse[i].nextId != null) {
                    questionId = loadResponse[i].nextId;
                  } else {
                    questionId = 0;
                }

                  ans = loadResponse[i].ans;
                  //add answer textbox
                  $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+i+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+i+'" name="a'+i+'"></div></div> </div>'); //add input box
                  //give answer textbox answers real database id
                  document.getElementById("a"+i).value= loadResponse[i].id;
                  //allow user to create corresponding answer
                  document.getElementById("s"+i).innerHTML = '<button value="click here" onClick=window.location="http://salesscript.com.au/buildScript.php?script='+scriptId+'&question='+questionId+'&answerid='+ans+'&scriptName='+scriptname+'&category='+category+'&back='+questionId+'">NEXT PITCH</button>';


              }

            }
        };
        xmlhttp.open("POST", "getQuestion.php", true);
        xmlhttp.send(formData);

      }


      function updateQuestion(){

         questionId = getAllUrlParams().question; //question id from url
         var text = quill.getText(0, 10000); //grabs just the text from quill
         var formData = new FormData();

         //appended all required variables needed to successfully add script to store
         formData.append("id", questionId);
         formData.append("scriptId", scriptId);
         formData.append("answerId", answerId);
         formData.append("quill", text);
         formData.append("name", document.getElementById("scriptName").value);
         formData.append("category", document.getElementById("category").value);

          //apending answers to pitch
          for (var i = 1; i <= counter; i++){
            formData.append("a"+i, document.getElementById("a"+i).value);
          }

          formData.append("answerCount", counter); //needed when adding answers into database


         xmlhttp.open("POST", "updateQuestion.php", true);
         xmlhttp.send(formData);

       }

       //save script, pitch and answers to database
      function savePitch(){

        var delta = quill.getContents(); //grabs quill as an object
        var text = quill.getText(0, 10000); //grabs just the text from quill
        var formData = new FormData();

        //appended all required variables needed to successfully add script to store
        formData.append("id", questionId);
        formData.append("quill", text);
        formData.append("name", document.getElementById("scriptName").value)
        formData.append("category", document.getElementById("category").value)
        formData.append("scriptId", scriptId);
        formData.append("answerCount", ansId);
        formData.append("nextQn", nextQn);
        formData.append("answerId", answerId);

        //append each answer created by user
        for (var i = 1; i <= ansId; i++){
          formData.append("a"+i, document.getElementById("a"+i).value);
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                saveResponse = JSON.parse(xmlhttp.responseText);

                questionId = saveResponse.id; //store questionn id
                scriptId = saveResponse.scriptId; //store script id
                scriptName = saveResponse.name; //scriptname
                category = saveResponse.category; //category
                back = saveResponse.backId; //store questionn id

                //reload when after pitch + answers have been saved
               location.replace('http://salesscript.com.au/buildScript.php?script='+scriptId+'&question='+questionId+'&answerId='+answerId+'&scriptName='+scriptName+'&category='+category+'&back='+back+'');

            }
        };
        xmlhttp.open("POST", "saveQuestion.php", true);
        xmlhttp.send(formData);


      }

    </script>

</html>
