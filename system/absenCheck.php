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

session_start();

// ceritanya mau ambil koneksi biar bisa akses database MYSQL
include 'koneksi.php';

// proses fetch GET, proses eksekusi Query SQL untuk ambil data dari tabel jam dan set Default Time Zone ke ASIA/MAKASSAR(GMT+8)
$absen = $_GET['absen'];
$query=mysqli_fetch_all(mysqli_query($con,'SELECT * FROM jam'),MYSQLI_ASSOC);
date_default_timezone_set('Asia/Makassar');

// set value AWAL untuk di input ke dalam tabel Database
$idKaryawan = $_SESSION['karyawan'];
$tanggal = date('Y-m-d');
$jam = date('H:i:s');
$status = '';

// include 'tanggal.php';


/*pengkondisian untuk menentukan apakah karyawan
yang bersangkutan dinyatakan HADIR/TERLAMBAT/ALPA*/


// *****************************************************************************************************************************************************

// condition ABSEN MASUK

if($absen == 'masuk'){

    $validasiAbsenMasuk = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM absensi WHERE idKaryawan = $idKaryawan AND tanggal = '$tanggal'"));
    

    if(!$validasiAbsenMasuk){

        $keterangan = $query[0]['keterangan'];
        $mulai = $query[0]['mulai'];
        $selesai = $query[0]['selesai'];

    
        if($jam >= $query[0]['mulai'] && $jam <= $query[0]['selesai']){
    
            $status = 'hadir';
            $inputQueryAbsen = mysqli_query($con,"INSERT INTO absensi VALUE ('', $idKaryawan, '$tanggal', '$jam', NULL, '$status',NULL)");
    
                ?>
            <script>
                Swal.fire({
                    title: 'Berhasil Absen',
                    text: 'Anda Berhasil mengisi absen kedatangan',
                    icon: 'success',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Ya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
                <?php
    
        }elseif($jam > $query[0]['selesai']){
    
            $status = 'terlambat';
            $inputQueryAbsen = mysqli_query($con,"INSERT INTO absensi VALUE ('', $idKaryawan, '$tanggal', '$jam', NULL, '$status',NULL)");
    
                ?>
            <script>
                Swal.fire({
                    title: 'Terlambat Absen',
                    text: 'Anda Terlambat melakukan Absen Kedatangan',
                    icon: 'warning',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Ya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
                <?php
        }elseif ($jam < $query[0]['mulai']) {
                ?>
                <script>
                    Swal.fire({
                        title: 'Absen Masuk Belum Dimulai',
                        icon: 'warning',
                        confirmButtonColor: '#00c4aa',
                        confirmButtonText: 'Ya'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../absen.php';
                        }{
                        }
                    })
                </script>
                    <?php
        }
    

    }else{
        $pulang = $validasiAbsenMasuk['pulang'];
        if ($validasiAbsenMasuk['tanggal'] == $tanggal && $validasiAbsenMasuk['masuk'] != NULL ){


        ?>
            <script>
                Swal.fire({
                    title: 'Anda Sudah Mengisi Absen',
                    text: 'silahkan absen pulang',
                    icon: 'info',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Ya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
        <?php
        }elseif($validasiAbsenMasuk['tanggal'] == $tanggal && $validasiAbsenMasuk['masuk'] == NULL ){
            $status = 'terlambat';
            $inputQueryAbsen = mysqli_query($con,"INSERT INTO absensi VALUE ('', $idKaryawan, '$tanggal', '$jam', NULL, '$status',NULL)");

            ?>
            <script>
                Swal.fire({
                    title: 'Terlambat Absen',
                    text: 'Anda Terlambat melakukan Absen Kedatangan',
                    icon: 'warning',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Ya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
                <?php

        }

    }
    

    


// *****************************************************************************************************************************************************    


// condition ABSEN PULANG

}elseif($absen == 'pulang'){
    echo $status;
    $validasiAbsenPulang = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM absensi WHERE idKaryawan = $idKaryawan AND tanggal = '$tanggal'"));
    $idAbsen = $validasiAbsenPulang['idAbsen'];
    if(!$validasiAbsenPulang){
        if($jam > $query[1]['selesai']){

            $status = 'terlambat';

        }elseif($jam < $query[1]['selesai']){

            $status = 'hadir';

        }

        $queryAbsenPulang = mysqli_query($con,"INSERT INTO absensi (pulang,statusMasuk,tanggal,idKaryawan,statusPulang) VALUE('$jam','alpa','$tanggal',$idKaryawan,'$status')");

        ?>
        <script>
            Swal.fire({
                title: 'Anda Belum Absen Masuk',
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

    }elseif ($validasiAbsenPulang['masuk'] !== NULL){

        $keterangan = $query[1]['keterangan'];
        $mulai = $query[1]['mulai'];
        $selesai = $query[1]['selesai'];
        
        if($validasiAbsenPulang['pulang'] !== NULL){
            ?>
            <script>
            Swal.fire({
                title: 'Sudah Absen Pulang Hari ini',
                icon: 'info',
                confirmButtonColor: '#00c4aa',
                confirmButtonText: 'Ya'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../absen.php';
                }{
                }
            })
        </script>
            <?php

        }elseif($validasiAbsenPulang['masuk'] != NULL && $jam >= $mulai && $jam <= $selesai){
    
            $status = "hadir";
            $queryAbsenPulang = mysqli_query($con,"UPDATE absensi SET pulang = '$jam', statusPulang = '$status' WHERE idAbsen = $idAbsen AND tanggal = '$tanggal'");
            echo $idAbsen;
            
            // if(){

            // }else{

            // }
            ?>
            <script>
                Swal.fire({
                    title: 'Berhasil Absen',
                    text: 'Anda Berhasil mengisi Absen Pulang',
                    icon: 'success',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Ya'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
        <?php
    
        }elseif($jam >= $selesai){
    
            $status = 'terlambat';

            $queryAbsenPulang = mysqli_query($con,"UPDATE absensi SET pulang = '$jam', statusPulang = '$status' WHERE idAbsen=$idAbsen AND tanggal = '$tanggal'");
            ?>
            <script>
                Swal.fire({
                    title: 'Terlambat',
                    text: 'Anda Terlambat Pulang',
                    icon: 'error',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Kembali'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../absen.php';
                    }{
                    }
                })
            </script>
        <?php
    
    
        }elseif($jam < $mulai){
    ?>
            <script>
                Swal.fire({
                    title: 'Absensi Belum Dimulai',
                    text: 'Silahkan Cek Kembali Waktu Kerja Anda',
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

       
    
        // echo
        // "<pre>";
        
        // print_r(array($jam,$query[1]['pulangMulai'],$query[1]['pulangSelesai'],$query));
        // die;
    
        // echo
        // "</pre>";
    }elseif($validasiAbsenPulang['masuk'] === NULL){


    ?>
        <script>
            Swal.fire({
                title: 'Anda Belum Absen Masuk',
                text: 'Silahkan Absen Masuk Terlebih Dahulu',
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