<?php
    include "koneksi.php";

?>
<?php
if (isset($_POST['Tambah'])) {

    $judulfoto       = $_POST["judulfoto"];
    $deskripsifoto   = $_POST["deskripsifoto"];
    $albumid         = $_POST['albumid'];
    $tanggalunggah    = date("Y-m-d");
    $UserID          = $_SESSION["UserID"];


    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location: foto.php");
    }else{
        if($ukuran < 1044070){		
            $xx = $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/'.$filename);
            mysqli_query($konek, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$xx','$albumid','$UserID')");
            header("location: foto.php");
        }else{
            header("location: home.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambahfoto</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
            <h2 align="center">Tambah Foto</h2>
            <br>
            <label >Judul Foto</label>
            <input type="text"  name="judulfoto" required>

            <label >Deskripsi</label>
            <input type="text"  name="deskripsifoto" required>

            <label >Foto</label>
            <input type="file"  name="lokasifile" required>

            <label >Album</label>
                <select name="albumid" >
                    <option>pilih</option>
                <?php
                    $id = $_SESSION["UserID"];
                    $sql = mysqli_query($konek,"select * from album where UserID='$id'");
                    while($data = mysqli_fetch_array($sql)){
                ?>
                    <option value="<?=$data['albumid'];?>"><?= $data['namaalbum'];?></option>
                    
                <?php }  ?>
              
                </select>
                <br>
                <input type="submit" name="Tambah" value="Tambah">
                <!-- <a href="foto.php?page=foto">Cancel</a> -->
</form>
</body>
</html>