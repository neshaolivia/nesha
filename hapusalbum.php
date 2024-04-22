<?php


    include "koneksi.php";
    $hapus = mysqli_query($konek, "DELETE FROM album WHERE albumid = '$_GET[albumid]'");

    if($hapus){
        header('location:album.php');
    }else{
        echo "Hapus Data gagal, Data guru digunakan di tabel wali kelas <br>
            <a href='data_admin.php'><<< Kembali</a>";
    }


?>