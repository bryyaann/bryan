<?php
include('sql.php');

if(isset($_GET['id'])){
    $id_penduduk = $_GET['id'];
    $query_ktp = mysqli_query($host, "SELECT * FROM ktp WHERE id_penduduk = '$id_penduduk'");
    if(mysqli_num_rows($query_ktp) > 0){ // jika terdapat data terkait pada tabel ktp
        $delete_ktp = mysqli_query($host, "DELETE FROM ktp WHERE id_penduduk = '$id_penduduk'");
        if($delete_ktp){
            $delete_penduduk = mysqli_query($host, "DELETE FROM penduduk WHERE id_penduduk = '$id_penduduk'");
            if($delete_penduduk){
                echo '<script>alert("Data berhasil dihapus");window.location="view_penduduk.php"</script>';
            } else {
                echo '<script>alert("Data gagal dihapus");window.location="view_penduduk.php"</script>';
            }
        } else {
            echo '<script>alert("Data gagal dihapus");window.location="view_penduduk.php"</script>';
        }
    } else { // jika tidak terdapat data terkait pada tabel ktp
        $delete_penduduk = mysqli_query($host, "DELETE FROM penduduk WHERE id_penduduk = '".$_GET['id']."'");
        if($delete_penduduk){
            echo '<script>alert("Data berhasil dihapus");window.location="view_penduduk.php"</script>';
        } else {
            echo '<script>alert("Data gagal dihapus");window.location="view_penduduk.php"</script>';
        }
    }
}
?>