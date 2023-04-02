<?php
  include_once 'includes/header.inc.php';
  include_once 'includes/dbh.inc.php';

  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('https/AdministracijaLPv2/adminpage.php');}
?>

<div class="container m-0 p-2">
  <div class="row">
    <div class="col-md-10">
      <h1><i class="bi bi-gear-fill"></i> Dashboard <small>Manage your site</small></h1>
    </div>
    <div class="col-md-2 p-2">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Baza podataka
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="dbhcontroll/exportdbh.php">Export database</a></li>
          <li><a class="dropdown-item" href="dbhcontroll/importdbh.php">Import database</a></li>
          <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</div>

<section id="main">
  <div class="row m-0">
    <div class="col-md-3">
      <br>
      <div class="list-group" style="width: 20.082rem;">
        <a href="adminpage.php" class="list-group-item active text-bg-secondary" aria-current="true">
          Informacije
        </a>
        <a href="dokumentacija/autor.html" class="list-group-item list-group-item-action">Autor</a>
        <a href="dokumentacija/dokumentacija.php" class="list-group-item list-group-item-action">Dokumentacija</a>
        <a href="konfiguracija.php" class="list-group-item list-group-item-action">Konfiguracija</a>
        <a href="./ispis/ispisstatistike.php" class="list-group-item list-group-item-action">Statistika </a>
      </div>
      <br>
      <div class="card" style="width: 20.082rem;">
        <div class="card-body">
          <h6 class="card-title">Disk space used</h6>
            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 60%">60%</div>
          </div>
          <h6 class="card-title">Bandwidth used</h6>
          <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 25%">25%</div>
          </div>
        </div>
      </div>
      <br>
      <div class="card" style="width: 20.082rem;">
        <div class="card-body">
          <button class="w-30 btn btn-lg btn-secondary" onclick="loadDoc()">Učitaj podatke osoba</button>
          <div id="demo"></div>
        </div>
      </div>
    </div>
    <div class="col-md-8"><br>
      <div class="card">
        <div class="card-header text-bg-secondary">
          Users view
        </div>
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Username</th>
              <th scope="col">Datum registracije</th>
              <th scope="col">Status</th> 
              <th scope="col">Action</th>              
           </tr>
            </thead>
            <tbody>
              <?php include 'ispis/ispisusera.php' ?>
            </tbody>
          </table>
        </div>
      </div><br>
    </div>  
  </div><br>
  <div class="">
      <div class="card">
      <div class="card-header text-bg-secondary">
        Osobe view
      </div>
      <div class="card-body">
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
          <?php include 'ispis/ispisosobaadmin.php'; ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
  <br><br><br> 
</section>

  </body>
</html>








<!--<div class="card">
       <div class="card-header text-bg-secondary">
        Website overview
      </div>
        <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 10rem;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Users</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 10rem;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Pages</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 10rem;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Posts</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 10rem;">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-muted">Visitors</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
