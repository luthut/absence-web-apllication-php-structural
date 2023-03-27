<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link href="../css/styles1.css" rel="stylesheet" />
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
</body>
</html>

<?php

include "koneksi.php";
$idHapus = $_GET['del'];
$statusDel = $_GET['status'];

if($statusDel == 'betul'){

    $delQuery = mysqli_query($con, "DELETE FROM absensi WHERE idKaryawan = $idHapus");
    $delQuery = mysqli_query($con, "DELETE FROM karyawan WHERE idKaryawan = $idHapus");

    header('location:../admin/karyawanList.php');

}else{

?>
<script>
    Swal.fire({
        title: 'Hapus?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00c4aa',
        confirmButtonText: 'ya'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="delete.php?status=betul&del=<?= $idHapus ?>";
        }else if(result.dismiss === Swal.DismissReason.cancel){
            window.location.href="../admin/karyawanList.php";
        }
    })
</script>

<?php
}


// $delQuery = mysqli_query($con, "DELETE FROM karyawan WHERE idKaryawan = $idHapus");

// if($delQuery == TRUE){

//     echo    "<script>
//             alert ('Berhasil Menghapus Data');
//             window.location.href = '../admin/karyawanList.php';
//             </script>";
// }else{
    
//     echo    "<script>
//             alert ('Gagal Menghapus Data');
//             window.location.href = '../admin/karyawanList.php';
//             </script>";
// }

?>