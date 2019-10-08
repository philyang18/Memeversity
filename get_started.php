

<!DOCTYPE html>
<html>
<head>
	<title>memeversity</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="get_started.css" type="text/css">
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
	      <li><a class="myNav-text" href="login.php"><span class="glyphicon glyphicon-user"></span> log in</a></li>
	    </ul>
	  </div>
	</nav>
	  
	<div id="myContainer">
	  	<form class="form-get-started" method="POST" action="home.php">
	  		<h1 id="title-id" class="col-12">start your day with laughter</h1>

	  		<div id="new-info">
		  		<p class="mySpacing">email address</p>
		  		<input type="email" name="new_email" id="myEmail" class="form-control myInput-format" placeholder="johndoe@gmail.com" required="" autofocus="">
		  		<p class="mySpacing">password</p>
	            <input type="password" name="new_password" id="myPassword" class="form-control myInput-format" placeholder="•••••••" required="">
	            
			</div>    
			<p class="mySpacing" id="private-text"><i class="fas fa-lock"></i> private and secure.</p>  
            <button id="myStart-btn" class="btn btn-success btn-block myBtn" type="submit">lemme in</button>
		</form>
	</div>

</body>
</html>
