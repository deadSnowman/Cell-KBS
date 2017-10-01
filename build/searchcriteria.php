<?php
  if($maker != 'donotsearch')
    if(SUBSTR($sql, -5) == "WHERE")
      $sql.=" maker = \"{$maker}\"";
    else
      $sql.=" AND maker = \"{$maker}\"";
  if($os != 'donotsearch')
    if(SUBSTR($sql, -5) == "WHERE")
      $sql.=" os LIKE '%{$os}%'";
    else
      $sql.=" AND os LIKE '%{$os}%'";
  if($res != 'donotsearch')
    if(SUBSTR($sql, -5) == "WHERE")
      $sql.=" resolution LIKE '%{$res}%'";
    else
      $sql.=" AND resolution LIKE '%{$res}%'";

  if($pcam != 'donotsearch') {
    if(SUBSTR($sql, -5) == "WHERE") {
      if($pcam == 'NULL')
        $sql.=" primary_camera = 'NULL'";
      elseif($pcam != 'NULL' AND $pcam != 'Other')
        $sql.=" (primary_camera LIKE '%{$pcam}%')";
      elseif($pcam == 'Other')
        $sql.=" (primary_camera NOT LIKE '%_MP%' AND primary_camera Not LIKE '%_ MP%' AND primary_camera NOT LIKE 'VGA%' AND primary_camera NOT LIKE 'CIF%' AND primary_camera NOT LIKE 'QVGA%' AND primary_camera != 'NULL')";
    } else {
      if($pcam == 'NULL')
        $sql.=" AND primary_camera = 'NULL'";
      elseif($pcam != 'NULL' AND $pcam != 'Other')
        $sql.=" AND (primary_camera LIKE '%{$pcam}%')";
      elseif($pcam == 'Other')
        $sql.=" AND (primary_camera NOT LIKE '%_MP%' AND primary_camera Not LIKE '%_ MP%' AND primary_camera NOT LIKE 'VGA%' AND primary_camera NOT LIKE 'CIF%' AND primary_camera NOT LIKE 'QVGA%' AND primary_camera != 'NULL')";
    }
  }

  if($scam != 'donotsearch') {
    if($scam == 'Yes') {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql.=" (secondary_camera NOT LIKE '%No%' AND secondary_camera != 'NULL')";
      else
        $sql.=" AND (secondary_camera NOT LIKE '%No%' AND secondary_camera != 'NULL')";
    } else {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql.=" (secondary_camera LIKE '%No%' OR secondary_camera = 'NULL')";
      else
        $sql.=" AND (secondary_camera LIKE '%No%' OR secondary_camera = 'NULL')";
    }
  }

  if($memcard != 'donotsearch') {
    if($memcard == 'Yes') {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql.=" mem_card_slot != 'No'";
      else
        $sql.=" AND mem_card_slot != 'No'";
    } else {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql.=" mem_card_slot = 'No'";
      else
        $sql.=" AND mem_card_slot = 'No'";
    }
  }


  if($talktime != 'donotsearch') {
    if($talktime != 'Other') {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " (talktime LIKE '%{$talktime}%' OR talktime LIKE '%".SUBSTR($talktime,0,-2)."h%')";
      else
        $sql .= " AND (talktime LIKE '%{$talktime}%' OR talktime LIKE '%".SUBSTR($talktime,0,-2)."h%')";
    } else {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " talktime NOT LIKE '%_ h%' OR talktime NOT LIKE '%_h%'";
      else
        $sql .= " AND talktime NOT LIKE '%_ h%' OR talktime NOT LIKE '%_h%'";
    }
  }

  if($loudspeaker != 'donotsearch') {
    if($loudspeaker == 'Yes') {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " loudspeaker != 'No'";
      else
        $sql .= " AND loudspeaker != 'No'";
    } else {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " loudspeaker = 'No'";
      else
        $sql .= " AND loudspeaker = 'No'";
    }
  }

  if($jack != 'donotsearch') {
    if($jack == 'Yes') {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " (jack NOT LIKE '%No%' AND jack != 'NULL')";
      else
        $sql .= " AND (jack NOT LIKE '%No%' AND jack != 'NULL')";
    } else {
      if(SUBSTR($sql, -5) == "WHERE")
        $sql .= " (jack LIKE '%No%' OR jack = 'NULL')";
      else
        $sql .= " AND (jack LIKE '%No%' OR jack = 'NULL')";
    }
  }
?>
