<?php
    include "koneksi.php";

?>
<?php
    
    if(isset($_POST['tambah'])){

            $namaalbum      =$_POST['namaalbum'];
            $deskripsi      =$_POST['deskripsi'];
            $tanggal        = date('y-m-d');
            $sesi           = $_SESSION["UserID"];

            $tambah = mysqli_query($konek,"INSERT INTO album VALUES ('', '$namaalbum', '$deskripsi', '$tanggal', '$sesi')");

            if ($tambah){
                header("location: album.php");
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
    <title>Tambahalbum</title>
</head>
<body>
<form method="post" action="">
    <h3>Tambah Data Album</h3>
    <br>
        <label>Nama Album</label>
        <input type="text" name="namaalbum">
        <br>
        <label>Deskripsi</label>
        <input name="deskripsi" type="text">
        <br>
        <button type="submit" name="tambah">Tambah</button>

</form>
</body>
</html>