<?php
    include "koneksi.php";

?>
<?php
if (isset($_POST['edit'])) {

    $Id_Foto         = $_POST['fotoid'];
    $Judul_Foto      = $_POST["judulfoto"];
    $Deskripsi_Foto  = $_POST["deskripsifoto"];
    $Id_Album        = $_POST["albumid"];

    $ekstensi =  array('png','jpg','jpeg','gif');
    $foto_saat_ini = $_POST['foto_saat_ini'];
    $foto_baru = $_FILES['foto_baru']['name'];
    $ukuran = $_FILES['foto_baru']['size'];
    $file_tmp = $_FILES['foto_baru']['tmp_name'];
    $ext = pathinfo($foto_baru, PATHINFO_EXTENSION);
        
    if (!empty($foto_baru)){
        if(in_array($ext, $ekstensi) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$foto_baru);
            
            if ($foto_saat_ini){
                unlink("gambar/".$foto_saat_ini);
            }
            
            mysqli_query($konek, "UPDATE foto SET judulfoto='$Judul_Foto', deskripsifoto='$Deskripsi_Foto',lokasifile='$foto_baru',albumid='$Id_Album' WHERE fotoid='$Id_Foto'")or die(mysqli_error($konek));
            header("location:foto.php?page=edit=berhasil");
        }else{
            mysqli_error($konek);
        }
    }else{
        mysqli_query($konek, "UPDATE foto SET judulfoto='$Judul_Foto', deskripsifoto='$Deskripsi_Foto',albumid='$Id_Album' WHERE fotoid='$Id_Foto'")or die(mysqli_error($konek));
        header("location:foto.php?page=edit=berhasil");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
            <h2 align="center">Edit Foto</h2>
            <br>
            <?php
            $Id_Foto = $_GET['fotoid'];
            $sql1="select * from foto where fotoid='$Id_Foto'";
            $hasil=mysqli_query($konek,$sql1);
            while ($data = mysqli_fetch_array($hasil)):
            ?>
            
                <input type="hidden" name="fotoid" value="<?= $data['fotoid']?>" readonly>
            
                <label class="form-label">Judul Foto</label>
                <input type="text" name="judulfoto" value="<?= $data['judulfoto']?>">
            
                <label class="form-label">Deskripsi_Foto</label>
                <input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto']?>">
            
                <input type="hidden" name="foto_saat_ini"  value="<?= $data['lokasifile'];?>">
                <label>File :</label>
                <input  type="file" name="foto_baru">
            
                <label class="form-label">Album</label>
                <select name="albumid"  required>

                <?php
                    $Id_User = $_SESSION["UserID"];
                    $sql = mysqli_query($konek,"select * from album where UserID='$Id_User'");
                    while($data2 = mysqli_fetch_array($sql)){
                ?>
                    <option value="<?= $data2['albumid'];?>"><?= $data2['namaalbum'];?></option>
                    
                <?php } ?>              
                </select>
            <div class="mb-3">
                <input type="submit" name="edit" value="ubah">
                <!-- <a class="btn btn-danger" href=".php?">Cancel</a> -->
            <?php endwhile; ?>
        </form>
</body>
</html>