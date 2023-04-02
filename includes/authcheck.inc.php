<?php

  if (!isset($_SESSION['userUid'])) {
    header('location: index.php');
  }

?>