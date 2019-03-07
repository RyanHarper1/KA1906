<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sales Script</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="#">Sales Script</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classifcation
        <span class="caret"></span></a>
      <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
     
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
<div class="jumbotron">
  <div class="container text-center">
    <h1>Sales Script</h1>      
    <p>Welcome to sales Script </p>
  </div>
</div>
  
<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Answear 1</div>
  <div class="panel-body">  <input type="text" id="txtbox"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
       <div class="panel panel-primary">
        <div class="panel-heading">Answear 2</div>
        <div class="panel-body">  <input type="text" id="txtbox"></div>
      </div>
    </div>
   
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Answear 4</div>
        <div class="panel-body">  <input type="text" id="txtbox"></div>
      
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Answear 5</div>
      <div class="panel-body">  <input type="text" id="txtbox"></div>
      </div>
    </div>
   
  </div>
</div><br><br>

<div class="container-fluid text-center">
<div class="panel panel-primary">
        <div class="panel-heading">Question</div>
      <div class="panel-body">  <input type="text" id="txtbox1"></div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
