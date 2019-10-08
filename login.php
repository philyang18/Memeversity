<?php
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>memeversity</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://connect.facebook.net/en_US/sdk.js?hash=b2e75d6373e6400b683843b388c02c1a&amp;ua=modern_es6" async="" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-inverse myNav-container">
	  <div class="container-fluid">	
		<div class="navbar-header">
		    <a class="navbar-brand myNav-text" href="#"><i class="fa fa-university"></i> memeversity</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a class="myNav-text" href="get_started.php"><span class="glyphicon glyphicon-user"></span> get started</a></li>
	    </ul>
	  </div>
	</nav>
	  
	<div id="myContainer">
	  	<form class="form-signin" action="home.php" method="POST">
	  		<h1 id="title-id" class="col-12">login</h1>
	  		<button class="btn facebook-btn social-btn" type="button"><i class="fab fa-facebook-f"></i> <strong>LOG IN WITH FACEBOOK</strong></button>
	  		
	  		<div id="or-id">
				<span id="or-format">
					or <!--Padding is optional-->
				</span>
			</div>
			<input type="hidden" name="refresh" value="true">
	  		<input type="email" name="email_entered" id="myEmail" class="form-control myInput-format" placeholder="email address" required="" autofocus="">
            <input type="password" name="password_entered" id="myPassword" class="form-control myInput-format" placeholder="password" required="">

            <button id="myLogin-btn" class="btn btn-success btn-block myBtn" type="submit"><strong>LOG IN</strong></button>

            <div id="forgot-pw">
            	<a href="forgot.php"><u>forgot password?</u></a>
            </div>
            <hr>
            <p id="getStarted-id">don't have an account? click to get started.</p>
	  	</form>
	  	<form action="get_started.php">
        	<button id="myGetStarted-btn" class="btn btn-primary btn-block myBtn" type="submit" id="btn-signup">GET STARTED</button>
        </form>
	</div>

</body>
</html>
