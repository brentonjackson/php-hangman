<?php
# BUTTON 
# run this code when the "guess_submit"
# button is pressed
if(isset($_POST["guess_submit"])) {
	addGuess();

	# if the guess is incorrect, move
	# to the next hangman stage
	if (strpos($_COOKIE['word'], $_POST['guess']) === false) {
		nextImage();
	}
}


# reads and validates the users guess and 
# adds it to the guesses cookie. 
function addGuess() {
	# if the entire word is guessed, enter the win page
	if ($_POST['guess'] == $_COOKIE['word']) {
		scoreUpdate();
		resetCookies();
		header("Location: game-over.php?state=win");
	}

	# add current guess to the guesses cookie
	if ($_COOKIE['guesses'] == ",") {
		setcookie('guesses', strtolower($_POST['guess']), time() + (3600 * 24));
		$_COOKIE['guesses'] = strtolower($_POST['guess']);
	} else {
		setcookie('guesses', strtolower($_COOKIE['guesses']) . ',' . $_POST['guess'], time() + (3600 * 24));
		$_COOKIE['guesses'] .= ',' . strtolower($_POST['guess']);
	}
}


# this increments the image displayed
function nextImage() {
	# increment cookie data
	setcookie('imageIndex', $_COOKIE['imageIndex'] + 1, time() + (3600 * 24));
	setcookie('points', $_COOKIE['points']-100);
	# increment variable being used
	$_COOKIE['imageIndex']++;
	$_COOKIE['points']-=100;

	# if more than 7 bad guesses were made
	# terminate game
	if ($_COOKIE['imageIndex'] > 7) {
		setcookie('points', 0);
		$_COOKIE['points']=0;
		scoreUpdate();
		resetCookies();
		header("Location: game-over.php?state=lost");
	}
}



# RAN AT START
# sets important cookies if they are not set
# yet. sets the corresponding variables to be used
function loadCookies() {
	# RUN AT START
	# One hint
	if (!isset($_COOKIE['hint'])) {
		setcookie("hint", "yes", time() + (3600 * 24));
		$_COOKIE['hint'] = "yes";
	}


	# RUN AT START
	# if there is no difficulty set, default
	# $_GET["difficulty"] or "easy"
	if (!isset($_COOKIE["difficulty"])) {
		$mode = isset($_GET["difficulty"]) ? $_GET["difficulty"] : "easy";
		setcookie("difficulty", $mode, time() + (3600 * 24));
		$_COOKIE['difficulty'] = $mode;
	}


	# RUN AT START
	# if there is no current word, pick one
	# from the list
	if (!isset($_COOKIE['word'])) {
		$mode = isset($_GET["difficulty"]) ? $_GET["difficulty"] : "easy";
		$file = fopen("txt/".$mode.".csv", "r");
		$words = fgetcsv($file);
		$word = $words[rand(0, count($words) - 1)];
		fclose($file);
		setcookie("word", $word, time() + (3600 * 24));
		$_COOKIE['word'] = $word;
	}

	# RUN AT START
	# initialise the guesses cookie
	# if its not already set
	if (!isset($_COOKIE['guesses'])) {
		setcookie("guesses", ",", time() + (3600 * 24));
		$_COOKIE['guesses'] = ",";
	}


	# RUN AT START
	# start the player off at the first
	# image in the /images/hangman_stages
	# folder
	if (!isset($_COOKIE['imageIndex'])) {
		setcookie("imageIndex", 1, time() + (3600 * 24));
		$_COOKIE['imageIndex'] = 1;
	}


	if(!isset($_COOKIE['points'])){
		if(strcmp($_COOKIE["difficulty"],"easy") ==0){
			setcookie('points',700);
			$_COOKIE["points"] = 700;
		}
		elseif(strcmp($_COOKIE["difficulty"],"medium") ==0){
			setcookie('points',1000);
			$_COOKIE["points"] = 1000;
		
		}
		elseif(strcmp($_COOKIE["difficulty"],"hard") ==0){
			setcookie('points',1400);
			$_COOKIE["points"] = 1400;
		}
		elseif(strcmp($_COOKIE["difficulty"],"expert") ==0){
			setcookie('points',2000);
			$_COOKIE["points"] = 2000;
		}
	}
}


function resetCookies() {
	setcookie("hint", "", time() - 3600);


	setcookie("difficulty", "", time() - 3600);


	setcookie("guesses", "", time() - 3600);


	setcookie("imageIndex", "", time() - 3600);


	setcookie("points", "", time() - 3600);

}


