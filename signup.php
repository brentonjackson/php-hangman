<?php session_start(); /* Starts the session */
	// ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
    /* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    
    // Add data to userdata file
    $filename = './txt/userdata.csv';
    // Open the file to get existing content
    $current = file_get_contents($filename);
    // Append a new person to the file
    $current .= PHP_EOL . $Username . "," . $Password;
    // Write the contents back to the file
    echo $current;
    echo "<script>console.log('". json_encode($current) . "')</script>";

    // Make a new file with blank scores for users
    $scorefile= file_get_contents('./txt/scores.txt');
    $scorefile .= PHP_EOL . $Username . ",-,-,-,-";
    file_put_contents('./txt/scores.txt', $scorefile);

    file_put_contents($filename, $current);
    echo "Created user " . $Username;
    header("location:login.php");
		exit;
	}
?>
<?php
  require('common.php');
  head();

?>
<div class="nav-bar">
  <a href="./leaderboard.php">Leaderboard</a>
  <h1>HANGMAN</h1>
  <?php if (isset($_SESSION['username'])) {?>
    <a class="nav-left" href="login.php"><?=$_SESSION["username"]?><br><span>(Sign Out)</span></a>
  <?php } else {?>
    <a class="nav-left" href="login.php">Sign In</a>
  <?php } ?>
</div>
<div class="content">
  <div id="Frame0">
    <h1>PHP Login Script Without Using Database Demo.</h1>
  
  </div>
  <br>
  <form action="" method="post" name="Signup_Form">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
      <?php if(isset($msg)){?>
      <tr>
        <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="2" align="left" valign="top"><h3>Sign Up</h3></td>
      </tr>
      <tr>
        <td align="right" valign="top">Username</td>
        <td><input name="Username" type="text" class="Input"></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input name="Password" type="password" class="Input"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" value="Signup" class="Button3"></td>
      </tr>
    </table>
  </form>
  <span>Already have an account? <a href="./login.php">Log in here</a></span>
</div>
<?php footer(); ?>