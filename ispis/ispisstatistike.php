
<table class="table table-striped table-hover">
  <thead>
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Login time</th>
    <th scope="col">Logout time</th>
  </tr>
  </thead>
  <tbody>

<?php 

include_once '../includes/header.inc.php';

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
  $sql = "SELECT * FROM sistemstatistics ORDER BY id DESC";

  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row  = mysqli_fetch_assoc($result)) {
      ?>
      
            <tr>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['LoginDateTime'] ?></td>
              <td><?php echo $row['LogoutDateTime'] ?></td>
              <td></td>          
            </tr> 
           
      
      <?php
    } 
  }
  ?>
  </tbody>
  </table>
