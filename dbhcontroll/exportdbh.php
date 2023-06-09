<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

$tables = array();
$result = mysqli_query($conn, "SHOW TABLES");

while ($row = mysqli_fetch_row($result)) {
  $tables[] = $row[0];
}

$return = '';

foreach ($tables as $table) {
  $result = mysqli_query($conn, "SELECT * FROM ".$table);
  $num_fields = mysqli_num_fields($result);

  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($conn, "SHOW CREATE TABLE ".$table));
  $return .= "\n\n".$row2[1].";\n\n";
  
  for ($i=0; $i < $num_fields; $i++) { 
    while ($row = mysqli_fetch_row($result)) {

      $return .= 'INSERT INTO '.$table.' VALUES(';

      for ($j=0; $j < $num_fields; $j++) { 

        $row[$j] = addslashes($row[$j]);

        if(isset($row[$j])) { $return .= '"'.$row[$j].'"';} else { $return .= '""';}
        if($j<$num_fields-1) { $return .= ', ';} 
      }
      $return .= ");";
    }
  }
  $return .= "";
}

//save file

$handle = fopen('backup.sql', 'w+');
fwrite($handle, $return);
fclose($handle);
echo "Successfuly backed up!";


?>