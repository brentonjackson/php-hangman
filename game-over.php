<?php session_start();
  require('common.php');
  head();
?>
<?php navbar(); ?>
<body>
	<h1 class="game-over-state-text">you <?= $_GET['state']?>!</h1>
</body>
</html>