<?php
  $easy = array();
  $medium = array();
  $hard = array();
  $expert = array();

  $file = fopen("txt/scores.txt", "r");
  if ($file) {
    while (($line = fgets($file)) !== false) {
      $data = explode(",", $line);
      if ($data[1] != "-") {
        $scores = explode("|", $data[1]);
        $avg = array_sum($scores)/count($scores);
        array_push($easy, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[2] != "-") {
        $scores = explode("|", $data[2]);
        $avg = array_sum($scores)/count($scores);
        array_push($medium, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[3] != "-") {
        $scores = explode("|", $data[3]);
        $avg = array_sum($scores)/count($scores);
        array_push($hard, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[4] != "-") {
        $scores = explode("|", $data[4]);
        $avg = array_sum($scores)/count($scores);
        array_push($expert, array('name' => $data[0], 'score' => $avg));
      }
    }
  }
  fclose($file);

  function sortByScore($a, $b) {
    return intval($b['score']) <=> intval($a['score']);
  }

  function listScores($array) {
    usort($array, 'sortByScore');
    foreach($array as $value) {
      echo('<li>'. $value['name'] .' : <b>'. intval($value['score']) .'</b></li>');
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Leaderboards</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <?php include("gameLogic.php"); ?>
  <?php include("common.php"); ?>
</head>
<body class="game-body">
  <div class="nav-bar">
    <a href="index.php">Home</a>
    <h1>HANGMAN</h1>
    <?php if (isset($_SESSION['Username'])) {?>
      <a class="nav-left" href="login.php"><?=$_SESSION["Username"]?><span> (Sign Out)</span></a>
    <?php } else {?>
      <a class="nav-left" href="login.php">Sign In</a>
    <?php } ?>
  </div>
  <div class="leader-columns">
    <div class="column">
      <h2 class="easy">EASY</h2>
      <ul>
        <?php listScores($easy);?>
      </ul>
    </div>

    <div class="column">
      <h2 class="medium">MEDIUM</h2>
      <ul>
        <?php listScores($medium);?>
      </ul>
    </div>

    <div class="column">
      <h2 class="hard">HARD</h2>
      <ul>
        <?php listScores($hard);?>
      </ul>
    </div>

    <div class="column">
      <h2 class="expert">EXPERT</h2>
      <ul>
        <?php listScores($expert);?>
      </ul>
    </div>
  </div>
</body>
</html>