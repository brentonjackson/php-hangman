<?php


// header
function head() {
    echo "<!DOCTYPE html><html><head><meta charset=\"utf-8\" />";
    echo "<title>Hang Man</title>";
    echo "<link href=\"./hangman.css\" rel=\"stylesheet\"/></head>";
    echo "<body>";
}

function navbar() {
    echo "<div class=\"navbar\">";
    echo "<div class=\"navbar-item\">Logo Image/homepage link</div>";
    echo "<div class=\"navbar-item\">Leaderboard button</div>";
    echo "<div class=\"navbar-item\">Username/signin/out stuff</div>";
    echo "</div>";
}

function footer() {
    echo "<div class=\"footer\">";
    echo "© [Web Group Name] 2022";
    echo "</div></body></html>";
}


?>