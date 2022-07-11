<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hangman</title>
  <?php require('common.php');?>
  <link rel="icon" type="image/x-icon" href="./images/favicon/favicon.ico">
  <link href="./index.css" rel="stylesheet"/>
</head>
<body class="game-body">
  <div class="nav-bar">
    <a href="index.php">Home</a>
    <a href="./leaderboard.php">Leaderboard</a>
    <h1>HANGMAN</h1>
    <?php if (isset($_SESSION['Username'])) {?>
      <a class="nav-left" href="login.php"><?=$_SESSION["Username"]?><span> (Sign Out)</span></a>
    <?php } else {?>
      <a class="nav-left" href="login.php">Sign In</a>
    <?php } ?>
  </div>
    <div class="content">
    <h1 class="level-picker-title">Level Picker</h1>
    <div class="levels">
    <form action="game.php" method="get" name="Levels_Form">
        <input class="level-button" type="submit" name="difficulty" value="easy">
        <input class="level-button" type="submit" name="difficulty" value="medium">
        <input class="level-button" type="submit" name="difficulty" value="hard">
        <input class="level-button" type="submit" name="difficulty" value="expert">
    </form>
    </div>
  </div>
</body>