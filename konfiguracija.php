<?php
  include_once 'includes/header.inc.php';
  include_once 'includes/dbh.inc.php';
  require_once 'konfigsustava.inc.php';

  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('https/AdministracijaLPv2/konfiguracija.php');}
?>

<br>
<div class="container text-center">
<div class="col">
<form action="konfigsustava.inc.php" method="post">
  <label for="floatingInput">Page number</label> 
  <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" id="page" name="page" value="<?php echo $pagination?>" placeholder="Pages"><br>
  <label for="floatingInput">Cookie time</label>
  <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" id="cookietime" name="cookietime" value="<?php echo $cookie?>" placeholder="Cookies"><br>
       
  <div class="vstack gap-2 col-md-3 mx-auto p-2">
    <button type="submit" name="submit" class="btn btn-secondary">Spremi</button>
    <a href="adminpage.php" class="btn btn-outline-secondary">Otkaži</a> 
  </div>
</form>
  </div>