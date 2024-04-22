<?php
    include "koneksi.php";

    if(isset($_POST['register'])){

        $username       = $_POST['username'];
        $password       = md5($_POST['password']);
        $email          = $_POST['email'];
        $namalengkap    = $_POST['namalengkap'];
        $alamat         = $_POST['alamat'];

        $tambah = mysqli_query ($konek, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$namalengkap', '$alamat')");

        if ($tambah){
            header("location: login.php");
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
    <title>Registrasi</title>
</head>
<body>
    <form action="" method="post">
    
    <label for="username" >Username</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="Password" >Password</label>
    <input type="password" name="password" id="Password">
    <br>
    <label for="Email" >Email</label>
    <input type="text" name="email" id="Email">
    <br>
    <label for="NamaLengkap" >NamaLengkap</label>
    <input type="text" name="namalengkap" id="NamaLengkap">
    <br>
    <label for="Alamat" >Alamat</label>
    <input type="text" name="alamat" id="Alamat">
    <br>
    <button type="submit" name="register" >register</button>
    <!-- <table>
        <tr>
            <td>lagu</td>
            <td>:</td>
            <td><input type="text" name="lagu"></td>
        </tr>
        <tr>
            <td>sumber</td>
            <td>:</td>
            <td><input type="text" name="sumber"></td>
        </tr>
        <tr>
            <td>data</td>
            <td>:</td>
            <td><input type="text" name="data"></td>
        </tr>
        <tr>
            <td>tekan</td>
            <td>:</td>
            <td><input type="submit" name="register"></td>
        </tr>
    </table> -->
    </form>
</body>
</html>