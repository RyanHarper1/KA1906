<?php

  $answerSelected = 0;
  $firstqn = 0;

   require_once('dbConnection.php');

   session_start();

  //check user is logged in
	if (!isset($_SESSION["who"])){
     header('Location: login.php'); //redirect user if not logged in
   }

   if (isset($_POST["submit"])){

     $answer1 = $_POST['1'];
     $answer2 = $_POST['2'];
     $answer3 = $_POST['3'];
     $answer4 = $_POST['4'];
     $answer5 = $_POST['5'];
     $answer6 = $_POST['6'];

     echo "$answer1";
     echo "$answer2";

     $pitch = $_POST['pitch'];
     $userId = $_SESSION["who"];


     //Create the script
     $sql = "INSERT INTO script (userId)
     VALUES ('$userId')";

     //performs
     mysqli_query($dbConnection, $sql);


     //Get Script ID
     $sqlScript = "SELECT * FROM script WHERE userId = '$userId'";

     $results =  mysqli_query($dbConnection, $sqlScript)
     or die (mysqli_error($dbConnection));

     	$scripts = mysqli_fetch_assoc($results);

      $scriptId = $scripts['scriptId'];

      echo "$scriptId";


      if ($firstqn == 0) {
      //store Question
     $sqlQuestion = "INSERT INTO question (texts, scriptId, firstQuestion)
     VALUES ('$pitch', '$scriptId', '1')";

     mysqli_query($dbConnection, $sqlQuestion);

     $firstqn = 1;
   } else {

     $sqlQuestion = "INSERT INTO question (texts, scriptId, firstQuestion)
     VALUES ('$pitch', '$scriptId', '0')";

     mysqli_query($dbConnection, $sqlQuestion);
   }


     //Get Question Id
     $sqlQuestion = "SELECT * FROM question WHERE scriptId = '$scriptId'";

     $results =  mysqli_query($dbConnection, $sqlQuestion)
     or die (mysqli_error($dbConnection));

     	$questions = mysqli_fetch_assoc($results);

      $questiontId = $questions['questionId'];

      echo "$questionId";

      $questionIds = $questionId + 1;

      echo "$questionIds";






     //Store Answers
       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer1', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);


       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer2', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);

       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer3', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);

       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer4', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);

       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer5', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);

       $sql = "INSERT INTO answer (texts, questionId, nextQuestionId)
       VALUES ('$answer6', '$questionId', '$questionIds')";

       //performs
       mysqli_query($dbConnection, $sql);




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
             background-color: #f2f2f2;
             padding: 25px;
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



        <div class="jumbotron">
            <div class="container text-center">
                <h1><b>Build Script<b></h1>
            </div>
        </div>



        <form action = "" method = "post">

         <!-- ADD TEXT BOX FUNCTION --->
        <div class="container1">
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading">Please add  a Script box <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button></div>
              </div>
            </div>
          </div>
        </div><br>
        <div class="container-fluid text-center">
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="1" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;" /> </div><div class="panel-body"> <input type="text" id="1" name="1"></div></div></div>
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="2" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;" /> </div><div class="panel-body"> <input type="text" id="2" name="2"></div></div></div>
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="3" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;" /> </div><div class="panel-body"> <input type="text" id="3" name="3"></div></div></div>
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="4" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;"/> </div><div class="panel-body"> <input type="text" id="4" name="4"></div></div></div>
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="5" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;"/> </div><div class="panel-body"> <input type="text" id="5" name="5"></div></div></div>
        <div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" style="background-color: #2365d1;" >Answer <input type="submit" name="submit" value="6" style="background-color: #2365d1; border-color: #2365d1; color: #2365d1; border: #2365d1;" /> </div><div class="panel-body">  <input type="text" id="6" name="6"></div></div></div>
        </div><br><br>



              <!-- PITCH FUNCTION -->
					<div class="container-fluid text-center">
						 <div class="container-fluid text-center">
				  <div class="panel panel-primary">
					 <div class="panel-heading"><b>Pitch</b></div>
					 <div id="toolbar">
					 <div id="editor">
					 <input type="text" id="txtbox1"></div></div>
					   <div class="wrapper">
                        <!-- -->



                        <!-- RECORD SCRIPT FUNCTION -->
                        <header>
                            <h1>Record A Script</h1>
                        </header>

                        <section class="main-controls">
                            <canvas class="visualizer" height="60px"></canvas>
                            <div id="buttons1">
                                <button class="record">Record</button>
                                <button class="stop">Stop</button>
                            </div>
                        </section>
                        <section class="sound-clips">
                        </section>
                        <!-- -->


                    </div>
                </div>
			  </div>
			 </div>



                <br><br>
                <input type="button" value="Reset" onClick="window.location.href=window.location.href">
                <input type="submit" name="submit" value="submit" />
                <br><br>

                </div>

              </form>



                <footer class="container-fluid text-center">
                    <p>Sales Script &copy;</p>
                </footer>


                <script src="install.js"></script>
                <script src="mediaDevices-getUserMedia-polyfill.js"></script>
                <script src="app.js"></script>

    </body>
	<script>

            //variables
            var counter         = 0;
            var id              = 0;

            //Allows PHP to work after leaving a javaScript function
            function myAjax() {
                $.ajax({
                     type: "POST",
                     url: 'http://localhost/buildScript.php',
                     data:{action:'call_this', counter:counter, id:id},
                     success:function(html) {
                       alert(html);
                     }

                });
              }

            $(document).ready(function() {
                var max_fields      = 11;
                var wrapper         = $(".container1");
                var add_button      = $(".add_form_field");

                var x = 1;
                $(add_button).click(function(e){
                    e.preventDefault();
                    if(x < max_fields){
                        x++;
                        counter++;
                        id++;
                        $(wrapper).append('<div class="col-sm-4"> <div class="panel panel-primary"> <div class="panel-heading" >Answer </div><div class="panel-body">  <input type="text" id="id" name="id"></div></div> </div>'); //add input box

                    }
            		else
            		{
            		alert('You Reached the limits')
            		}
                });

                $(wrapper).on("click",".delete", function(e){
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                })
				
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
            });
        </script>
</html>
