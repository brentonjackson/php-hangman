<?php


// header
function head() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hang Man</title>";
    echo "<link rel=\"icon\" type=\"image/x-icon\" href=\"./images/favicon/favicon.ico\">";
    echo "<link href=\"./hangman.css\" rel=\"stylesheet\"/></head>";
    echo "<body>";
}

function navbar() {
    echo "<div class=\"navbar\">";
    echo "<div class=\"navbar-item home-logo\"><a href=\"./index.php\"><img src=\"./images/favicon/apple-touch-icon.png\" height=\"50px\"></a></div>";
    echo "<div class=\"navbar-item leaderboard\"><a href=\"./leaderboard.php\">View Leaderboard</a></div>";
    echo "<div class=\"navbar-item sign-in\">Username/signin/out stuff</div>";
    echo "</div>";
}

function footer() {
    echo "<div class=\"footer\">";
    echo "© [Web Group Name] 2022";
    echo "</div></body></html>";
}


?>