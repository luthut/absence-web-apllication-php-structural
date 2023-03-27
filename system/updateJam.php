<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>jam</title>
        <link rel="stylesheet" href="css/all.css">
        <script src="../js/all.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles1.css" rel="stylesheet" />
        <script src="../js/sweetalert2.all.min.js"></script>
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
    </body>

<?php
include '../system/koneksi.php';

$jamMulai = date("H:i", strtotime($_POST['start']));
$jamSelesai = date("H:i", strtotime($_POST['end']));
$idW= $_POST['idjam'];

$queryJam = mysqli_query($con,"UPDATE jam SET mulai = '$jamMulai', selesai = '$jamSelesai' WHERE idWaktu = $idW" );

if($queryJam == TRUE){

    
    ?>
<script>
    Swal.fire({
        title: 'Waktu Diupadate',
        icon: 'success',
        confirmButtonColor: '#00c4aa',
        confirmButtonText: 'kembali'}).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../admin/timeList.php";
            }{
            }
        })
    </script>
<?php

}