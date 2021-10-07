<?php
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 25.02.21 ===========*/
/*=========================================*/
require_once('jpic.php');
if(isset($_REQUEST['vid'])) { $vid = $_REQUEST['vid']; } else { $vid = 6; };
$db = InitConn();

if ($vid == 1){
$sql = ("SELECT * FROM projects WHERE pjCat = $vid ORDER BY pjOrder");  
}
else{
$sql = ("SELECT * FROM projects WHERE pjCat = $vid AND id=$vid;");  
};
$stmt = $db->prepare($sql);
$stmt->execute();    
$projects = array();
echo "<div class='projectnav'>";
  foreach ($stmt as $row) {
  $project_id = $row['id'];
  $project_title = $row['pjHeader'];
  $project_desc = $row['pjSubhead'];
  $project_url = $row['pjURL'];
  $project_notes = $row['pjNotes'];
  $display_title = $row['display_title'];
  $j_function = $row['j_function'];
  $pjTiptext = $row['pjTiptext'];
  $but_data = "<a href='#' data-toggle='tooltip' title='" . $pjTiptext . "' onclick='" . $j_function . "' class='button-b' ><p id='pid-title'>" . $display_title . "</p></a>";
  echo $but_data;
  };
echo "</div>";
?>