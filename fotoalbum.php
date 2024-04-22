<?php
    include "koneksi.php";

?>

<?php
                $Id = $_GET['albumid'];
                $sq="SELECT * FROM album where album.albumid='$Id'";
                $re = mysqli_query($konek,$sq);
                $arr = mysqli_fetch_array($re);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1 class="text-center"><?= $arr['namaalbum']; ?></h1>
    <h4 class="text-center"><?= $arr['deskripsi']; ?></h4>

            <?php
                $id = $_GET['albumid'];
                $sql="SELECT * FROM album INNER JOIN foto ON album.albumid=foto.albumid where album.albumid='$id'";
                $res = mysqli_query($konek,$sql);
                while($data=mysqli_fetch_array($res)){
            ?>
                <img style="border-radius: 10px 10px 0 0;" src="gambar/<?= $data['lokasifile'];?>" class="card-img-top">
                    <p></p>
                    <h5 class="card-title"><?= $data['judulfoto'];?></h5>
                    <p class="card-text"><?= $data['deskripsi'];?></p>
                
                    <small class="text-muted"><?= $data['tanggal'];?></small>
                <?php } ?>
</body>
</html>