<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.css">
    <script src="../js/all.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles1.css" rel="stylesheet" />
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
</body>
</html>

<?php

include "../system/koneksi.php";

$antiduplikat=uniqid();
$ektensi = array('png','jpg','jpeg','JPG');
$namaimg=$_FILES['foto']['name'];
$sizeimg=$_FILES['foto']['size'];
$ext=PATHINFO($namaimg, PATHINFO_EXTENSION);

$nama = $_POST['nama'];
$alamat = $_POST['addr'];
$notelpon = $_POST['nop'];
$jenisKelamin = $_POST['gender'];
$div = $_POST['divisi'];
$mail = $_POST['mail'];
$username = $_POST['user'];


if ($_FILES["foto"]["error"]==4){

    ?>
        <script>
            Swal.fire({
                title: 'Lengkapi Isi Form',
                icon: 'warning',
                confirmButtonColor: '#00c4aa',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    history.back();
                }{
                }
            })
        </script>
    
    <?php

}elseif(!in_array($ext,$ektensi)){
    ?>

        <script>
            Swal.fire({
                title: 'Ekstensi File Tidak Cocok',
                text: " FIle harus berupa jpg / JPG / jpeg / png)",
                icon: 'warning',
                confirmButtonColor: '#00c4aa',
                confirmButtonText: "Kembali"
            }).then((result) => {
                if (result.isConfirmed) {
                    history.back();
                }{
                }
            })
        </script>

    <?php
}elseif($sizeimg>1000000){
    ?>

        <script>
            Swal.fire({
                title: 'Ukuran File harus dibawah 1 MB',
                icon: 'warning',
                confirmButtonColor: '#00c4aa',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    history.back();
                }{
                }
            })
        </script>

    <?php
}elseif($nama == NULL || $alamat == NULL || $notelpon == NULL || $jenisKelamin == NULL || $div == NULL || $mail == NULL || $username == NULL){
    ?>
        <script>
            Swal.fire({
                title: 'Form Belum Terisi Semua',
                icon: 'warning',
                confirmButtonColor: '#00c4aa',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    history.back();
                }{
                }
            })
        </script>
    <?php
}else{
    $foto=$antiduplikat.'_'.$namaimg;
    move_uploaded_file($_FILES['foto']['tmp_name'], "../admin/assets/img/karyawan/$foto");

    
    $tambahKaryawan = mysqli_query($con, "INSERT INTO karyawan (
        username,
        nama,
        alamat,
        telepon,
        gender,
        email,
        idDIvisi,
        foto
        )
        VALUE ('$username', '$nama', '$alamat', '$notelpon', '$jenisKelamin', '$mail', $div, '$foto')");
    
    if ($tambahKaryawan == TRUE){
        ?>
            <script>
                Swal.fire({
                    title: 'Karyawan Berhasil Ditambahkan',
                    icon: 'success',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../admin/karyawanlist.php";
                    }{
                    }
                })
            </script>
        <?php
    }else{
        ?>
            <script>
                Swal.fire({
                    title: 'Ada Masalah Dalam Menyimpan Data ke Database',
                    icon: 'info',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Kembali'
                }).then((result) => {
                    if (result.isConfirmed) {
                        history.back();
                    }{
                    }
                })
            </script>
        <?php
    }
}


?>