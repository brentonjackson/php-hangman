<?php session_start();
  $easy = array();
  $medium = array();
  $hard = array();
  $expert = array();

  $file = fopen("txt/scores.txt", "r");
  if ($file) {
    while (($line = fgets($file)) !== false) {
      $data = explode(",", $line);
      if ($data[2] != "-") {
        $scores = explode("|", $data[2]);
        $avg = array_sum($scores)/count($scores);
        array_push($easy, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[3] != "-") {
        $scores = explode("|", $data[3]);
        $avg = array_sum($scores)/count($scores);
        array_push($medium, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[4] != "-") {
        $scores = explode("|", $data[4]);
        $avg = array_sum($scores)/count($scores);
        array_push($hard, array('name' => $data[0], 'score' => $avg));
      }

      if ($data[5] != "-") {
        $scores = explode("|", $data[5]);
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

<?php
  require('common.php');
  require('gameLogic.php');
  head();
  navbar();
?>

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
<? footer() ?>