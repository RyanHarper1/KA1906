<?php

    $error = " "; //initialize error message

    //When user selects submit
    if (isset($_POST["submit"])){

      //connect to database
		  require_once('dbConnection.php');

			//securely store entered username and password, to stop inception occruing
			$username = mysqli_real_escape_string($dbConnection, $_POST['email']);
			$password = mysqli_real_escape_string($dbConnection, $_POST['password']);

			//select user information for database
			$sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password'";

			$results =  mysqli_query($dbConnection, $sql)
			or die (mysqli_error($dbConnection));

			$numrows = mysqli_num_rows($results);

			//if entered email and password matches a record in the DB
			if ( $numrows == 1 ) {

				session_start();
				//fetch the record
				$user = mysqli_fetch_assoc($results);
				//log user onto website
				$_SESSION["who"] = $user['id'];
        $_SESSION["username"] = $user['username'];
        $_SESSION["firstname"] = $user['firstname'];
        $_SESSION["lastname"] = $user['lastname'];
        $_SESSION['email'] = $user['email'];

				header('Location: home.php'); //redirect user to home page as they are logged in

        //If User log in details are incorrect
			} else {
			   //redirect to login page if login credentials are incorrect
			   $error = "Your Login Name or Password is invalid";
			}
    }
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modals {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .modalss {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        .details {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }
        /* Modal Content */

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        /* The Close Button */

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .closes {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closes:hover,
        .closes:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .closess {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closess:hover,
        .closess:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .detailtype {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .detailtype:hover,
        .detailtype:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        // css example
        .spans {
            content: "\2713";
        }
        /* Remove the navbar's default margin-bottom and rounded borders */

        .container {
            position: relative;
            width: 50%;
        }

        .row {
            text-align: middle;
        }

        .image {
            display: block;
            width: 50%;
            height: 50%;
        }

        .wrapper {
            text-align: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 50%;
            opacity: 0;
            transition: .5s ease;
            background-color: #008CBA;
        }

        .container:hover .overlay {
            opacity: 1;
        }

        .texts {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .myButton {
            -moz-box-shadow: 0px 10px 14px -7px #276873;
            -webkit-box-shadow: 0px 10px 14px -7px #276873;
            box-shadow: 0px 10px 14px -7px #276873;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
            background: -moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
            background: -webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
            background: -o-linear-gradient(top, #599bb3 5%, #408c99 100%);
            background: -ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
            background: linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99', GradientType=0);
            background-color: #599bb3;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 20px;
            font-weight: bold;
            padding: 13px 32px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #3d768a;
        }

        .myButton:hover {
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
            background: -moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
            background: -webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
            background: -o-linear-gradient(top, #408c99 5%, #599bb3 100%);
            background: -ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
            background: linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3', GradientType=0);
            background-color: #408c99;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }

        footer {
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
            width: 300px;
        }

        #txtbox1 {
            font-size: 10pt;
            height: 100px;
            width: 500px;
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
                <li class="active"><a href="store.php">Store</a></li>
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
            <section class="hero-section set-bg" data-setbg="bg.jpg">
                <div class="containers">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="hero-text text-white">
                                <h2>Sales Script</h2>
                                <p>The number one sales website to be created in this world, since it's introduction into the market it has skyrocketed to number 1 in the appstore</p>
                                <div class="hero-author">
                                    <button class="myButton" id="SeeDetails">See Details <i class="fa fa-angle-right"></i></button>
                                    <div id="SeeDetail" class="details">
                                        <div class="modal-content">
                                            <spans class="detailtype">&times;</spans>
                                            <p> See what Sales Script can do for your company
                                                <br> Questions? Call us at 0000 000 00 (AU), 1111 111 111(NZ).
                                                <br> View a CRM demo to learn more about Sales Script and thier award-winning features.
                                                <br> See how Sales Script, is helping customers to achieve:
                                                <br>

                                                <spans>&#10003;</spans> 44% increase in Lead Volume
                                                <br>
                                                <span>&#10003;</span> 37% increase in Win Rate
                                                <br>
                                                <span>&#10003;</span> 37% increase in Sales Revenue
                                                <br>
                                                <span>&#10003;</span> 45% increase in Customer Retention
                                                <br>
                                                “Sales Script has helped us move from a product focused support model to one where the customer comes first. It’s made it easy to deliver a consistent, customer centric service experience to customers all over the world.” <br><br>

                                                ALOE VERAT, GENERAL MANAGER, SALES AND OPERATIONS, SALES SCRIPT <br><br><br>
                                                 Sales Script Customer Relationship Survey conducted March-April 2018, by an independent third-party, ConLaggit Inc., on 4,600+ customers randomly selected. Response sizes per question vary. <br>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </br>
                      </br>
                    </br>
                        <div id="paypal-button"></div>
                        <section class="courses-section spad">
                            </div>
                        </section>

                    </div>
                </section>
            </div>
        </div>

        <div class="container-fluid bg-3 text-center">
            <div class="container">
                <img src="script_one.png" alt="BuyAScript" align="left" class="image">
                    <button class="w3-button w3-xlarge w3-black" id="myBtn"> Buy a Script </button>
            </div>
            <div id="myModal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <p> Hi My Name is Paul Miller I am from Sales Stream
                  how are you today. that's good. I just wanted to let you
                  know that we are a recuitment company that sourses  100's
                  of  Candiates .....</p>
            </div>
          </div>
            </br>
            </br>
            </br>
            <div class="container">
                <img src="script_two.png" alt="BuyAScript2" align="left" class="image">
                    <button class="w3-button w3-xlarge w3-black" id="myBtns"> Buy a Script </button>
                  </div>
                  <div id="myModals" class="modals">
                    <div class="modal-content">
                      <spans class="closes">&times;</spans>
                      <p> before you hang up listen we dont know each other
                         from a bar of soap right. I dont have any preconcieved
                         .....  </p>
                  </div>
                </div>
                </br>
            </br>
            </br>
            </br>
            <div class="container">
                <img src="script_three.png" alt="BuyAScript3" align="left" class="image">
                    <button class="w3-button w3-xlarge w3-black" id="myBtnss"> Buy a Script </button>
              </div>
              <div id="myModalss" class="modalss">
                <div class="modal-content">
                  <spans class="closess">&times;</spans>
                  <p> This candidate has over four years experience
                     working for one of your compeditors in the same
                     Territory so they already have contacts that
                     they can take over for..... </p>
              </div>
            </div>
            </div>
              </br>
              </br>
              </br>
            </br>
            </br>
            </br>
            <div class="container">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name=
                "hosted_button_id" value="LTX2ARCSHYANQ" />

                <table>
                  <tr>
                    <td><input type="hidden" name="on0" value="Scripts and their prices" />Scripts
                    and their prices</td>
                  </tr>

                  <tr>
                    <td><select name="os0">
                      <option value="Script 1">
                        Script 1 $0.40 AUD
                      </option>

                      <option value="Script 2">
                        Script 2 $0.40 AUD
                      </option>

                      <option value="Script 3">
                        Script 3 $0.80 AUD
                      </option>

                      <option value="Script 1 + Script 2">
                        Script 1 + Script 2 $0.80 AUD
                      </option>

                      <option value="Script 1 + Script 3">
                        Script 1 + Script 3 $0.80 AUD
                      </option>

                      <option value="Script 1 + Script 2 + Script 3">
                        Script 1 + Script 2 + Script 3 $1.20 AUD
                      </option>

                      <option value="Script 2 + Script 3">
                        Script 2 + Script 3 $0.80 AUD
                      </option>
                    </select></td>
                  </tr>
                </table><br><input type="hidden" name="currency_code" value="AUD" /> <input type=
                "image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_buynowCC_LG.gif" border=
                "0" name="submit" alt="PayPal &#8211; The safer, easier way to pay online!" />
                <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif"
                width="1" height="1" />
              </form>
            </div><br />
            <br />
            <br />
            <br />





        <footer class="container-fluid text-center">
            <p>KS1811 copyrighted</p>
        </footer>

    </body>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var modals = document.getElementById('myModals');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtns");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closes")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modals.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modals.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modals) {
            modals.style.display = "none";
        }
    }

    var modalss = document.getElementById('myModalss');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtnss");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closess")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modalss.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modalss.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalss) {
            modalss.style.display = "none";
        }
    }

    var details = document.getElementById('SeeDetail');

    // Get the button that opens the modal
    var btn = document.getElementById("SeeDetails");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("detailtype")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        SeeDetail.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        SeeDetail.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == SeeDetail) {
            SeeDetail.style.display = "none";
        }
    }

    paypal.Button.render({

        env: 'sandbox', // sandbox | production

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox: 'AYdg8ytDD8EBsQVIdoFAx4I57xKkIeqY2yUBAzvrvQ2-nO8wdaumof7_flpvOeG9knN1arin1zrt2GMR',
            production: '<AY6T1wp_3WeqFPfPQm_fmsPZdBsFRE-MmkNLUd94TpViGX4FUNRlSGllj4YrK832QniqPED2kFKotEIW>'
        },

        // Show the buyer a 'Pay Now' button in the checkout flow
        commit: true,

        // payment() is called when the button is clicked
        payment: function(data, actions) {

            // Make a call to the REST api to create the payment
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: '0.01',
                            currency: 'AUD'
                        }
                    }]
                }
            });
        },

        // onAuthorize() is called when the buyer approves the payment
        onAuthorize: function(data, actions) {

            // Make a call to the REST api to execute the payment
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }
        <?php header('Location: store.php'); ?>

    }, '#paypal-button-container');
</script>

</html>
