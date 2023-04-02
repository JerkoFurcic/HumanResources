<?php 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
  $sql = "SELECT * FROM osoba";
  
  if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $sql .= " WHERE redniBr LIKE '{$input}%' OR ime LIKE '{$input}%' OR prezime LIKE '{$input}%'
    OR oib LIKE '{$input}%' OR godRod LIKE '{$input}%' OR strSprema LIKE '{$input}%'  OR godIsk LIKE '{$input}%'
    OR katPoslova LIKE '{$input}%' OR zivotopis LIKE '{$input}%'";
  }   

  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row  = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $row['redniBr'] ?></td>
        <td><?php echo $row['ime'] ?></td>
        <td><?php echo $row['prezime'] ?></td>
        <td><?php echo $row['oib'] ?></td>
        <td><?php echo $row['godRod'] ?></td>
        <td><?php echo $row['strSprema'] ?></td>
        <td><?php echo $row['godIsk'] ?></td>
        <td><?php echo $row['katPoslova'] ?></td>
        <td><?php echo $row['zivotopis'] ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="update.inc.php?id=<?php echo $row['osobaID'] ?>" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
            <a href="includes/delete.inc.php?id=<?php echo $row['osobaID'] ?>" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
          </div>
        </td>          
      </tr> 
      <?php
    } 
  }
?>