<?php
  /*
   * CATCH VARIABLES FROM FORM
   */
  if (array_key_exists('check_submit', $_POST)) {
    $submitted = $_POST["check_submit"];
    $maker = $_POST["Make"];
    //if($name)
      $name = $_POST["Name"];
    $os = $_POST["OS"];
    $res = $_POST["Resolution"];
    $pcam = $_POST["P-camera"];
    $scam = $_POST["S-camera"];
    //$storage = $_POST["Storage"];
    //$memory = $_POST["Memory"];
    $memcard = $_POST["Memcard"];
    $talktime = $_POST["Talktime"];
    $loudspeaker = $_POST["Loudspeaker"];
    $jack = $_POST["Jack"];

    /*
     * DISPLAY USER ENTRIES
     */
    //echo "Submitted: " . $submitted . "<br /><br />";
    echo "<b>Make:</b> {$maker}<br />";
    if($name)
      echo "<b>Name:</b> {$name}<br />";
    echo "<b>OS:</b> {$os}<br />";
    echo "<b>Resolution:</b> {$res}<br />";
    echo "<b>Primary Camera:</b> {$pcam}<br />";
    echo "<b>Secondary Camera:</b> {$scam}<br />";

    //echo "<b>Storage:</b> {$storage}<br />";
    //echo "<b>Memory:</b> {$memory}<br />";

    echo "<b>Mem Card Slot:</b> {$memcard}<br />";
    echo "<b>Talktime:</b> {$talktime}<br />";
    echo "<b>Loudspeaker:</b> {$loudspeaker}<br />";
    echo "<b>3.5mm Jack:</b> {$jack}<br />";
  } else {
    echo "You can't see this page without submitting the form.";
  }

?>
