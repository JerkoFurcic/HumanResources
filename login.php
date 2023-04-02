<?php
  include_once 'includes/header.inc.php';

  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('https/AdministracijaLPv2/login.php');}
  
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    elseif ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information!</p>";
    }
  }
  
?>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="includes/login.inc.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Prijavite se</h1>

    <div class="form-floating">
      <input type="text" name="uid" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email or username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="pwd" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    
    <button class="w-100 btn btn-lg btn-secondary" type="submit" name="submit">Prijava</button>
    <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
    <input type="hidden" class="form-control" id="g-recaptcha-response" name="g-recaptcha-response">
  </form>
</main>

  </body>
</html>
