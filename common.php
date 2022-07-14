<?php


// header
function head() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hangman</title>";
    echo "<link rel=\"icon\" type=\"image/x-icon\" href=\"./images/favicon/favicon.ico\">";
    echo "<link href=\"./index.css\" rel=\"stylesheet\"/></head>";
    echo "<body class=\"game-body\">";
}
function head_unfinished() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hangman</title>";
    echo "<link rel=\"icon\" type=\"image/x-icon\" href=\"./images/favicon/favicon.ico\">";
    echo "<link href=\"./index.css\" rel=\"stylesheet\"/>";
    // echo "<body>";
}

function navbar() {
    echo "<div class=\"nav-bar\"><a href=\"index.php\">Home</a>
    <a href=\"./leaderboard.php\">Leaderboard</a>
    <h1>HANGMAN</h1>";
    if (isset($_SESSION['Username'])) {
        echo "<a class=\"nav-left username\" href=\"./login.php\">";
        echo $_SESSION['Username'];
        echo "<br><span> (Sign Out)</span>";
    } else {
        echo "<a class=\"nav-left\" href=\"./login.php\">";
        echo "Sign In";
    }
    
    echo "</a></div>";
}
function homepage_navbar() {
    echo "<div class=\"nav-bar\"><a href=\"./summary.php\">Summary</a>
    <a href=\"./leaderboard.php\">Leaderboard</a>
    <h1>HANGMAN</h1>";
    getUsername();
    echo "</div>";
}

function footer() {
    echo "</body></html>";
}


function getUsername() {
    if (isset($_SESSION['Username'])) {
        echo "<a class=\"nav-left username\" href=\"./login.php\">";
        echo $_SESSION['Username'];
        echo "<br><span> (Sign Out)</span></a>";
    } else {
        echo "<a class=\"nav-left\" href=\"./login.php\">";
        echo "Sign In</a>";
    }
}


?>