<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
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
include "koneksi.php";

session_start();
date_default_timezone_set('Asia/Makassar');

if(!$_SESSION){

    $username = htmlspecialchars($_POST['usern']);
    $passwd = md5($_POST['pass']);

    if ($username=='' || $passwd==''){

        ?>
            <script>
                Swal.fire({
                    title: 'Username dan Password tidak Boleh Kosong',
                    icon: 'error',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'kembali'}).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../login.php';
                        }{
                        }
                        })
            </script>
        <?php
            session_destroy();
    }else{
        $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT a.*, c.namaDivisi AS divisi FROM karyawan a
                                        JOIN divisi c ON a.idDivisi = c.idDivisi
                                        WHERE username = '$username'"));
        
        if($result == FALSE){
            ?>
            <script>
                Swal.fire({
                    title: 'Akun Tidak ada',
                    icon: 'error',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'kembali'}).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../login.php';
                        }{
                        }
                        })
            </script>
        <?php
            session_destroy();
        }elseif($result == TRUE){

            $user = $result['username'];
            $pass = $result['passwd'];
            
            if($passwd != $pass){
                ?>
                    <script>
                        Swal.fire({
                            title: 'Password Salah',
                            icon: 'error',
                            confirmButtonColor: '#00c4aa',
                            confirmButtonText: 'kembali'}).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../login.php';
                                }{
                                }
                                })
                    </script>
                <?php
                session_destroy();
            }elseif($passwd == $pass){

                if ($result['akses'] == 'admin'){

                    $_SESSION['usern'] = $result['username'];
                    $_SESSION['akses'] = $result['akses'];
                    ?>
                        <script>
                            Swal.fire({
                                title: 'Ingin Absen Dulu?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#00c4aa',
                                cancelButtonColor: '#f71b4f',
                                confirmButtonText: 'Dashboard Admin',
                                cancelButtonText: 'Absen'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../admin/index.php';
                                }else{
                                    <?php
                                        $_SESSION['usern'] = $result['username'];
                                        $_SESSION['karyawan'] = $result['idKaryawan'];
                                        $_SESSION['nama'] = $result['nama'];
                                        $_SESSION['divisi'] = $result['divisi'];
                                        $_SESSION['akses'] = $result['akses'];
                                    ?>
                                    window.location.href = "../absen.php";
                                }
                            })
                        </script>
                    <?php

                    // echo "<script>
                    //         window.location.href = '../admin/index.php';
                    //     </script>";
                }else{

                    
                    $_SESSION['usern'] = $result['username'];
                    $_SESSION['karyawan'] = $result['idKaryawan'];
                    $_SESSION['nama'] = $result['nama'];
                    $_SESSION['divisi'] = $result['divisi'];
                    $_SESSION['akses'] = $result['akses'];
                    ?>
                    <script>
                        Swal.fire({
                            title: 'Selamat Datang',
                            text: "<?= $_SESSION['nama'] ?>",
                            icon: 'success',
                            confirmButtonColor: '#00c4aa',
                            confirmButtonText: 'Ok'}).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../absen.php';
                                }{
                                }
                                })
                    </script>
                    <?php
                }

            }
        }

    }

}elseif($_SESSION){
    header('location: login.php');
}

?>