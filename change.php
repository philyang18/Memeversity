<?php
	if(isset($_GET['user_email']) && !empty($_GET['user_email'])) {
		// echo "hi";
		$email = $_GET['user_email'];
		$error="";
		if(isset($_GET['pass']) && !empty($_GET['pass']) && isset($_GET['pass-again']) && !empty($_GET['pass-again'])) {
			
			if($_GET["pass"] != $_GET["pass-again"]) {
				$error="passwords do not match";	
			}
			else {

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

				$sql = "UPDATE users SET user_password = '" . $_GET['pass'] . "' WHERE user_email = '" . $email ."';";

				$results = $mysqli->query($sql);
				if(!$results){
					echo $mysqli->error;
					exit();
				}	
				$mysqli->close();	
				header("Location: home.php?user_email=" . $email);
			}

		}
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
	    <ul class="nav navbar-nav">
			<li><a href="home.php?user_email=<?php echo $email; ?>">home</a></li>
			<li><a href="favorite.php?user_email=<?php echo $email; ?>">favorites</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li class="active"><a class="myNav-text" href="change.php?user_email=<?php echo $email; ?>">change password</a></li>
	      	<li><a class="myNav-text" href="login.php"><span class="glyphicon glyphicon-user"></span> log out</a></li>
	    </ul>
	  </div>
	</nav>
	  
	<div id="myContainer">
	  	<form class="form-get-started" method="GET" action="change.php">
	  		<h1 id="title-id" class="col-12">recover your password</h1>

	  		<div id="new-info">
		  		<p class="mySpacing">new password</p>
		  		<input type="hidden" name="user_email" value="<?php echo $email;?>">
	            <input type="password" name="pass" id="myPassword" class="form-control myInput-format" placeholder="•••••••" required="">
	            <p class="mySpacing">re-enter password</p>
	            <input type="password" name="pass-again" id="myPassword" class="form-control myInput-format" placeholder="•••••••" required="">
			</div>    
			<p class="mySpacing" id="private-text"></i></p>
			<?php if($error != ""): ?>
				<p style="font-style: italic;	color: red;">passwords do not match</p>   
			<?php endif; ?>
            <button id="myStart-btn" class="btn btn-success btn-block myBtn" type="submit">change password</button>
		</form>
	</div>
	
</body>
</html>
	

