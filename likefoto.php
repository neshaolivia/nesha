<?php
    include "koneksi.php";

    $id = $_GET['fotoid'];
    $User = $_SESSION['UserID'];
    $tanggallike = date("Y-m-d");

    $sql = mysqli_query($konek, "select * from likefoto where fotoid='$id' and UserID='$User'");
    
    if (mysqli_num_rows($sql) == 1) {
        header("location: home.php");
    }else{
        $sql = mysqli_query($konek, "insert into likefoto values ('','$id','$User','$tanggallike')");
        header("location: home.php");
    }
    ?>