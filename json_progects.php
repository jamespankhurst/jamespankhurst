<?php 

/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 02.03.21 ===========*/
/*=========================================*/

require_once('jpic.php');

class Project { 
    public $id, $uid, $pjHeader, $pjURL, $pjCat, $pjOrder, $j_function, $display_title, $pjSubhead, $pjDetails, $pjNotes, $pjTiptext;      
};

$db = initConn();

$pj = new Project;

$sql = "SELECT * FROM projects";
$stmt = $db->prepare($sql);
$stmt->execute();

foreach ($stmt as $row){
      $pj->id = $row['id'];
      $pj->uid = $row['uid'];
      $pj->pjHeader = $row['pjHeader'];
      $pj->pjURL = $row['pjURL'];
      $pj->pjCat = $row['pjCat'];
      $pj->pjOrder = $row['pjOrder'];
      $pj->j_function = $row['j_function'];
      $pj->display_title = $row['display_title'];
      $pj->pjSubhead = $row['pjSubhead']; 
      $pj->pjDetails = $row['pjDetails'];
      $pj->pjNotes = $row['pjNotes']; 
      $pj->pjTiptext = $row['pjTiptext'];      
      };
      
$pjJSON = json_encode($pj);

echo ($pjJSON);

$db = null;

?>