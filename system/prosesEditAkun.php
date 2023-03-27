<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
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
include '../system/koneksi.php';
$id = $_POST['id'];
$akses = $_POST['akses'];
$user = $_POST['user'];
$pass = $_POST['passwd'];


if($user === ""){

    ?>
    <script>
        Swal.fire({
            title: 'Harap Isi Username',
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

}elseif($pass == ''){

    $updateAkun = mysqli_query($con,"UPDATE karyawan
                                            SET
                                            username = '$user',
                                            akses = '$akses'
                                    WHERE idKaryawan = $id");

            ?>
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    confirmButtonColor: '#00c4aa',
                    confirmButtonText: 'Kembali'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../admin/karyawanList.php";
                    }{
                    }
                })
            </script>

<?php

}else{

    $p = md5($pass);

    $updateAkun = mysqli_query($con,"UPDATE karyawan
                                            SET
                                            username = '$user',
                                            passwd = '$p',
                                            akses = '$akses'
                                    WHERE idKaryawan = $id");

                                        ?>
    <script>
        Swal.fire({
            title: 'Berhasil2',
            icon: 'success',
            confirmButtonColor: '#00c4aa',
            confirmButtonText: 'Kembali'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../admin/karyawanList.php";
            }{
            }
        })
    </script>

<?php

}




?>