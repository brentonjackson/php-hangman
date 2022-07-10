<?php session_start();
$file = fopen("txt/users.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        $user = explode(",", $line);
    }
}

fclose($file);
require('gameLogic.php');
require('common.php');
head();
navbar();
?>



<div class="content">
    <div class="leader-columns">
        <div class="column">
          <h2 class="easy">EASY</h2>
          <ul>
            <li>user1</li>
            <li>user2</li>
            <li>user3</li>
          </ul>
        </div>
        <div class="column">
          <h2 class="medium">MEDIUM</h2>
          <ul>
            <li>user2</li>
            <li>user1</li>
            <li>user3</li>
          </ul>
        </div>
        <div class="column">
          <h2 class="hard">HARD</h2>
          <ul>
            <li>user3</li>
            <li>user2</li>
            <li>user1</li>
          </ul>
        </div>
        <div class="column">
          <h2 class="expert">EXPERT</h2>
          <ul>
            <li>user3</li>
            <li>user1</li>
            <li>user2</li>
          </ul>
        </div>
    </div>
</div>
<? footer() ?>