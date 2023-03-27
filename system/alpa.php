<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Absen</title>
    <link href="../css/styles1.css" rel="stylesheet" />
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
</body>
</html>

<?php

include "koneksi.php";

$tanggal = $_POST['alpa'];
$today = date('Y-m-d');

if ($tanggal == ""){

        ?>
    <script>
        Swal.fire({
            title: 'isi Tanggal Terlebih Dahulu',
            icon: 'error',
            confirmButtonColor: '#00c4aa',
            confirmButtonText: 'Ya'
            }).then((result) => {
            if (result.isConfirmed) {
                history.back();
            }{
            }
        })
    </script>
        <?php

}elseif($tanggal > $today){

    ?>
    <script>
        Swal.fire({
            title: 'Absen Belum Ada',
            text: 'Tanggal yang dimasukan tidak boleh lebih dari tanggal hari ini',
            icon: 'error',
            confirmButtonColor: '#00c4aa',
            confirmButtonText: 'Ya'
            }).then((result) => {
            if (result.isConfirmed) {
                history.back();
            }{
            }
        })
    </script>
        <?php

}else{

$xab = mysqli_query($con,"SELECT * FROM karyawan WHERE NOT EXISTS (SELECT * FROM absensi WHERE absensi.idKaryawan=karyawan.idKaryawan AND absensi.tanggal = '$tanggal')");

    if(mysqli_num_rows($xab) != 0){

        while ($val = mysqli_fetch_assoc($xab)){
        
            $idTersangka = $val['idKaryawan'];

            mysqli_query($con,"INSERT INTO absensi (tanggal,idKaryawan) VALUE('$tanggal',$idTersangka)");
        }

        $alpaCount=mysqli_num_rows($xab);
        ?>
    <script>
        Swal.fire({
            title: '<?= $alpaCount ?> Karyawan Tidak Hadir',
            icon: 'warning',
            confirmButtonColor: '#00c4aa',
            confirmButtonText: 'Ya'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../admin/absensi.php';
            }{
            }
        })
    </script>
        <?php
    }else{

        
        
        ?>
    <script>
        Swal.fire({
            title: 'Semua Karyawan Mengisi Absen',
            icon: 'success',
            confirmButtonColor: '#00c4aa',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../admin/absensi.php';
            }{
            }
        })
    </script>
        <?php

    }
}