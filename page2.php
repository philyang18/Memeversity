<?php 
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
	//======================================

	if (!empty($_GET['user_email']) && isset($_GET['user_email'])) {
		$user_email = $_GET['user_email'];
	}
	if(isset($_GET['refresh']) && !empty($_GET['refresh']))  {
		define("MEMES_API_ENDPOINT", "https://api.imgflip.com/get_memes");

		// Initiate curl
		$curl = curl_init();
		// Set curl options
		curl_setopt($curl, CURLOPT_URL, MEMES_API_ENDPOINT);
		// Return the response as a string
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// Verifies the authenticity of the peer's certificate
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		// Send the request via curl and get some response back
		$response = curl_exec($curl);

		// Convert the JSON response to php array
		$response = json_decode($response, true);

		for ( $i = 0; $i < 100; $i++ ) {
			$current_meme = $response["data"]["memes"][$i];
			// current.height <= 350 && current.width > 350
			if ($current_meme["height"] > 350 && $current_meme["width"] > 450 && $current_meme["height"] <= 450) {
				$meme_id = intval($current_meme["id"]);
				$meme_url = $current_meme["url"];
				$sql = "INSERT IGNORE INTO memes(meme_id, meme_url)
						VALUES(" . $meme_id . ", '" . $meme_url . "');";
				$results = $mysqli->query($sql);

				if (!$results) {
					echo $mysqli->error;
					exit();
				}
			}
		}
		curl_close($curl);
	}
	$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>memeversity</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="page2.css">
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
			<li class="active"><a href="#">home</a></li>
			<li><a href="favorite.php?user_email=<?php echo $user_email; ?>">favorites</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a class="myNav-text" href="login.php"><span class="glyphicon glyphicon-user"></span> log out</a></li>
	    </ul>
	  </div>
	</nav>
	<div id="myContainer">
		<p id="title-id">meme templates</p>
		<div id="memes" class="row">

		</div>
		<div id="button-container">
			<a href="home.php?user_email=<?php echo $user_email; ?>" role="button" class="btn btn-primary">page 1</a>
			<a href="page2.php?user_email=<?php echo $user_email; ?>&refresh=true" role="button" class="btn btn-primary">Refresh for the latest</a>
		</div>
	</div>	
	<script>
		document.body.onload = ajax("https://api.imgflip.com/get_memes", "displayResults");

		function ajax(endpoint, displayFunction){
			let xhr = new XMLHttpRequest();
			xhr.open("GET", endpoint);
			xhr.send();

			xhr.onreadystatechange = function() {
				if(this.readyState == this.DONE){
					if(xhr.status == 200){
						let responseObjects = JSON.parse(xhr.responseText);
						if(displayFunction == "displayResults"){
							displayResults(responseObjects);
							console.log(responseObjects);
							console.log(responseObjects.data.memes.length);
						}
					}
					else {
						console.log(xhr.status);
					}
				}
			}
		}
		function displayResults(results) {
			let memes = document.querySelector("#memes");
			while (memes.hasChildNodes()) {
				memes.removeChild(memes.lastChild);
			}
			for(let i = 0; i < results.data.memes.length; i++) {
				current = results.data.memes[i];
				if (current.height > 350 && current.width > 450 && current.height <=450) {

					let columnElement = document.createElement("div");
					columnElement.classList.add("col-lg-3", "col-md-6", "col-sm-12", "my-col");
					document.querySelector("#memes").appendChild(columnElement);


					let imgElement = document.createElement("img");
					imgElement.src = current.url;
					imgElement.classList.add("my-img");
					columnElement.appendChild(imgElement);

					let captionDivElement = document.createElement("div");
					captionDivElement.classList.add("my-caption");
					columnElement.appendChild(captionDivElement);

					let favoriteFormElement = document.createElement("form");
					favoriteFormElement.method = "GET";
					favoriteFormElement.action = "favorite.php";
					captionDivElement.appendChild(favoriteFormElement);

					let favoriteButtonElement = document.createElement("button");
					favoriteButtonElement.classList.add("my-caption-btn");
					favoriteButtonElement.type = "submit";
					favoriteFormElement.appendChild(favoriteButtonElement);

					let heartIconElement = document.createElement("i");
					heartIconElement.classList.add("fa", "fa-heart");
					favoriteButtonElement.appendChild(heartIconElement);

					let createFormElement = document.createElement("form");
					createFormElement.method = "GET";
					createFormElement.action = "create.php";
					captionDivElement.appendChild(createFormElement);

					let createButtonElement = document.createElement("button");
					createButtonElement.classList.add("my-caption-btn");
					createButtonElement.type = "submit";
					createButtonElement.disabled = true;
					createFormElement.appendChild(createButtonElement);

					let createIconElement = document.createElement("i");
					createIconElement.classList.add("far", "fa-edit");
					createButtonElement.appendChild(createIconElement);

					
					let hiddenInputElement = document.createElement("input");
					hiddenInputElement.name = "image_url";
					hiddenInputElement.type = "hidden";
					hiddenInputElement.value = current.url;
					favoriteFormElement.appendChild(hiddenInputElement);

					let hiddenInputElement2 = document.createElement("input");
					hiddenInputElement2.name = "image_url";
					hiddenInputElement2.type = "hidden";
					hiddenInputElement2.value = current.url;
					createFormElement.appendChild(hiddenInputElement2);

					let hiddenInputElement3 = document.createElement("input");
					hiddenInputElement3.name = "user_email";
					hiddenInputElement3.type = "hidden";
					hiddenInputElement3.value = "<?php echo $user_email; ?>";
					favoriteFormElement.appendChild(hiddenInputElement3);

					let hiddenInputElement4 = document.createElement("input");
					hiddenInputElement4.name = "meme_id";
					hiddenInputElement4.type = "hidden";
					hiddenInputElement4.value = current.id;
					favoriteFormElement.appendChild(hiddenInputElement4);

					let wrapButtonTextElement = document.createElement("span");
					wrapButtonTextElement.innerHTML = " favorite";
					favoriteButtonElement.appendChild(wrapButtonTextElement);

					let wrapButtonTextElement2 = document.createElement("span");
					wrapButtonTextElement2.innerHTML = " create"
					createButtonElement.appendChild(wrapButtonTextElement2);
				}
			}
		}

	</script>
</body>
</html>
