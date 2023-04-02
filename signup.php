<?php
  include_once 'includes/header.inc.php';

  if ($_SERVER['SERVER_PROTOCOL'] = 'http') {header('https/AdministracijaLPv2/signup.php');}
?>

  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="includes/signup.inc.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Registrirajte se</h1>

    <div class="form-floating">
      <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput1" placeholder="name@example.com">
      <div id="uemail_response" ></div>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" name="uid" class="form-control" id="floatingInput2" placeholder="Username">
      <div id="uname_response" ></div>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="pwd" class="form-control m-0" id="floatingInput" placeholder="Password">
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" name="pwdrepeat" class="form-control" id="floatingPassword" placeholder="Repeat password">
      <label for="floatingPassword">Repeat password</label>
    </div>

    <button class="w-100 btn btn-lg btn-secondary" type="submit" name="submit">Registracija</button>
    <p class="mt-3 mb-3 text-muted">&copy; 2023</p>
    <input type="hidden" class="form-control" id="g-recaptcha-response" name="g-recaptcha-response">
  </form>
</main>

  </body>
</html>

<!-- ajax provjera dostupnosti username, email -->
<script>
$(document).ready(function(){

    $("#floatingInput2").keyup(function(){

        var username = $(this).val().trim();

        if(username != ""){

            $.ajax({
                url: 'ajaxfile.php',
                type: 'post',
                data: {username: username},
                success: function(response){

                    $('#uname_response').html(response);
                }
            });
        }else{
            $("#uname_response").html("<span style='color: red;'>Not Available</span>");
        }
    });

    $("#floatingInput1").keyup(function(){

        var email = $(this).val().trim();

        if(email != ""){

            $.ajax({
                url: 'ajaxfile.php',
                type: 'post',
                data: {email: email},
                success: function(response){

                    $('#uemail_response').html(response);
                }
            });
        }else{
            $("#uemail_response").html("<span style='color: red;'>Not Available</span>");
        }

    });
});
</script>

<?php
  if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
          echo "<p>Fill in all fields!</p>";
      }
      elseif ($_GET["error"] == "invaliduid") {
          echo "<p>Chose a proper username!</p>";
      }
      elseif ($_GET["error"] == "invalidemail") {
          echo "<p>Chose a propre email!</p>";
      }
      elseif ($_GET["error"] == "passwordsdontmatch") {
          echo "<p>Passwords doesn't match!</p>";
      }
      elseif ($_GET["error"] == "stmtfailed") {
          echo "<p>Something went wrong!</p>";
      }
      elseif ($_GET["error"] == "usernametaken") {
          echo "<p>Username already taken!</p>";
      }
      elseif ($_GET["error"] == "none") {
          echo "<p>You have signed up!</p>";
      }
  }
?>
