<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		/* You can change username and associated password array to your pref*/
		$logins = array('Henry' => '123456','username1' => 'password1','username2' => 'password2');
	}
?>
<?php
  require('common.php');
  head();

?>
<body>
<?php navbar(); ?>
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
	   <td>     <tr> Username  => Henry' Password => '123456'     </tr></td>
    </tr>
  </table>
</form>
<?php footer(); ?>