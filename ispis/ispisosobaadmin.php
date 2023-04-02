<?php 
require_once './includes/functions.inc.php';

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsistem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  $numPerPage = getPageNumber($conn);

  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } 
  else {
      $page = 1;
  }

  $startFrom = ($page - 1) * $numPerPage;

  $sql = "SELECT * FROM osoba LIMIT $startFrom, $numPerPage";

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

  $sql = "SELECT * FROM osoba";
  $result = mysqli_query($conn, $sql);

  $totalRecords = mysqli_num_rows($result);
  $total_pages = ceil($totalRecords / $numPerPage);

  echo  '<nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="adminpage.php?page=1" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>';
          for ($i=1; $i <= $total_pages; $i++) { 
            echo "<li class='page-item'><a class='page-link' href='adminpage.php?page=".$i."'>$i</a></li>";
          }
          
	echo        '<li class="page-item">
						<a class="page-link" href="adminpage.php?page='.$total_pages.'" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav> ';
?>