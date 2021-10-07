<?php
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 25.02.21 ===========*/
/*=========================================*/
require_once('conn.php');

function getAllProjects()
  {
  $db = InitConn();
  $sql = ("SELECT * FROM projects");
  $stmt = $db->prepare($sql);
  $stmt->execute();    
  $projects = array();    
    foreach ($stmt as $row){
      $project_id = $row['id'];
      $project_url = $row['project_url'];
      $projects[$project_id] = ['$project_url'];
    }      
  return $projects;      
  } // END FUNCTION

function validate_User($uname, $upass){
  $e_name = $uname;
  $e_password = $upass; 
  $db = InitConn();
  $sql = ("SELECT * FROM users WHERE email='$e_name'");
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $user_details = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user_details){
    $u_password = $user_details['passw'];
      if ($u_password == $e_password){
        $unid = $user_details['id'];
				setcookie('UNID', $unid, time() + (86400 * 30), "/"); 
				setcookie('LogoutURL', 'https://www.jamespankurst.co.uk', time() + (86400 * 30), "/");
				setcookie('LoggedIn', 'Y', time() + (86400 * 30), "/");
        return $unid;
      }
      else
			{
       	echo 'Password or User Name incorrect';
      }
  $db = null;
	}
	else
	{
  echo 'Password or User Name incorrect';	
	$db = null;
	}
} // END FUNCTION

function getUserDetails($unid){
		$db = InitConn();
		$sql = ("SELECT * FROM users WHERE id='$unid'");
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$user_details = $stmt->fetch(PDO::FETCH_ASSOC);		
		return $user_details;
} // END FUNCTION
?>