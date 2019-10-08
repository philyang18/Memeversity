<!DOCTYPE html>
<html lang="en">
<head>
	<title>memeversity</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="create.css">
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
	    <ul class="nav navbar-nav">
			<li class=""><a href="home.php">home</a></li>
			<li class=""><a href="favorite.php">favorites</a></li>
			<li class="active"><a>create</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a class="myNav-text" href="login.php"><span class="glyphicon glyphicon-user"></span> log out</a></li>
	    </ul>
	  </div>
	</nav>
	  
	<div id="my-container row">
		<div id="meme" class="col-12">
			<img id="my-meme-image" src="<?php echo $_GET['image_url']; ?>">;
			<div id="top-caption">
				Considering whether to keep this page or not.
			</div>
			<div id="bottom-caption">

			</div>
			</div>
		</div>
	</div>	
		
</body>
</html>