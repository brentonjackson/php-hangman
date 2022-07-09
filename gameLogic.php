<?php
# BUTTON 
# run this code when the "guess_submit"
# button is pressed
if(isset($_POST["guess_submit"])) {
	addGuess();
	buildWord();
	if (strpos($_COOKIE['word'], $_POST['guess']) === false) {
		nextImage();
	}
}


# reads and validates the users guess and 
# adds it to the guesses cookie. 
function addGuess() {
	if ($_POST['guess'] == $_COOKIE['word']) {
		header("Location: gameOver.php?state=win");
	}
	if ($_COOKIE['guesses'] == ",") {
		setcookie('guesses', $_POST['guess'], time() + (3600 * 24));
		$_COOKIE['guesses'] = $_POST['guess'];
	} else {
		setcookie('guesses', $_COOKIE['guesses'] . ',' . $_POST['guess'], time() + (3600 * 24));
		$_COOKIE['guesses'] .= ',' . $_POST['guess'];
	}
}


# this increments the image displayed
function nextImage() {
	# increment cookie data
	setcookie('imageIndex', $_COOKIE['imageIndex'] + 1, time() + (3600 * 24));

	# increment variable being used
	$_COOKIE['imageIndex']++;

	# if more than 7 bad guesses were made
	# terminate game
	if ($_COOKIE['imageIndex'] > 7) {
		header("Location: gameOver.php?state=lost");
	}
}



# RAN AT START
# sets important cookies if they are not set
# yet. sets the corresponding variables to be used
function loadCookies() {
	# RUN AT START
	# if there is no current word, pick one
	# from the list
	if (!isset($_COOKIE['word'])) {
		$file = fopen("txt/easy.csv", "r");
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
}


# called from buildWord(). given an index of a words
# letter, this function checks to see if that letter
# has been guessed yet, if so return it, if not return '-'.
function getLetter($index) {
	$letter = "-";
	$guesses = explode(',', $_COOKIE['guesses']);
	for ($i = 0; $i < count($guesses); $i++) {
		if ($guesses[$i] == $_COOKIE['word'][$index]) {
			$letter = $guesses[$i];
		}
	}
	return $letter;
}


# called each time the guess submit button is activated.
# checks each character to see if its been guessed yet,
# and builds the corresponding word.
# EX: if the word is "paper" and guesses made is "p,r",
# the built word would be "p-p-r". this is returned as a 
# $_GET variable.
function buildWord() {
	$word = "";
	for ($i = 0; $i < strlen($_COOKIE['word']); $i++) {
		$word .= getLetter($i);
	}
	header('Location: game.php?word='.$word);
}


# This is the function responsible for actually displaying
# the guessed word so far. given a built word, IE:'p-p-r',
# this function displays a series of letters and dashses.
# the special character <0x2007> represents an empty space
# that is not removed by html, creating the effect of 
# several consecutive unguessed characters when needed.
function displayWord($word) {
	if ($word == $_COOKIE['word']) {
		header("Location: gameOver.php?state=win");
	}
	for ($i = 0; $i < strlen($word); $i++) {
		if ($word[$i] == '-') {
			echo '<span class=letter>' . " " . '</span>';
		} else {
			echo '<span class=letter>' . $word[$i] . '</span>';
		}
	}
}
?>