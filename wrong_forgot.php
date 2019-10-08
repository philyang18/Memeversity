<?php

	if(isset($_POST['inquiring_email']) && !empty($_POST['inquiring_email'])) {
	
		$host = "303.itpwebdev.com";
		$user = "yangphil_db_user";
		$pass = "uscuscusc1";
		$db = "yangphil_meme_db";
		$mysqli = new mysqli($host, $user, $pass, $db);

		if ($mysqli->connect_errno) {
			echo $mysqli->connect_error;
			exit();
		}
		$mysqli->set_charset('utf-8');
		// ==============================

		$email = $_POST['inquiring_email'];

	
		$sql = "SELECT * FROM users WHERE user_email = '" . $email ."';";
	
		$results = $mysqli->query($sql);
		$results = $results->fetch_assoc();
		if ($results != null) {
			$to      = $email;
			$subject = 'Password Recovery';
			$message = "Your password is " . $results['user_password'] . ".";
			$headers = 'From: memeversity';

		mail($to, $subject, $message, $headers);
		}
		else {
			header("Location: wrong_forgot.php");
			exit();
		}
		
		$mysqli->close();	

	}


?>

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
	  	<form class="form-get-started" method="POST" action="forgot.php">
	  		<h1 id="title-id" class="col-12">recover your password</h1>

	  		<div id="new-info">
		  		<p class="mySpacing">email address</p>
		  		<input type="email" name="inquiring_email" id="myEmail" class="form-control myInput-format" placeholder="johndoe@gmail.com" required="" autofocus="">
	            <p style="font-style: italic; color: red">This email is not registered.</p>
			</div>    
			<p class="mySpacing" id="private-text"></i></p>  
            <button id="myStart-btn" class="btn btn-success btn-block myBtn" type="submit">recover account</button>
		</form>
	</div>
	
</body>
</html>
	

