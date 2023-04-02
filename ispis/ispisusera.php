<?php
//ispis usera i stranicanje

	require_once 'includes/dbh.inc.php';
	
	if(isset($_GET['pageNo'])){
		$page = $_GET['pageNo'];
	} 
	else {
		$page = 1;
	}

	$per_page = 05;
	$startFrom = ($page - 1)*05;

	$sql = "SELECT * FROM users LIMIT $startFrom, $per_page";

  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row  = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['userID'] ?></td>
					<td><?php echo $row['userName'] ?></td>
					<td><?php echo $row['userEmail'] ?></td>
					<td><?php echo $row['userUid'] ?></td>
					<td><?php echo $row['dateTime'] ?></td>
					<td><?php echo $row['userStatus'] ?></td>
					<td>
					<div class="btn-group" role="group" aria-label="Basic outlined example">
						<button class="btn btn-success" value="1" onclick="activeInactive(this.value, <?php echo $row['userID'] ?>)"><i class="bi bi-unlock"></i></button>  
						<button class="btn btn-warning" value="0" onclick="activeInactive(this.value, <?php echo $row['userID'] ?>)"><i class="bi bi-lock-fill"></i></button>	
						<a href="includes/delete.inc.php?id=<?php echo $row['userID'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
					</div>
					</td>
				</tr> 
			<?php
		} 
  }

	$pr_sql = "SELECT * FROM users ";
  $pr_result = mysqli_query($conn, $pr_sql);
  $totalRecord = mysqli_num_rows($pr_result);
	$total_pages = ceil($totalRecord/$per_page);

echo  '<nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="adminpage.php?pageNo=1" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>';
          for ($i=1; $i <= $total_pages; $i++) { 
            echo "<li class='page-item'><a class='page-link' href='adminpage.php?pageNo=".$i."'>$i</a></li>";
          }
          
	echo        '<li class="page-item">
						<a class="page-link" href="adminpage.php?pageNo='.$total_pages.'" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav> ';

?>



	


		

		


		
