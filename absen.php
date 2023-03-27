<?php

session_start();

if ($_SESSION){

include 'system/koneksi.php';
// include 'system/koneksi.php';
date_default_timezone_set('Asia/Makassar');
// $jadwal = mysqli_fetch_assoc(mysqli_query($con,"SELECT keterangan a, masukMulai b, masukSelesai c, pulangMulai d, pulangSelesai e FROM jam WHERE idWaktu=1"));
// $jadwal = mysqli_fetch_assoc(mysqli_query($con,"SELECT keterangan a, masukMulai b, masukSelesai c, pulangMulai d, pulangSelesai e FROM jam WHERE idWaktu=2"));
$presentTime = date('H:i:s');
$idKaryawan = $_SESSION['karyawan'];

$profilKaryawan = mysqli_fetch_assoc(mysqli_query($con,"SELECT foto FROM karyawan WHERE idKaryawan = $idKaryawan"));
$queryTampilAbsen = mysqli_fetch_all(mysqli_query($con,"SELECT a.*, b.nama, b.foto FROM absensi a JOIN karyawan b ON a.idKaryawan=b.idKaryawan WHERE a.idKaryawan = $idKaryawan ORDER BY a.tanggal DESC LIMIT 3"),MYSQLI_ASSOC);
$jadwal = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM jam"),MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Magang Technos</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- <script src="js/all.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="css/all.css">
        <script src="js/all.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet" />
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body id="tsmgng">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#tsmgng">Project Magang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#riwayat">Riwayat</a></li>
                        <?= ($_SESSION['akses'] == 'admin')
                                ?'<li class="nav-item"><a class="nav-link" href="index.php">Admin</a></li>'
                                :"" ?>
                        <!--<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                        <li class="nav-item" id="keluar" onclick="konfirmasiKeluar()">
                            <a class="nav-link"><i class="fa-solid fa-door-closed" id="pintuKeluar"></i> <span class="fw-bold">Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-light bg-gradient text-light br-responsive">
            <div class="text-center mb-4">
                <img src="admin/assets/img/Karyawan/<?= ($profilKaryawan['foto'] !== "") ? $profilKaryawan['foto'] : 'img_avatar.png'?>" class="rounded-circle" alt="<?= $profilKaryawan ?>" style="height:250px;">
            </div>
            <div class="container px-4 text-center text-black">
                <span class="fw-bolder display-4 mb-3"><?= $_SESSION['nama'] ?></span><br>
                <p class="display-5 mb-3 mt-3">Divisi <?= $_SESSION['divisi'] ?></p>
                <div class="container">
                    <pre>
                        <!-- <?= print_r($profilKaryawan) ?> -->
                    </pre>

                        <div class="mt-3 mx-auto">
                            <?= ($presentTime > $jadwal[0]['mulai'])
                                ? '<a class="btn btn-lg btn-danger mt-3 text-light" href="system/absenCheck.php?absen=masuk">Absen Masuk</a>'
                                : '<button class="btn btn-lg btn-secondary mt-3 text-light" href="" disabled>Absen Masuk</button>'
                            ?>
                            <br>
                            <?= ($presentTime > $jadwal[1]['mulai'])
                                ? '<a class="btn btn-lg btn-info mt-3 text-light" href="system/absenCheck.php?absen=pulang">Absen Pulang</a>'
                                : '<button class="btn btn-lg btn-secondary mt-3 text-light" href="" disabled>Absen Pulang</button>'
                            ?>

                        </div>
                </div>
            </div>
        </header>
        <!-- Riwayat section-->
        <section id="riwayat">
            <div class="container px-4">
                <div class="row gx-4 justify-content-center">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-6">
                                <h2>Riwayat Absensi</h2>
                            </div>
                            <div class="col-6 ml-5">
                                <a type="button" class="btn btn-outline-primary float-end" style="text-decoration:none;" href="riwayatLengkap.php">Lebih Lengkap</a>
                            </div>
                        </div>
                        <?php
                            $numero = 1;
                            foreach ($queryTampilAbsen as $riwayat) {

                                // echo '<pre>';
                                //     print_r($riwayat);
                                // echo '</pre>';
                                
                            
                        ?>
                        <center>
                            <div class="card mt-5" style="width:49rem;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 text-center">
                                            <div class="display-6" style="padding-top:20px;">
                                                <?= $numero ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card text-white bg-dark mt-4" style="height:2rem;width:8rem;font-weight:bolder;padding-top:3px">
                                                <?= $riwayat['tanggal'] ?>
                                            </div>
                                        </div>
                                        <div class="col-3" style="font-weight:bold;padding-top:30px">
                                        <h5>Masuk</h5>
                                                <?= ($riwayat['statusMasuk'] == 'hadir')
                                                    ? "<span class = 'text-success'>Hadir</span>"
                                                    : (
                                                        ($riwayat['statusMasuk'] == 'terlambat')
                                                        ? "<span class = 'text-danger'>Terlambat</span>"
                                                        : "<span class = 'text-warning'>Belum Absen</span>")
                                                    ;
                                                ?>&nbsp;
                                            ( <?= $riwayat['masuk'] ?> )
                                            <br>
                                        </div>
                                        <div class="col-3" style="font-weight:bold;padding-top:30px">
                                        <h5>Pulang</h5>
                                            <?= ($riwayat['statusPulang'] == 'hadir')
                                                ? "<span class = 'text-success'>Hadir</span>"
                                                : (
                                                    ($riwayat['statusPulang'] == 'terlambat')
                                                    ? "<span class = 'text-danger'>Terlambat</span>"
                                                    : "<span class = 'text-warning'>Belum Absen</span>")
                                                ;
                                            ?>&nbsp;
                                            ( <?= $riwayat['pulang'] ?> )
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </center>
                        <?php
                        $numero++;
                    }
                        ?>
                    </div>
                </div>
            </div>
            
        </section>
        </section> -->
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Luth Septian &copy; Magang Techno's Studio 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts1.js"></script>
        <script src="js/tampilJam.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
            })
        </script>
        <script>
            function konfirmasiKeluar(){
                Swal.fire({
                    title: 'Keluar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#00c4aa',
                    cancelButtonColor: '#f71b4f',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'system/logout.php';
                        }{
                        }
                        })
                }
        </script>
        <script>
            $("#keluar").mouseover(function(){
            $("#pintuKeluar").addClass("fa-solid fa-door-open text-danger").removeClass("fa-solid fa-door-closed")
            })
            $("#keluar").mouseout(function(){
            $("#pintuKeluar").addClass("fa-solid fa-door-closed").removeClass("fa-solid fa-door-open text-danger")
            })
        </script>
    </body>
</html>

<?php

}else{
    echo
    "<script>
        alert('Silahkan Login Terlebih Dahulu');
        history.back();
    </script>";
}

?>
