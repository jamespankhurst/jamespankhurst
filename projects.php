<?php
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 02.03.21 ===========*/
/*=========================================*/

require_once('jpic.php');

if(isset($_REQUEST['pid'])) { 
$pid = $_REQUEST['pid']; 
} else { 
$pid = 6; 
};

$pjHeaders = array();
$pjIds = array();

$db = initConn();
//$sql = ("SELECT * FROM projects WHERE id=$pid");
$sql = ("SELECT * FROM projects");
$stmt = $db->prepare($sql);
  $stmt->execute();    
  $x = 0;
    foreach ($stmt as $row){
      $pjIds[$x] = $row ['id'];
      $pjHeaders[$x] = $row['pjHeader'];
      $x++;
    };
$db = null;
    
$myJSON = json_encode($pjHeaders);
echo $myJSON;


?>