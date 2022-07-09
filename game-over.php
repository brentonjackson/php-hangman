<?php
  require('common.php');
  head();
?>
<body class="game-body">
<?php navbar(); ?>
<body>
	<h1 class="game-over-state-text">you <?= $_GET['state']?>!</h1>
</body>
</html>