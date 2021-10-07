<?php
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 02.03.21 ===========*/
/*=========================================*/

require_once('jpic.php');

header('Content-Type: application/json; charset=UTF-8');

// JSON Stringify x = { "cat": "web", "pid": 2 "uid": 1}

$obj = json_decode($_GET['x'], false);

$pid = $obj->pid;
$cat = $obj->cat;
$uid = $obj->uid;

$pjHeaders = array();
$pjIds = array();

$db = initConn();
$sql = ('SELECT * FROM projects');
$stmt = $db->prepare($sql);
  $stmt->execute();    
  $x = 0;
    foreach ($stmt as $row){
      $pjIds[$x] = $row ['id'];
      $pjHeaders[$x] = $row['pjHeader'];
      $x++;
    };

echo 'projectList('.json_encode($pjIds).')';

$db = null;

?>