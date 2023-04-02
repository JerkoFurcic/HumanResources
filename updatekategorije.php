<?php
  include_once 'includes/header.inc.php';
  include_once 'includes/dbh.inc.php';
  $id=$_GET['id'];

  if (isset($_POST["submit"])) {

    $katposlova = $_POST["katposlova"];

      $sql = "UPDATE `kategorije` SET `nazivKategorije`='$katposlova' WHERE kategorijaID=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("location: tablice.php?updated");
    }
    else {
      header("location: tablice.php?error");
    }
  }      
?>

<?php
  $sql = "SELECT * FROM kategorije WHERE kategorijaID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);  
?>

<div class="container text-center">
<div class="col">
<form action="" method="post">
      <input type="text" class="form-control" value="<?php echo $row['nazivKategorije'] ?>" name="katposlova" placeholder="Kategorije poslova">
  <div class="vstack gap-2 col-md-3 mx-auto p-2">
    <button type="submit" name="submit" class="btn btn-secondary">Spremi</button>
    <a href="index.php" class="btn btn-outline-secondary">Otkaži</a> 
  </div>
</form>
</div>

  </body>
</html>
