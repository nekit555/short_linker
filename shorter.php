<?php

  require_once "functions/linker.php";

  $operation = new Linker();

  if ( isset($_POST['url']) ) {

   $url = $_POST['url'];

   if ( $short_link = $operation->createLink($url) ) {

    $url = array('short_link' => $short_link);
    echo json_encode($url);

   } else {

    $url = array('error' => '1');
    echo json_encode($url);

   }

  }