<?php
    include "koneksi.php";

if( isset($_POST["login"])){


    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    
    $result = mysqli_query($konek, "SELECT * FROM user WHERE username = '$username' and password = '$password'");

    //cek username
    if(mysqli_num_rows($result) > 0){

    //cek password
    $row = mysqli_fetch_assoc($result);
      
    $_SESSION["UserID"]    = $row["UserID"];
    $_SESSION["username"]    = $row["username"];
    $_SESSION["password"]    = $row["password"];
    
    header("Location: home.php");

    }else{
        mysqli_error($konek);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <br>
    <form action="" method="post">
    <br>
    <label>Username</label>
    <input type="text" name="username">
    <br>
    <label>Password</label>
    <input type="password" name="password">
    <br> 
    <button type="submit" name="login">login</button>

</form>
</body>
</html>
