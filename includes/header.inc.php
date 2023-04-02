<?php
  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('AdministracijaLPv2/login.php');}
  session_start();

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

<!doctype html>
<html lang="en">
  <head>
    <title>Administracija ljudskih potencijala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc03QIkAAAAAMFEwjDYx4krplp04dO41eOYaFMe"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/sign-in.css" rel="stylesheet">

  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> 

<header class="p-3 text-bg-dark">

  <nav nav class="navbar navbar-expand-lg" style="background-color: #ff8040;">
    <div class="container-fluid">
        
      <button class="navbar-toggler m-1 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <li class="mb-2"><a href="index.php" class="btn btn-outline-dark me-2 float-start">Naslovna</a></li> 
          </li>
          <li class="nav-item">
            <li><a href="tablice.php" class="btn btn-outline-dark me-2 float-start">Tablice</a></li> 
        </ul>
        <form class="d-flex" method="post">
          <?php
            if (isset($_SESSION["userUid"])) {
              if ($_SESSION["userStatus"] == 0) {
                session_start();
                session_unset();
                session_destroy();

                header("location: login.php?accountLocked");
              }
              if ($_SESSION["type"] == 0) {
                echo "<div class='text-end'>";
                echo "<button type='button' onclick=location.href='includes/logout.inc.php' class='btn btn-outline-dark me-2 float-end'>Odjava</button>";
                echo "</div>";
              }
              if ($_SESSION["type"] == 1) {
                echo "<div class='text-end'>";
                echo "<a href='adminpage.php' class='btn btn-outline-dark me-2'>Admin page</a>";
                echo "<button type='button' onclick=location.href='includes/logout.inc.php' class='btn btn-outline-dark me-2'>Odjava</button>";
                echo "</div>";
              }
            }
            else {
              echo "<div class='text-end'>";
              echo "<button type='button' onclick=location.href='login.php' class='btn btn-outline-dark me-2'>Prijava</button>";
              echo "<button type='button' onclick=location.href='signup.php' class='btn btn-outline-dark me-2'>Registracija</button>";
              echo "</div>";
            }
          ?>
        </form>
      </div>
    </div>
  </nav>
</header>
    
