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

// function navbar() {
//     echo "<div class=\"navbar\">";
//     echo "<div class=\"navbar-item home-logo\"><a href=\"./index.php\"><img src=\"./images/favicon/apple-touch-icon.png\" height=\"50px\"></a></div>";
//     echo "<div class=\"navbar-item leaderboard\"><a href=\"./leaderboard.php\">View Leaderboard</a></div>";
//     echo "<div class=\"navbar-item sign-in\">Username/signin/out stuff</div>";
//     echo "</div>";
// }

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

function footer() {
    echo "</body></html>";
}


function getUsername() {
    return "username";
}


?>