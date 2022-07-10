<?php session_start(); /* Starts the session */
	
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		
    /* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
    /* Define username and associated password array */
		/* You can change username and associated password array to your pref*/
		// $logins = array('Henry' => '123456','username1' => 'password1','username2' => 'password2');

    // Create logins associative array of type 
    // (Username1 => Password1, Username2 => Password2, ect... )

    
    $filename = './txt/userdata.csv';
    $handle = fopen($filename, "r");
    $num = 1;
    $logins = array();
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
          // add line to associative array
          $num = $num + 1;
          $data = explode(",", $line);
          $logins[$data[0]] = $data[1];
      }
      fclose($handle);
    }

		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && strcmp($logins[$Username],$Password)){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['Username']=$Username;
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
<?php
  require('common.php');
  head();
?>
<?php navbar(); ?>
<div class="content">
  <div id="Frame0">
    <h1>PHP Login Script Without Using Database Demo.</h1>
  
  </div>
  <br>
  <form action="" method="post" name="Login_Form">
    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
      <?php if(isset($msg)){?>
      <tr>
        <td colspan="2" align="center" valign="top"><?php echo $msg; echo " " . $Username . " not recognized";?></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
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
        <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
       <td>     <tr> Username  => Henry' Password => '123456'     </tr></td>
      </tr>
    </table>
  </form>
</div>
<?php footer(); ?>