<?php

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

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputPerson($rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis) !== false) {
        header("location: ../tablice.php?error=emtyinput");
        exit();
    }
    if (personExists($conn, $rbr, $oib) !== false) {
        header("location: ../tablice.php?error=osobapostoji");
        exit();
    }

    addPerson($conn, $rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis);
}
else{
    header("location: ../tablice.php");
    exit();
}

/*
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    require_once 'dbh.inc.php';

    $delete = mysqli_query($conn, "DELETE FROM osoba WHERE osobaID = $id");
    
}*/

// if (isset($_GET['delete'])) {
//     $osobaID = $_GET['delete'];

//     require_once 'dbh.inc.php';

//     $sql = "DELETE FROM osoba WHERE osobaID=$osobaID";
//     $result = mysqli_query($conn, $sql);
//     $resultCheck = mysqli_num_rows($result);
    
//     if ($resultCheck > 0) {
//         while ($row  = mysqli_fetch_assoc($result)) {
//             echo "<tr><td>" . $row["redniBr"] . "</td><td>" . $row["ime"] . "</td><td>" . $row["prezime"] . "</td><td>" . $row["oib"] . "</td><td>" . $row["godRod"] . "</td><td>" . $row["strSprema"] . "</td><td>" . $row["godIsk"] . "</td><td>" . $row["katPoslova"] . "</td><td>" . $row["zivotopis"] . "</td><td>";
//         }
//     }
// }
