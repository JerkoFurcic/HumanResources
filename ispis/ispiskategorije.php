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
        <td>
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="updatekategorije.php?id=<?php echo $row['kategorijaID'] ?>" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
            <a href="includes/delete.inc.php?id=<?php echo $row['kategorijaID'] ?>" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
          </div>
        </td>          
      </tr> 
      <?php
    } 
  }
?>