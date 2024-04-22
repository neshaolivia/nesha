<?php
    include "koneksi.php";

?>

<?php
if (isset($_POST['komentar'])) {

    $Id_Foto            = $_POST['fotoid'];
    $Id_User            = $_SESSION["UserID"];
    $Isi_Komentar       = $_POST["isikomentar"];
    $Tanggal_Komentar   = date("Y-m-d");

    $sql= "insert into komentarfoto values ('','$Id_Foto', '$Id_User','$Isi_Komentar','$Tanggal_Komentar')";
    $res = mysqli_query($konek,$sql) or die(mysqli_error($konek));
    
    if ($res){
        header("Location: komentar.php?fotoid=".$Id_Foto);
    }else{
        mysqli_error($konek);
    }
}

$Id_Foto2 = $_GET['fotoid'];
$sql="select * from foto where fotoid='".$Id_Foto2."'";
$hasil=mysqli_query($konek,$sql);
while ($data = mysqli_fetch_array($hasil)){
$album = $data['albumid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>komentar</title>
</head>
<body>
    


            <img src="gambar/<?= $data['lokasifile'];?>" class="card-img-top">
                <h5 class="card-title" style=" font-size: 28px;"><?= $data['judulfoto'];?></h5>
                <p class="card-text"><?= $data['tanggalunggah'];?></p>
                <p class="card-text"><?= $data['deskripsifoto'];?></p>
    <?php }?>
    
                    <h3 class="card-title text-center mt-3">Komentar</h3>

                    <input type="hidden" name="fotoid" value="<?=$data['fotoid'];?>">
    <?php
    $sql2= mysqli_query($konek,"select * from komentarfoto inner join user on komentarfoto.UserID = user.UserID where fotoid='$Id_Foto2'");
    $rows= mysqli_num_rows($sql2);
    if ($rows > 0) {
    while ($data2 = mysqli_fetch_array($sql2)){
    ?>  
                
                    <div class="col-12"><h6 class="card-title" ><?= $data2['username'];?></h6></div>
                    <div class="col-12"><?= $data2['isikomentar'];?></div>
                

    <?php }}else{?> 
                    <h2 class="text-center">Belum Ada Komentar rek</h2>
        <?php } ?>
        <form method="post">
        
            <input class="form-control" type="hidden" name="fotoid" value="<?= $Id_Foto2;?>">
            <div class="col-10"><input class="form-control" placeholder="Tambahkan Komentar" type="text" name="isikomentar"></div>
            <div class="col-2"><input class="btn btn-primary" value="Kirim" type="submit" name="komentar"></div>
        
        </form>


<h4 class="text-center mt-5">Foto Lainnya</h4>
      <?php
        $sql="SELECT * FROM foto WHERE albumid='$album'";
        $res = mysqli_query($konek,$sql);  
        while($ta=mysqli_fetch_array($res)){
      ?>
        
            <a href="home.php?fotoid=<?= $ta['fotoid'];?>">
                <img src="gambar/<?= $ta['lokasifile'];?>" class="card-img-top">
            </a>
            
              <h5 class="card-title"><?= $ta['judulfoto'];?></h5>
              <p class="card-text"><?= $ta['deskripsifoto'];?></p>
    
              <small class="text-muted"><?= $ta['tanggalunggah'];?></small>

      <?php }?>

  </body>
</html>