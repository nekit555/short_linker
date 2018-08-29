<?php
  require_once "functions/linker.php";

  if ( isset($_GET['link']) ) {

    $operation = new Linker();

    $short_link = $_GET['link'];

    if ( $url = $operation->getUrl($short_link) ) {

      header("Location: $url");

      exit();

    }

  }

  header('Location: index.php');
?>