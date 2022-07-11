<?php

function updateUserScore() {
	# get line number of user in users.txt
	$lineNumber = 0;
	$userData = array();
	$file = fopen("txt/users.txt", "r");
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

	# append data to corresponding location
	$guesses = explode(",", $_COOKIE['guesses']);
	if ($_COOKIE['difficulty'] == 'easy') {
		if ($userData[1] == '-') {
			$userData[1] = strval(count($guesses));
		} else {
			$userData[1] .= '|' . strval(count($guesses));
		}
	}

	# add the new score to users line
	$lines = file("txt/users.txt", FILE_IGNORE_NEW_LINES);
	$userData[4] = str_replace("\n", "", $userData[4]);
	$lines[$lineNumber] = implode(",", $userData);
	file_put_contents("txt/users.txt", implode("\n", $lines));
}

?>