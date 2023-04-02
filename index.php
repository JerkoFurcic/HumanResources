<?php
  
  include_once 'includes/header.inc.php';
  include_once 'includes/dbh.inc.php';

  //if ($_SERVER['SERVER_PROTOCOL'] == 'http') {header('Location: https://localhost/AdministracijaLPv2/index.php');}
   
?>

  <div class="row m-0 p-0">
              
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
      </tr>
      </thead>
      <tbody>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <?php
   
    for ($i=2010; $i < 2024; $i++) {
      echo "<li><a class='dropdown-item' href='index.php?god=$i'>$i</a></li>";
    } 

    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "loginsistem";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
      

    
    

    if (isset($_GET['god'])) {
      $god=$_GET['god'];
    $sql = "SELECT * FROM osoba WHERE godRod LIKE '%$god'";
      
    
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
        </tr> 
        <?php
      } 
    }
  }
    
    ?>
  </ul>
</div>
      </tbody>
    </table>
  
  <div class="row m-0 p-0">
    
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
 
    <div class="col-4 p-0">
    <table class="table table-striped table-hover">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naziv kategorija</th>
      </tr>
      </thead>
      <tbody>
        <?php include 'ispis/ispiskategorijeguest.php'; ?>
      </tbody>
    </table>
    </div>
    <div class="col">
      <h4 class="sentnotification"></h4>
      <form id="sendemail">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="text" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div>
          <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
          <textarea class="form-control" id="txtarea" rows="3"></textarea>
        </div>
        <button type="button" onclick="sendEmail()" value="Send An Email" class="w-30 m-3 btn btn-lg btn-secondary">Send email</button>
      </form>
    </div>
  </div>
  
<script type="text/javascript">
function sendEmail() {
  var name = $("#name");
  var email = $("#email");
  var txtarea = $("#txtarea");

  if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(txtarea)) {
    $.ajax ({
      url: 'sendemail.php',
      method: 'POST',
      dataType: 'json',
      data: {
        name: name.val(),
        email: email.val(),
        txtarea: txtarea.val()
      }, success: function(response) {
        $('#sendemail')[0].reset();
        $('.sentnotification').text("Message successfuly sent.");
      }
    });
  }
}
function isNotEmpty(caller) {
  if (caller.val() == "") {
    caller.css('border', '1px solid red');
    return false;
  }
  else {
    caller.css('border', '');
    return true;
  }
}
  </script>
  
  </body>
</html>



