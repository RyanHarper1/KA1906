<?php
require_once('dbConnection.php');

session_start();
?>

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
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Admin& office support</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Advertising//arts media</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Banking & Financial Services</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Call Center & Customer Service</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Ceo & General Managment</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Community Service and development</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">construction</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">consulting & strategy</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>

                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Design & Architecture</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Education and Training</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Engineering</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Farm, Animals and conservation</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>

                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Goverment & Defence</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Healthcare & Medical</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>

                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Hospitality and Tourism</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Human Resource and Recruitment</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Information & Communication Technology</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Insurance and superannuation</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>

                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Legal</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Manufacturing,Transport and Logistics</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Marketing & Communication</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Mining, Resource and Energy</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Real Estate & Property</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Retail & Consumer Products</a>
                            <ul class="dropdown-menu">
                                <li><a href="exampleScripts.php">Example Scripts</a></li>
                                <li><a href="http://salesscript.com.au/buildScript.php?script=0&question=0&answerId=0&scriptName=0&category=0">Build Scripts</a></li>
                                <li><a href="currentScripts.php">Current Scripts</a></li>
                                <li><a href="boughtScripts.php"> Bought Scripts</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="store.php">Store</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['who'])) {?>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a> </li>
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <?php } else if ($_SESSION['admin'] != 'Y') { ?>

                        <li>
                            <a href="cart.php">
                      Items in Cart
                     </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="updateUser.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname']; ?>
        <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="updateUser.php">Update Details</a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1" href="purchaseHistory.php">Purchase History</a>
                                </li>

                        </li>
                        </ul>

                        <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>

                        <?php } else { ?>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="updateUser.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['firstname']; ?>
        <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="updateUser.php">Update Details</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <?php
                                         if (!isset($_SESSION["admin"])){header('Location: showPayment.php'); 
                                           }
                                         ?><a tabindex="-1" href="showPayment.php">Show Payments</a>
                                    </li>

                            </li>
                            </ul>
                            <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>

                            <?php } ?>
        </div>
        <!-- /.container-fluid -->
    </nav>