<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magang Technos</title>
    <link href="../css/styles1.css" rel="stylesheet" />
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
</body>
</html>

<?php

include "koneksi.php";


$karyawan = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['addr'];
$phone = $_POST['nop'];
$mail = $_POST['mail'];
$gender = $_POST['gender'];
$divisi = $_POST['divisi'];

if($nama == NULL || $alamat == NULL || $phone == NULL || $gender == NULL || $divisi == NULL || $mail == NULL){
    ?>
        <script>
            Swal.fire({
                title: 'Pastikan Form sudah Terisi Semua',
                icon: 'warning',
                confirmButtonColor: '#00c4aa',
                cancelButtonColor: '#f71b4f',
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
    

    $hajar = mysqli_query($con, "UPDATE karyawan SET
    nama = '$nama',
    alamat = '$alamat',
    telepon = '$phone',
    gender = '$gender',
    email = '$mail',
    idDivisi = $divisi

    WHERE idKaryawan = $karyawan
");



    if ($hajar == TRUE){
        ?>
            <script>
                Swal.fire({
                    title: 'Data Berhasil di Update',
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