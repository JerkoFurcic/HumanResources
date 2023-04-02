<?php
  require_once 'includes/dbh.inc.php';

  $sql = "SELECT	ime, prezime, godRod, strSprema, zivotopis FROM	osoba";
  
  $result = $conn->query($sql);
  while ($row = $result->fetch_array()) {
      print $row['ime'] . ', ' . $row['prezime'] . ', ' . $row['godRod'] . ', ' . $row['strSprema'] . ', ' . $row['zivotopis'] . '<br>';
  }
  $result->close();
?>