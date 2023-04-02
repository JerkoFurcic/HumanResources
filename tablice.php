<?php
  include_once 'includes/header.inc.php';
  require_once 'includes/authcheck.inc.php';
  include_once 'includes/dbh.inc.php';

  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('https/AdministracijaLPv2/tablice.php');}
  

  if ($_POST) {
    function getCaptcha($secretkey) {
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc03QIkAAAAAIzovIcas7wotRJMUrY2_BvLI9G_&response={$secretkey}");
      $return = json_decode($response);
      return $return;
    }
    $return = getCaptcha($_POST['g-recaptcha-response']);
    if ($return->success == true && $return->score > 0.5) {
      echo "Succes!";
    } else {
      echo "Robot!";
    }
  }
?>

<div class="container m-0">
<div class="row row-cols-2">
  <div class="col p-0">   
    <!-- Button trigger modal -->    
    <button type="button" class="w-30 m-3 btn btn-lg btn-secondary" data-bs-toggle="modal" data-bs-target="#kategorijeModal">
      Dodaj kategoriju 
    </button>
    <!-- Modal -->
    <div class="modal fade" id="kategorijeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Unesite kategoriju</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="includes/insertkategorije.inc.php" method="post">
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="kategorije" placeholder="Naziv kategorije">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
            <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
          </div>
          </form>         
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <!-- <img class="img-fluid" src="https://hr-vjesnik.hr/wp-content/uploads/2020/04/Bez-naslova-9.png" alt=""> -->
  </div>
  <div class="col">
  <table class="table table-striped table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Naziv kategorija</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
      <?php include 'ispis/ispiskategorije.php'; ?>
    </tbody>
  </table>
  </div>
</div>
</div>

<div class="row m-0 p-1">
  <div class="col">
  <div class="col p-1">
    <input class="form-control" type="text" id="livesearch" placeholder="Search...">
    <label for="livesearch"></label> 
  </div>
    <div id="searchresult"></div>
  </div>
  <div class="col">
    <!-- Button trigger modal -->    
    <button type="button" class="w-30 btn btn-lg btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Dodaj osobu 
    </button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Unesite podatke</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="includes/insertosobe.inc.php" id="forminsertosobe" method="post">
            <div class="col-sm-4 p-1">
              <input type="text" class="form-control" id="rbr" name="rbr" placeholder="Redni broj">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="ime" placeholder="Ime">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="prezime" placeholder="Prezime">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" id="oib" name="oib" placeholder="OIB">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="godrod" placeholder="Godina rođenja">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="strsprema" placeholder="Stručna sprema">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="godisk" placeholder="Godina Iskustva">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" name="katposlova" placeholder="Kategorije poslova">
            </div>
            <div class="col-sm p-1">
              <input type="text" class="form-control" id="zivotopis" name="zivotopis" placeholder="Životopis">
            </div>
            <div id="error"></div>
            <div class="col-sm p-1">
              <input type="hidden" class="form-control" id="g-recaptcha-response" name="g-recaptcha-response">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
            <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
          </div>
          </form>
            <!-- <script>
              grecaptcha.ready(function() {
                  grecaptcha.execute('6Lc03QIkAAAAAMFEwjDYx4krplp04dO41eOYaFMe', {action: 'submit'}).then(function(token) {
                  document.getElementById('g-recaptcha-response').value=token;
                });
              });
            </script> -->
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row m-0 p-1">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Br.</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">OIB</th>
      <th scope="col">God. Rođenja</th>
      <th scope="col">Stručna sprema</th>
      <th scope="col">God. iskustva</th>
      <th scope="col">Kategorije poslova</th>
      <th scope="col">Životopis</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
      <?php include 'ispis/ispisosoba.php'; ?>
    </tbody>
  </table>
</div>
<br><br><br> 

  </body>
</html>
  