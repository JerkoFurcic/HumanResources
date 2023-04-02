<?php
  include_once 'includes/header.inc.php';
  include_once 'includes/dbh.inc.php';
  $id=$_GET['id'];

  if (isset($_POST["submit"])) {
    $rbr = $_POST["rbr"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $oib = $_POST["oib"];
    $godrod = $_POST["godrod"];
    $strsprema = $_POST["strsprema"];
    $godisk = $_POST["godisk"];
    $katposlova = $_POST["katposlova"];
    $zivotopis = $_POST["zivotopis"];

    $sql = "UPDATE `osoba` SET `redniBr`='$rbr',`ime`='$ime', `prezime`='$prezime',
      `oib`='$oib',`godRod`='$godrod',`strSprema`='$strsprema', `godIsk`='$godisk',
      `katPoslova`='$katposlova',`zivotopis`='$zivotopis' WHERE osobaID=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      header("location: index.php?updated");
    }
    else {
      header("location: index.php?error");
    }
  }      
?>

<?php
  $sql = "SELECT * FROM osoba WHERE osobaID = $id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);  
?>

<div class="container text-center">
<div class="col">
<form action="" method="post">
    <div class="col-sm-4 p-1">
      <input type="text" class="form-control" value="<?php echo $row['redniBr'] ?>" name="rbr" placeholder="Redni broj">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['ime'] ?>" name="ime" placeholder="Ime">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['prezime'] ?>" name="prezime" placeholder="Prezime">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['oib'] ?>" name="oib" placeholder="OIB">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['godRod'] ?>" name="godrod" placeholder="Godina rođenja">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['strSprema'] ?>" name="strsprema" placeholder="Stručna sprema">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['godIsk'] ?>" name="godisk" placeholder="Godina Iskustva">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['katPoslova'] ?>" name="katposlova" placeholder="Kategorije poslova">
    </div>
    <div class="col-sm p-1">
      <input type="text" class="form-control" value="<?php echo $row['zivotopis'] ?>" name="zivotopis" placeholder="Životopis">
    </div>
  </div>
  <div class="vstack gap-2 col-md-3 mx-auto p-2">
    <button type="submit" name="submit" class="btn btn-secondary">Spremi</button>
    <a href="index.php" class="btn btn-outline-secondary">Otkaži</a> 
  </div>
</form>
</div>

  </body>
</html>
