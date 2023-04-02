<?php 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
  $sql = "SELECT * FROM kategorije";
   
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row  = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row['kategorijaID'] ?></td>
        <td><?php echo $row['nazivKategorije'] ?></td>
      </tr> 
      <?php
    } 
  }
?>