<?php
session_start();

include('sql.php');

$id_buktisyarat = $_GET['id'];

$query_mysql = mysqli_query($host, "SELECT * FROM buktisyarat WHERE id_buktisyarat='$id_buktisyarat'");
$data = mysqli_fetch_array($query_mysql);

$aktakelahiran = $data['akta_kelahiran'];
$fotokk = $data['foto_kk'];
$fotouser = $data['foto_penduduk'];
$sidikjari = $data['sidik_jari'];

?>

<html>

<head>
</head>

<body>
    <form action="ubah2_buktisyarat.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_buktisyarat" value="<?php echo $id_buktisyarat ?>">
        <label>Akta kelahiran</label><br>
        <input type="file" name="aktakelahiran">
        <?php if (!empty($aktakelahiran)) { ?>
            <img src="./aktakelahiran/<?php echo $aktakelahiran ?>" width="100">
        <?php } ?>
        <br>
        <label>KK</label><br>
        <input type="file" name="fotokk">
        <?php if (!empty($fotokk)) { ?>
            <img src="./fotokk/<?php echo $fotokk ?>" width="100">
        <?php } ?>
        <br>
        <label>Foto user</label><br>
        <input type="file" name="fotouser">
        <?php if (!empty($fotouser)) { ?>
            <img src="./fotouser/<?php echo $fotouser ?>" width="100">
        <?php } ?>
        <br>
        <label>Sidik jari</label><br>
        <input type="file" name="sidikjari">
        <?php if (!empty($sidikjari)) { ?>
            <img src="./sidikjari/<?php echo $sidikjari ?>" width="100">
        <?php } ?>
        
        <br>
        <input type="submit" value="Update" name="update">
    </form>
</body>

</html>