

	 <?php
             if((isset($_POST['submit1']))){
				 echo "Its is set";
				  }else{
					  echo "it is not set ";
				 }
	 ?>


<!DOCTYPE html>

<html>

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
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sales Script</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classifcation
        <span class="caret"></span></a>
      <ul class="dropdown-menu multi-level" role="menu" id="dropdownMenu">

              <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Accounting</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Admin& office support</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Advertising//arts media</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Banking & Financial Services</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Call Center & Customer Service</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Ceo & General Managment</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Community Service and development</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">construction</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">consulting & strategy</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Design & Architecture</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Education and Training</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Engineering</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			    <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Farm, Animals and conservation</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Goverment & Defence</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Healthcare & Medical</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Hospitality and Tourism</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Human Resource and Recruitment</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Information & Communication Technology</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Insurance and superannuation</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Legal</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Manufacturing,Transport and Logistics</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Marketing & Communication</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Mining, Resource and Energy</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Real Estate & Property</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
			  <li class="divider"></li>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="#">Retail & Consumer Products</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Buying Script</a></li>
		    <li><a href="#">Example Scripts</a></li>
			 <li><a href="#">Building Scripts</a></li>
			  <li><a href="#">Current Scripts</a></li>
			   <li><a href="#">Upload Scripts</a></li>
			    <li><a href="#"> Bought Scripts</a></li>
                </ul>
              </li>
            </ul>
      </li>
      <li><a href="#">contact us</a></li>
      <li><a href="#">Page 3</a></li>
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a> </li>
    </ul>
  </div>
</nav>

<div class="container">

    <h2 align="center">Sales Script</h2>  

    <div class="form-group">

         <form name="add_name" id="add_name"  action="<?php $_SERVER['PHP_SELF'] ?>" method= "POST" >


            <div class="table-responsive">  

                <table class="table table-bordered" id="dynamic_field">  

                    <tr>  

                        <td><div id="toolbar"><div id="editor"><input type="text" name="name[]" placeholder="Please enter answer" class="form-control name_list" required="" /></div></div></td>  

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

                    </tr>  

                </table>  

                

            </div>
			<div class="container-fluid text-center">
          <div class="table-responsive">  

                <table class="table table-bordered" id="dynamic_field1">  

                    <tr>  

                         <td><button type="button" name="add1" id="add1" class="btn btn-success">please enter pitch</button></td>  
 

                    </tr>  

                </table>  

                

            </div>
      <br><br>
      <input type="button" value="Reset" onClick="window.location.href=window.location.href">
       <input type="button" name="submit1" id="submit1" class="btn btn-info" value="Submit" />   
      <br><br>
	  </div>


         </form>  

    </div> 

</div>



      <footer class="container-fluid text-center">
         <p>Sales Script &copy;</p>
      </footer>


<script type="text/javascript">

    $(document).ready(function(){      

      var postURL = "/addmore.php";
	  

      var i=1;  
      var max_fields      = 2;
      var x=1;
      $('#add').click(function(){  

           i++;  

           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Please enter script" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

      });

	   $('#add1').click(function(e){  
	    e.preventDefault();
           if(x < max_fields){
            x++;
           
           $('#dynamic_field1').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name1[]" placeholder="Please enter pitch" class="form-control name_list" required /></td></tr>');  
            }
		else
		{
		alert('You Reached the limits')
		}
      });
	  

      $(document).on('click', '.btn_remove', function(){  

           var button_id = $(this).attr("id");   

           $('#row'+button_id+'').remove();  

      });  


      $('#submit1').click(function(){            

           $.ajax({  

                url:postURL,  

                method:"POST",  

                data:$('#add_name').serialize(),

                type:'json',

                success:function(data)  

                {

                  	i=1;

                  	$('.dynamic-added').remove();

                  	$('#add_name')[0].reset();

    				        alert('Record Inserted Successfully.');

                }  

           });  

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

    });  

</script>

</body>

</html>