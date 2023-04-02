<?php
// SignUp
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ? LIMIT 1;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    
    }
    else {
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
// END

// Login
function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}   

function loginUser($conn, $username, $pwd) {
    
    $unixTimestamp = time();
    $dateTime = date('Y-m-d H:i:s');

    $uidExists = uidExists($conn, $username, $username);
    
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();        
        $_SESSION["userID"] = $uidExists["userID"];
        $_SESSION["userUid"] = $uidExists["userUid"];
        $_SESSION["type"] = $uidExists["type"];
        $_SESSION["userStatus"] = $uidExists["userStatus"];

        setcookie($username, time() + getCookieTime($conn));
        setcookie($pwdHashed, time() + getCookieTime($conn));

        systemLogin($conn, $username, $unixTimestamp, $dateTime);

        header("location: ../index.php");
        exit();
    }
}
// END

// Add person
function addPerson($conn, $rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis) {
    $sql = "INSERT INTO osoba (redniBr, ime, prezime, oib, godRod, strSprema, godIsk, katPoslova, zivotopis) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tablice.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssss", $rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../tablice.php?error=none");
    exit();
}

function emptyInputPerson($rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis) {
    if (empty($rbr) || empty($ime) || empty($prezime) || empty($oib) || empty($godrod) || empty($strsprema) || empty($godisk) || empty($katposlova) || empty($zivotopis)) { 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function personExists($conn, $rbr, $oib) {
    $sql = "SELECT * FROM osoba WHERE redniBr = ? OR oib = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tablice.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $rbr, $oib);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    
    }
    else {
        $result = false;
        return $result;
    }
}

//ADD CATEGORY

function addCategory($conn, $kategorije) {
    $sql = "INSERT INTO kategorije (nazivKategorije) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tablice.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $kategorije);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../tablice.php?error=none");
    exit();
}

function emptyInputCategory($kategorije) {
    if (empty($kategorije))  
        $result = true;
    else 
        $result = false;
    return $result;
}

function categoryExists($conn, $kategorije) {
    $sql = "SELECT * FROM kategorije WHERE nazivKategorije = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tablice.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $kategorije);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;    
    }
    else {
        $result = false;
        return $result;
    }
}

//KONFIGURACIJA

function getPageNumber($conn){
    $sqlPage = "SELECT * FROM konfiguracija WHERE type = 'Page number'";
    $resultPage = mysqli_query($conn, $sqlPage);

    if (mysqli_num_rows($resultPage) > 0) {
        while ($row = mysqli_fetch_assoc($resultPage)) {
            $pagination = $row['value'];
        }
        return $pagination;
    }
}

function getCookieTime($conn){
    $sqlCookie = "SELECT * FROM konfiguracija WHERE type = 'Cookie time'";
    $resultCookie = mysqli_query($conn, $sqlCookie);

    if (mysqli_num_rows($resultCookie) > 0) {
        while ($row = mysqli_fetch_assoc($resultCookie)) {
            $cookietime = $row['value'];
            $cookietime_seconds = $cookietime * 86400;
        }
        return $cookietime_seconds;
    }
}

// SYSTEM STATISTICS

function systemLogin($conn, $username, $unixTimestamp, $dateTime)
{
    $sql = "INSERT INTO sistemStatistics (username, LoginUnix, LoginDateTime) VALUES ('$username', '$unixTimestamp', '$dateTime');";
    $conn->query($sql);
}

function systemLogout($conn, $username, $unixTimestamp, $dateTime)
{
    $sql = "UPDATE sistemStatistics SET LogoutUnix = '$unixTimestamp', LogoutDateTime='$dateTime' WHERE username = '$username' ORDER BY id DESC LIMIT 1;";
    $conn->query($sql);
}













//UPDATE PERSON

// function updatePerson($conn, $id, $rbr, $ime, $prezime, $oib, $godrod, $strsprema, $godisk, $katposlova, $zivotopis) {
//     $sql = "UPDATE osoba SET osobaID=$id, rbr='$rbr', ime='$ime', prezime='$prezime'
//                 , oib='$oib', godrod='$godrod', strsprema='$strsprema', godisk='$godisk' 
//                 , katposlova='$katposlova', zivotopis='$zivotopis' WHERE osobaID=$id;";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         echo "succes";
//     }
// }

/*function showPerson() {

    require_once 'dbh.inc.php'; 
    $sql = "SELECT * FROM osoba";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck > 0) {
        while ($row  = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["redniBr"] . "</td><td>" . $row["ime"] . "</td><td>" . $row["prezime"] . "</td><td>" . $row["oib"] . "</td><td>" . $row["godRod"] . "</td><td>" . $row["strSprema"] . "</td><td>" . $row["godIsk"] . "</td><td>" . $row["katPoslova"] . "</td><td>" . $row["zivotopis"] . "</td><td>";
        }
    }
}*/

// function removePerson($conn, $id) {
//     $sql = "DELETE FROM osoba WHERE osobaID = $id";
//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         header("location: ../index.php?error=statementfailed");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt, $id);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
//     header("location: ../index.php?error=none");
//     exit();
// }

