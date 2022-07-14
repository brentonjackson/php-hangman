<?php session_start(); /* Starts the session */
// if(!isset($_SESSION['UserData']['Username'])){
// 	header("location:login.php");
// 	exit;
// }
require('common.php');
head();
navbar();
?>        
        


  <div class="content">
    <ul style="padding: 0; width:40%; margin: auto; text-align: left;">
      <li>Leader: Nathan Moné</li>
      <li>Project Name: D3</li>
      <li>Description: A classic hangman game with 4 difficulties and leaderboard for each category.</li>
      <li>Team Member 1: Nathan Moné
        <ul>
          <li>Letter guessing functionality</li>
          <li>Leaderboard user score sorting</li>
          <li>Hangman picture changing</li>
        </ul>
      </li>
      <li>Team Member 2: Jabari Mitchell
        <ul>
          <li>Score Updating System</li>
          <li>Score Sheet Update with New Users</li>
          <li>Difficulty Display</li>
        </ul>
      </li>
      <li>Team Member 3: Brenton Jackson
        <ul>
          <li>Build out views</li>
          <li>User login and signup storage functionality</li>
          <li>Maintain version control</li>
          <li>Refactoring and organization of code into modules</li>
        </ul>
      </li>
    </ul>
  </div>
<? footer(); ?>
