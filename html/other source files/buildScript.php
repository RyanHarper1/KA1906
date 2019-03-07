<?php
require_once('dbConnection.php');

session_start();

$scriptName = $_GET["scriptName"];
$category = $_GET["category"];

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

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">Sales Script</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classification
               <span class="caret"></span></a>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Accounting</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Admin& office support</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Advertising//arts media</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Banking & Financial Services</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Call Center & Customer Service</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Ceo & General Managment</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Community Service and development</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">construction</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">consulting & strategy</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Design & Architecture</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Education and Training</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Engineering</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Farm, Animals and conservation</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Goverment & Defence</a>
                                <ul class="dropdown-menu">
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Healthcare & Medical</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Hospitality and Tourism</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Human Resource and Recruitment</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Information & Communication Technology</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Insurance and superannuation</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Legal</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Manufacturing,Transport and Logistics</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Marketing & Communication</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Mining, Resource and Energy</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Real Estate & Property</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Retail & Consumer Products</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Buying Script</a></li>
                                    <li><a href="exampleScripts.php">Example Scripts</a></li>
                                    <li><a href="buildScript.php">Building Scripts</a></li>
                                    <li><a href="currentScripts.php">Current Scripts</a></li>
                                    <li><a href="uploadScripts.php">Upload Scripts</a></li>
                                    <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="store.php">Store</a></li>
                </ul>
                <form class="navbar-form navbar-left" action="/action_page.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                  </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname']; ?></a> </li>
                    <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
                </ul>
            </div>
        </nav>



            <br>
            <div class="container text-center">
                <h1 style="font-size:70px; color:white;"><b>Build Script<b></h1>
            </div><br>

        <div style="float: center; width: 1000px;" >

        <?php if ($scriptName == "0") { ?>
         <div class="container-fluid text-center" style="width: 250px; float: right; clear: none; display: inline-block"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Category</div><div class="panel-body">  <input type="text" id="category" name="category"></div></div> </div>
         <div class="container-fluid text-center" style="width: 250px; float: right; clear: none; display: inline-block;"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Script Name </div><div class="panel-body">  <input type="text" id="scriptName" name="scriptName"></div></div> </div>
        <?php } else { ?>
        <div class="container-fluid text-center" style="width: 250px; float: right; clear: none; display: inline-block"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Category</div><div class="panel-body">  <input type="text" id="category" name="category" value="<?php echo "$category" ?>"></div></div> </div>
        <div class="container-fluid text-center" style="width: 250px; float: right; clear: none; display: inline-block;"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: white; color: #347AB6; text-align: centre;" >Script Name </div><div class="panel-body">  <input type="text" id="scriptName" name="scriptName" value="<?php echo "$scriptName" ?>"></div></div> </div>
       <?php } ?>

       <br><br><br><br><br><br><br>
     </div>
         <!-- ADD TEXT BOX FUNCTION --->
        <div class="container1">
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">Add a Script box <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button></div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="container-fluid text-center">

        </div><br><br>



              <!-- PITCH FUNCTION -->
        <div class="container-fluid text-center" style="height: 200px; width: 700px;">
              <div class="panel panel-primary" style="box-shadow: 15px 15px black;">
                 <div class="panel-heading" style="background-color: #347AB6;"><b>Pitch</b></div>
                 <div id="toolbar">
                   <div id="editor">
                        <input type="text" id="pitch" name="pitch">
                  </div>

                </div>

                </div>



                <br><br>
                <button onclick="savePitch()"/>Save Pitch</button>
                <br><br>

      </div>


                <script src="install.js"></script>
                <script src="mediaDevices-getUserMedia-polyfill.js"></script>
                <script src="app.js"></script>

    </body>






    <script type="text/javascript">

        //variables
        var counter         = 0;
        var ansId           = 0;
        var content         = 0;
        var questionId, scriptId, answerCount, saveResponse, responseText, answerQuestion, nextQn, answerId, pitch, scriptname, category;
        var wrapper         = $(".container1");
        var add_button      = $(".add_form_field");


        $(document).ready(function() {
            var max_fields      = 11;
            var wrapper         = $(".container1");
            var add_button      = $(".add_form_field");

            questionId = getAllUrlParams().question;
            scriptId = getAllUrlParams().script;
            answerId = getAllUrlParams().answerid;


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
                quill.setText(pitch); //set quill to pitch
                scriptname = loadResponse.scriptName;
                category = loadResponse.category;



                //dynamically create amount of text boxes needed to display answers per pitch
                for (var i = 1; i < counter; i++) {

                  questionId = loadResponse[i].nextId;

                  $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary" style="box-shadow: 15px 15px black;"> <div class="panel-heading" >Answer <span id="s'+i+'"> </span></div><div class="panel-body">  <input type="text" style="width:100%; border: none;" id="a'+i+'" name="a'+i+'"></div></div> </div>'); //add input box
                  document.getElementById("a"+i).value= loadResponse[i].id;
                  document.getElementById("scriptName").value= scriptname;
                  document.getElementById("category").value= category;
                  document.getElementById("s"+i).innerHTML = '<button value="click here" onClick=window.location="http://localhost/buildScript.php?script='+scriptId+'&question='+questionId+'&answerid='+0+'&scriptName='+scriptname+'&category='+category+'">NEXT PITCH</button>';


              }

            }
        };
        xmlhttp.open("POST", "getQuestion.php", true);
        xmlhttp.send(formData);

      }

      function savePitch(){


        var delta = quill.getContents(); //grabs quill as an object
        var text = quill.getText(0, 10000); //grabs just the text from quill
        //questionId = getAllUrlParams().question;
        //scriptId = getAllUrlParams().script;
        //answerId = getAllUrlParams().answerid;

        var formData = new FormData();

        formData.append("id", questionId);
        formData.append("quill", text);
        formData.append("name", document.getElementById("scriptName").value)
        formData.append("category", document.getElementById("category").value)
        formData.append("scriptId", scriptId);
        formData.append("answerCount", ansId);
        formData.append("nextQn", nextQn);
        formData.append("answerId", answerId);

        for (var i = 1; i <= ansId; i++){

          formData.append("a"+i, document.getElementById("a"+i).value);

        }


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                saveResponse = JSON.parse(xmlhttp.responseText);

                questionId = saveResponse.id; //store questionn id
                scriptId = saveResponse.scriptId; //store script id
                scriptName = saveResponse.name;
                category = saveResponse.category;


                for (var i = 1; i <= ansId; i++) {
                        //console.log(saveResponse[i-1]);
                        answerId = saveResponse[i-1].id;

                        document.getElementById("s"+i).innerHTML = '<button value="click here" onClick=window.location="http://localhost/buildScript.php?script='+scriptId+'&question='+0+'&answerId='+answerId+'&scriptName='+scriptName+'&category='+category+'">NEXT PITCH</button>';

              }
            }
        };
        xmlhttp.open("POST", "saveQuestion.php", true);
        xmlhttp.send(formData);


      }




    </script>

</html>
