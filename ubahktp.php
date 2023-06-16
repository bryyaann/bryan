<?php
include('sql.php');
$kategori = mysqli_query($host, "SELECT * FROM ktp WHERE id_ktp = '" . $_GET['id'] . "'");
$k = mysqli_fetch_object($kategori);
?>

<html>

<head>
  <title>Data Warga Negara RI</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#fff">
  <form action="viewktp.php" name="form2" enctype="multipart/form-data" method="post">
    <table width="638" height="960" border="1" align="center">
      <tr>
        <td height="94" valign="top" bgcolor="##5A5A5A">
          <font color="#FFFFFF"><br>
          </font>
          <blockquote>
            <p>
              <center>
                <font color="#FFFFFF" size="+2">DATA WARGA NEGARA REPUBLIK INDONESIA</font>
              </center>
          </blockquote>
        </td>
      </tr>
      <tr>
        <td width="669" valign="top" bgcolor="#FFFFFF">
          <blockquote>
            <p>
            <p>
              <font color="red">* Menginputkan data menggunakan huruf capital</Font>
            </p>
            <br>
            <p> Nik &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp;: <input type="text" value="<?php echo $k->nik ?>" name="nik"></p>
            <p> Nama Lengkap &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <input type="text"
                value="<?php echo $k->nama_ktp ?>" name="nama" size=40></p>

            <p>Tempat : <input type="text" name="tl" value="<?php echo $k->tempat ?>" placeholder=" Tempat">
            <p>Tanggal Lahir : <input type="date" name="tgl" value="<?php echo $k->tanggal_lahir ?>"
                placeholder=" Tanggal Lahir">

            <p>Jenis Kelamin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
              <input type="radio" name="sex" value="LAKI-LAKI" <?php if ($k->jenis_kelamin == "LAKI-LAKI")
                echo "checked"; ?>>LAKI-LAKI
              <input type="radio" name="sex" value="PEREMPUAN" <?php if ($k->jenis_kelamin == "PEREMPUAN")
                echo "checked"; ?>>PEREMPUAN
            </p>
            <p>Golongan Darah &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
              <select name="darah">
                <option value="A" <?php if ($k->golongan_darah == "A")
                  echo "selected"; ?>>A</option>
                <option value="B" <?php if ($k->golongan_darah == "B")
                  echo "selected"; ?>>B</option>
                <option value="AB" <?php if ($k->golongan_darah == "AB")
                  echo "selected"; ?>>AB</option>
                <option value="O" <?php if ($k->golongan_darah == "O")
                  echo "selected"; ?>>O</option>
              </select>
            </p>
            <p> Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
              <input type="text" name="alamat" value="<?php echo $k->alamat ?>" size=60>
            </p>
            <p>RT &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp;:
              <select name="rt">
                <?php for ($x = 1; $x <= 30; $x++) {
                  echo "<option value='$x'";
                  if ($k->rw == $x) {
                    echo " selected";
                  }
                  echo ">$x</option>";
                } ?>
              </select>
            </p>
            <p>RW &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
              <select name="rw">
                <?php for ($x = 1; $x <= 30; $x++) {
                  echo "<option value='$x'";
                  if ($k->rw == $x) {
                    echo " selected";
                  }
                  echo ">$x</option>";
                } ?>
              </select>
            </p>
            <p> Kel/Desa &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
              <input type="text" name="desa" value="<?php echo $k->kel_desa ?>">
            </p>
            <p> Kecamatan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
              <input type="text" name="kecamatan" value="<?php echo $k->kecamatan ?>">
            </p>
            <p> Agama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
              <select name="agama">
                <option value="ISLAM" <?php if ($k->agama == 'ISLAM')
                  echo 'selected'; ?>>ISLAM</option>
                <option value="KRISTEN" <?php if ($k->agama == 'KRISTEN')
                  echo 'selected'; ?>>KRISTEN</option>
                <option value="KATOLIK" <?php if ($k->agama == 'KATOLIK')
                  echo 'selected'; ?>>KATOLIK</option>
                <option value="BUDHA" <?php if ($k->agama == 'BUDHA')
                  echo 'selected'; ?>>BUDHA</option>
                <option value="HINDU" <?php if ($k->agama == 'HINDU')
                  echo 'selected'; ?>>HINDU</option>
              </select>
            </p>
            <p> Status &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
              <input type="checkbox" name="status[]" value="BELUM KAWIN" <?php if ($k->status_ktp == "BELUM KAWIN")
                echo "checked"; ?>>BELUM KAWIN
              <input type="checkbox" name="status[]" value="MENIKAH" <?php if ($k->status_ktp == "MENIKAH")
                echo "checked"; ?>>MENIKAH
            </p>
            <p> Pekerjaan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
              <input type="text" name="pekerjaan" value="<?php echo $k->pekerjaan ?>">
            </p>
            <p> Kewarganegaraan &nbsp; &nbsp; &nbsp;:
              <select name="warganegara">
                <option value="WNI" <?php if ($k->kewarganegaraan == "WNI")
                  echo "selected"; ?>>WNI</option>
                <option value="WNA" <?php if ($k->kewarganegaraan == "WNA")
                  echo "selected"; ?>>WNA</option>
              </select>
            </p>
          </blockquote>
          <br>
          <p>
            <center><input type="submit" name="cetak" value="CETAK">
              <input type="reset" value="BATAL">
            </center>
          </p>
        </td>
      </tr>
    </table>
  </form>

  <?php
  if (isset($_POST['cetak'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tl'];
    $tanggal_lahir = $_POST['tgl'];
    $jenis_kelamin = $_POST['sex'];
    $golongan_darah = $_POST['darah'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kel_desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['warganegara'];
    $update = mysqli_query($host, "UPDATE ktp SET 
    nik = '" . $nik . "', 
    nama_ktp = '" . $nama . "',
    tempat = '" . $tempat . "',
    tanggal_lahir = '" . $tanggal_lahir . "',
    jenis_kelamin = '" . $jenis_kelamin . "',
    golongan_darah = '" . $golongan_darah . "',
    alamat = '" . $alamat . "',
    rt = '" . $rt . "',
    rw = '" . $rw . "',
    kel_desa = '" . $kel_desa . "',
    kecamatan = '" . $kecamatan . "',
    agama = '" . $agama . "',
    status_ktp = '" . $status . "',
    pekerjaan = '" . $pekerjaan . "',
    kewarganegaraan = '" . $kewarganegaraan . "'
    WHERE id_ktp = '" . $_GET['id'] . "'");

    if ($update) {
      echo '<script>alert("Berhasil!")</script>';
      echo '<script>window.location="viewktp.php"</script>';
    } else {
      echo '<script>alert("Gagal Ditambahkan!")</script>';
    }
  }
  ?>