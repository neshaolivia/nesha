<?php
    include "koneksi.php";

?>

<?php
$id = $_GET['albumid'];
$sqledit = mysqli_query($konek, "SELECT * FROM album WHERE albumid='$id'");
$e = mysqli_fetch_array($sqledit);
?>

<form method="post" action="">
    <h3>Edit Data Album</h3>

    <input type="hidden" name="albumid" value="<?= $e['albumid']; ?>">

        <label for="namaalbum">Nama Album</label>
        <input type="text" name="namaalbum" id="namaalbum" value="<?= $e['namaalbum']; ?>">

        <label for="deskripsi">Deskripsi</label>
        <input name="deskripsi" type="text" id="deskripsi" value="<?= $e['deskripsi']; ?>">

        <label >Tanggal</label>
        <input name="tanggal" type="text" value="<?= $e['tanggal']; ?>">

    <button type="submit" name="edit">Konfirmasi</button>
</form>


<?php
if(isset($_POST['edit'])){
    //variabel dari elemen form
    $albumid       = $_POST['albumid'];
    $namaalbum     = $_POST['namaalbum'];
    $deskripsi     = $_POST['deskripsi'];
    $tanggal       = date('y-m-d');

    
    //proses edit album
        $edit = mysqli_query($konek, "UPDATE album SET namaalbum = '$namaalbum', deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE albumid='$albumid'");

        if(!$edit){
            echo "edit data gagal!!";
        }else{
            header('location: album.php');
        }
    }
      



?>