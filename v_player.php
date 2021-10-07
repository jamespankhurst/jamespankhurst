<?php 
/*=========================================*/
/*=== SITE: JPIC - JAMESPANKHURST.CO.UK ===*/
/*=========== Ver 1.0: 25.02.21 ===========*/
/*=========================================*/
require_once('jpic.php');
if(isset($_REQUEST['vid'])) { $vid = $_REQUEST['vid']; } else { $vid = 1; };

  $db = initConn();
  $sql = ("SELECT * FROM projects WHERE id=$vid");
  $stmt = $db->prepare($sql);
  $stmt->execute();    
    foreach ($stmt as $row){
      $pjid = $row['id'];
      $pjURL = $row['pjURL'];
      $pjDisplaytitle = $row['display_title'];
      $pjHeader = $row['pjHeader']; 
      $pjSubhead = $row['pjSubhead']; 
      $pjDetails = $row['pjDetails'];
      $pjNotes = $row['pjNotes']; 
      $pjTiptext = $row['pjTiptext'];
    };
    
  $db = null;  
  
 echo   "<html><head><script src='js/jpic.js'></script></head><body>"; 
  
 echo   "<div class='v_player-container'>";
  
 echo   "<div class='v_player'><iframe id='ifvp' style='height:100%;width:100%;border:none;' src='" . $pjURL . "' frameborder='0' allowfullscreen='false'></iframe></div>";
  
 echo   "<div class='v_info'>";
   
 echo   "<div id='info-container'>";
  
 echo   "<div id='info-title'><a href='#' id='title-tiptext' data-toggle='tooltip' title='" . $pjTiptext . "'>" . $pjDisplaytitle . "</a></div>";
  
 echo   "<div id='info-header'><a href='#' id='title-tiptext' data-toggle='tooltip' title='" . $pjTiptext . "'>" . $pjHeader . "</a></div>";
  
 echo   "<div id='info-subhead'><a href='#' id='title-tiptext' data-toggle='tooltip' title='" . $pjTiptext . "'>" . $pjSubhead . "</a></div>";
  
 echo   "<div id='info-details'><a href='#' id='title-tiptext' data-toggle='tooltip' title='" . $pjTiptext . "'>" . $pjDetails . "</a></div>";
 
 echo   "<div id='info-notes'><a href='#' id='title-tiptext' data-toggle='tooltip' title='" . $pjTiptext . "'>" . $pjNotes . "</a></div>";
      
 echo   "</div>"; //info-container
 echo   "</div>"; //v-info
 echo   "</div>"; //v-player 
 echo   "</body></html>";
  ?>