<?php


// header
function head() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hangman</title>";
    echo "<link rel=\"icon\" type=\"image/x-icon\" href=\"./images/favicon/favicon.ico\">";
    echo "<link href=\"./index.css\" rel=\"stylesheet\"/></head>";
     // echo "<body>";
}
function head_unfinished() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hangman</title>";
    echo "<link rel=\"icon\" type=\"image/x-icon\" href=\"./images/favicon/favicon.ico\">";
    echo "<link href=\"./index.css\" rel=\"stylesheet\"/>";
    // echo "<body>";
}

function navbar() {
    echo "<div class=\"navbar\">";
    echo "<div class=\"navbar-item home-logo\"><a href=\"./index.php\"><img src=\"./images/favicon/apple-touch-icon.png\" height=\"50px\"></a></div>";
    echo "<div class=\"navbar-item leaderboard\"><a href=\"./leaderboard.php\">View Leaderboard</a></div>";
    echo "<div class=\"navbar-item sign-in\">Username/signin/out stuff</div>";
    echo "</div>";
}

function game_navbar() {
    echo "<div class=\"nav-bar\">
    
    <a href=\"./index.php\"><img src=\"./images/favicon/apple-touch-icon.png\" height=\"50px\"></a>
    <a href=\"./leaderboard.php\">Leaderboard</a>
    <h1>HANGMAN</h1>
    <a class=\"nav-left\" href=\"./login.php\"><?php echo getUsername();?></a>
</div>";
}

function footer() {
    echo "<div class=\"footer\">";
    echo "© [Web Group Name] 2022";
    echo "</div></body></html>";
}


?>