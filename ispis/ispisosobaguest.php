
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <?php
   
    for ($i=2010; $i < 2024; $i++) {
      echo "<li><a class='dropdown-item' href='index.php?god=$i'>$i</a></li>";
    } 

    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "loginsistem";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
      

    $god=$_GET['god'];

  if (isset($_GET['god'])) {
      
    $sql = "SELECT * FROM osoba WHERE godRod LIKE '$god'";
      
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
        </tr> 
        <?php
      } 
    }
  }
    
    ?>
  </ul>
</div>

<?php 


?>