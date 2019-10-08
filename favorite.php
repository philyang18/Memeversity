<?php 
	$host = "303.itpwebdev.com";
	$user = "yangphil_db_user";
	$pass = "uscuscusc1";
	$db = "yangphil_meme_db";
	$user_email = $_GET['user_email'];
	$mysqli = new mysqli($host, $user, $pass, $db);

	if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}
	$mysqli->set_charset('utf-8');

	//============================================

	if(!empty($_GET['image_to_remove']) && isset($_GET['image_to_remove'])) {
		$user_email = $_GET['user_email'];	
		$sql_remove = "DELETE FROM favorites
						WHERE favorites.memes_meme_id = " . $_GET['image_to_remove'] . ";";
		// var_dump($sql_remove);
		$mysqli->query($sql_remove);
	}
	if (!empty($_GET['image_url']) && isset($_GET['image_url'])) {
		$image_url = $_GET['image_url'];
	}
	
	if (!empty($_GET['image_url']) && isset($_GET['image_url']) && !empty($_GET['user_email']) && isset($_GET['user_email']) && !empty($_GET['meme_id']) && isset($_GET['meme_id'])) {

		$sql = "INSERT IGNORE INTO favorites(users_user_email, memes_meme_id)
				VALUES('" . $_GET['user_email'] . "', " . intval($_GET['meme_id']) . ")";
		$results = $mysqli->query($sql);
	}

	if(!empty($_GET['user_email']) && isset($_GET['user_email'])) {
		$user_email = $_GET['user_email'];		
		$sql_favorites = "SELECT memes.meme_url, memes.meme_id FROM favorites
						LEFT JOIN memes
							ON memes.meme_id = favorites.memes_meme_id
						WHERE  favorites.users_user_email ='" . $user_email . "'
						ORDER BY favorites.tracking_number ASC;";
		$results_favorites = $mysqli->query($sql_favorites);
	
		$mysqli->close();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>memeversity</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="favorite.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://connect.facebook.net/en_US/sdk.js?hash=b2e75d6373e6400b683843b388c02c1a&amp;ua=modern_es6" async="" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<script>
		function changeColorWhite(){
			document.body.style.backgroundColor = "white";
		}
		function changeColorGrey(){
			document.body.style.backgroundColor = "grey";
		}
		function changeColorOriginal(){
			document.body.style.backgroundColor = "#a1e4fc";
		}
	</script>
</head>
<body>

	<nav class="navbar navbar-inverse myNav-container">
	  <div class="container-fluid">	
		<div class="navbar-header">
		    <a class="navbar-brand myNav-text" href="#"><i class="fa fa-university"></i> memeversity</a>
	    </div>
	    <ul class="nav navbar-nav">
			<li class=""><a href="home.php?user_email=<?php echo $_GET['user_email']; ?>">home</a></li>
			<li class="active"><a href="#">favorites</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a class="myNav-text" href="change.php?user_email=<?php echo $_GET['user_email']; ?>">change password</a></li>
	      <li><a class="myNav-text" href="login.php"><span class="glyphicon glyphicon-user"></span> log out</a></li>
	    </ul>
	  </div>
	</nav>
	  
	<div id="myContainer">
		<p id="title-id">favorites</p>
		<div id="my-button-holder">
			<button onclick="changeColorWhite();" class="my-color-white btn"></button>
			<button onclick="changeColorGrey();" class="my-color-grey btn"></button>
			<button onclick="changeColorOriginal();" class="my-color-original btn"></button>
		</div>
		<div id="memes" class="row">

			
			<?php while($row = $results_favorites->fetch_assoc()): ?>
				<?php if ($row != null): ?>
				<div class="col-lg-3 col-md-6 col-sm-12 my-col">
					<img class="my-img" src="<?php echo $row["meme_url"]; ?>">
					<div class="my-caption">
						<form action="favorite.php" method="GET">
							<input type="hidden" name="image_to_remove" value="<?php echo $row["meme_id"]; ?>">
							<input type="hidden" name="user_email" value="<?php echo $user_email; ?>">
							<button  class="my-caption-btn"><i class="far fa-heart"></i> unfavorite</button>
						</form>
						<form action="#" method="GET">
							<input type="hidden" name="image_url" value="<?php echo $row["meme_url"]; ?>">
							<button disabled="true" class="my-caption-btn"><i class="far fa-edit"></i><span>create</span></button>
						</form>
					</div>
				</div>
				
				<?php endif; ?>
			<?php endwhile; ?>
			
		</div>
		
	</div>	

	
</body>
</html>
