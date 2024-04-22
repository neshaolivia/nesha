<?php
    include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama</title>
</head>
<body>
    <h1>Halaman utama</h1>
    <table>
        <li><a href="home.php">home</a></li>
        <li><a href="album.php">album</a></li>
        <li><a href="foto.php">foto</a></li>
        <li><a href="logout.php">logout</a></li>
        
    </table>
    <?php
    $username = $_SESSION['username'];
      $sql="SELECT * FROM album INNER JOIN foto ON album.albumid=foto.albumid";
      $res = mysqli_query($konek,$sql);  
      while($data=mysqli_fetch_array($res)){
    ?>
    <table>
        <tr>
            <td><img src="gambar/<?= $data['lokasifile'];?>" class="card-img-top"></td>
            <td><h5 class="card-title"><?= $data['judulfoto'];?></h5></td>
            <td><p class="card-text"><?= $data['deskripsifoto'];?></p></td>
            <?php
            $Id = $data['fotoid'];
            $sql1 = mysqli_query($konek, "select * from likefoto where fotoid = '$Id'");
            $dd = mysqli_num_rows($sql1);
            ?>
            <td><small class="text-muted"><?= $data['tanggalunggah'];?></small></td>
            <td><a class="btn btn-light border" href="likefoto.php?fotoid=<?php echo $data['fotoid']; ?>" style="width:145px;">Like <?php if($dd>0){echo $dd;}?></a></td>
            <td><a href="komentar.php?fotoid=<?php echo $data['fotoid']; ?>" class="btn btn-light border" style="width:120px;">Komentar</a></td>
        </tr>
    </table>
    <?php }?>
</body>
</html>