# This is the function responsible for actually displaying
# the guessed word so far. given a built word, IE:'p-p-r',
# this function displays a series of letters and dashses.
# the special character <0x2007> represents an empty space
# that is not removed by html, creating the effect of 
# several consecutive unguessed characters when needed.
function displayWord() {
	$word = $_COOKIE['word'];
	$guesses = explode(',', $_COOKIE['guesses']);
	$space = "???";
	$line = "";
	$guess = "";
	for ($i = 0; $i < strlen($word); $i++) {
		if (in_array($word[$i], $guesses)) {
			$guess .= $word[$i];
			$line .= '<span class="letter">' . $word[$i] . '</span>';
		} else {
			$line .= '<span class="letter">' . $space . '</span>';
		}
	}

	if ($guess == $word) {
		scoreUpdate();
		resetCookies();
		header("Location: game-over.php?state=win");
	}

	return $line;
}


function giveHint() {
	$chars = str_split($_COOKIE['word']);
	for($i = 0; $i < count($chars); $i++) {
		if (in_array($chars[$i], explode(",",$_COOKIE['guesses']))) {
			array_splice($chars, $i);
		}
	}

	$char = $chars[rand(0, count($chars) - 1)];

	# add current guess to the guesses cookie
	if ($_COOKIE['guesses'] == ",") {
		setcookie('guesses', strtolower($char), time() + (3600 * 24));
		$_COOKIE['guesses'] = strtolower($char);
	} else {
		setcookie('guesses', strtolower($_COOKIE['guesses']) . ',' . $char, time() + (3600 * 24));
		$_COOKIE['guesses'] .= ',' . strtolower($char);
	}
}


# display already guessed letters on two lines
# the first line displays letters a-m 
# the second displays letters n-z
function displayGuessedLetters() {
	$line1 = "";
	$line2 = "";
	$guesses = explode(',', $_COOKIE['guesses']);
	$space = "???";

	# add a-m guesses
	for ($i = ord("a"); $i < ord("a") + 13; $i++) {
		if (in_array(chr($i), $guesses)) {
			$line1 .= '<span class="letter">' . chr($i) . '</span>';
		} else {
			$line1 .= '<span class="letter">' . $space . '</span>';
		}
	}

	# add n-z guesses
	for ($i = ord("n"); $i < ord("n") + 13; $i++) {
		if (in_array(chr($i), $guesses)) {
			$line2 .= '<span class="letter">' . chr($i) . '</span>';
		} else {
			$line2 .= '<span class="letter">' . $space . '</span>';
		}
	}

	# return both lines
	return "<br><span>" . $line1 . "</span>" . "<br><br>" . "<span>" . $line2 ."</span>";
}


function scoreUpdate(){
	$lineNumber = 0;
	$userData = array();
	$file = fopen("./txt/scores.txt", "r");
	if ($file) {
		while (($line = fgets($file)) !== false) {
			$data = explode(",", $line);
			if ($data[0] == $_SESSION['Username']) {
				$userData = $data;
				break;
			}
			$lineNumber++;
		}
		fclose($file);
	}
	if ($_COOKIE['difficulty'] == 'easy') {
		if ($userData[1] == '-') {
			$userData[1] = $_COOKIE['points'];
		} else {
			$userData[1] .= '|' . $_COOKIE['points'];
		}
	}
	elseif($_COOKIE["difficulty"] == "medium"){
		if ($userData[2] == '-') {
			$userData[2] = $_COOKIE['points'];
		} else {
			$userData[2] .= '|' . $_COOKIE['points'];
		}

	}
	elseif($_COOKIE["difficulty"] == "hard"){
		if ($userData[3] == '-') {
			$userData[3] = $_COOKIE['points'];
		} else {
			$userData[3] .= '|' . $_COOKIE['points'];
		}
	}
	else{
		if ($userData[4] == '-') {
			$userData[4] = $_COOKIE['points'];
		} else {
			$userData[4] .= '|' . $_COOKIE['points'];
		}
	}

	# add the new score to users line
	$lines = file("./txt/scores.txt", FILE_IGNORE_NEW_LINES);
	$userData[5] = str_replace("\n", "", $userData[5]);
	$lines[$lineNumber] = implode(",", $userData);
	file_put_contents("./txt/scores.txt", implode("\n", $lines));
}

?>