<?php
session_start();

include('sql.php');

$id_buktisyarat = $_POST['id_buktisyarat'];
$id_penduduk = $_SESSION['id_penduduk'];

$aktakelahiran = $_FILES['aktakelahiran']['name'];
$fotokk = $_FILES['fotokk']['name'];
$fotouser = $_FILES['fotouser']['name'];
$sidikjari = $_FILES['sidikjari']['name'];

$allowed_extensions = array('jpg', 'jpeg', 'png');

if (!empty($aktakelahiran)) {
    $file_extension = pathinfo($aktakelahiran, PATHINFO_EXTENSION);
    if (in_array($file_extension, $allowed_extensions)) {
        $destination = './aktakelahiran/' . $aktakelahiran;
        move_uploaded_file($_FILES['aktakelahiran']['tmp_name'], $destination);
    } else {
        echo 'Format file akta kelahiran tidak diizinkan';
        die();
    }
}

if (!empty($fotokk)) {
    $file_extension = pathinfo($fotokk, PATHINFO_EXTENSION);
    if (in_array($file_extension, $allowed_extensions)) {
        $destination = './fotokk/' . $fotokk;
        move_uploaded_file($_FILES['fotokk']['tmp_name'], $destination);
    } else {
        echo 'Format file kartu keluarga tidak diizinkan';
        die();
    }
}

if (!empty($fotouser)) {
    $file_extension = pathinfo($fotouser, PATHINFO_EXTENSION);
    if (in_array($file_extension, $allowed_extensions)) {
        $destination = './fotouser/' . $fotouser;
        move_uploaded_file($_FILES['fotouser']['tmp_name'], $destination);
    } else {
        echo 'Format file foto pengguna tidak diizinkan';
        die();
    }
}

if (!empty($sidikjari)) {
    $file_extension = pathinfo($sidikjari, PATHINFO_EXTENSION);
    if (in_array($file_extension, $allowed_extensions)) {
        $destination = './sidikjari/' . $sidikjari;
        move_uploaded_file($_FILES['sidikjari']['tmp_name'], $destination);
    } else {
        echo 'Format file sidik jari tidak diizinkan';
        die();
    }
}

$sql = "UPDATE buktisyarat SET aktakelahiran='$aktakelahiran', fotokk='$fotokk', fotouser='$fotouser', sidikjari='$sidikjari' WHERE id_buktisyarat='$id_buktisyarat' AND id_penduduk='$id_penduduk'";

$update = mysqli_query($host, $sql);
if ($update) {
    echo "
    <script>
        alert('Update data berhasil');
        window.location='view_buktisyarat.php';
    </script>";
} else {
    echo "
    <script>
        alert('Update data gagal');
        window.location='view_buktisyarat.php';
    </script>";
}

mysqli_close($host);
?>