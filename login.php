<?php 
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 25.02.21 ===========*/
/*=========================================*/

require_once('jpic.php');

if (isset($_COOKIE['UNID'])){
$uid = $_COOKIE['UNID'];
$header_url = "dashboard.php?uid=$uid";
header("Location: $header_url");
}
else{
    if(isset($_POST['usrname']) && isset($_POST['psw'])){
    
		  $e_name = $_POST['usrname'];
 	    $e_password = $_POST['psw']; 
      
		  $user_ID = validate_User($e_name, $e_password);
      
		  $user_details = getUserDetails($user_ID);
      
      //$header_url = "dashboard.php?uid=$user_ID";
      //$header_url = "../AA_STUDIO/dashboard.php?uid=$user_ID";
      $header_url = "../index.html";
      header("Location: $header_url");
		}
};
?>
<html>
  <head>
      <link rel="stylesheet" href="jap_css.css" />
      <script src="jap_js.js"></script>
    </head>
<body>
  <div class='loading-bar'>
    <div id='loading-needle'></div>
  </div>
    <form id="std-form" method='post' action="login.php">
      <h2>Login</h2>
        User Name:<br /><input type='text' name='user_name'></input>
        <br />
        Password:<br /><input type='password' name='user_password'></input>
        <br />
        <input type='submit' value='submit'></input>
      </form>
</body>
</html>