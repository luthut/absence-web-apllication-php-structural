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
include "koneksi.php";

$idForFoto = $_POST['id'];
$antiduplikat=uniqid();
$ektensi = array('png','jpg','jpeg','JPG');
$namaimg=$_FILES['uFoto']['name'];
$sizeimg=$_FILES['uFoto']['size'];
$ext=PATHINFO($namaimg, PATHINFO_EXTENSION);

if ($_FILES["uFoto"]["error"]==4){


?>

        <script>
            Swal.fire({
                title: 'Anda Belum Mengupload Foto',
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
                confirmButtonText: 'Kembali'
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
                cancelButtonColor: '#f71b4f'
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
    move_uploaded_file($_FILES['uFoto']['tmp_name'], "../admin/assets/img/karyawan/$foto");

    $hajar = mysqli_query($con, "UPDATE karyawan SET

                                    foto = '$foto'

                                    WHERE idKaryawan = $idForFoto
                                ");

?>

<script>
    Swal.fire({
        title: 'Berhasil Mengupdate Foto',
        icon: 'success',
        confirmButtonColor: '#00c4aa',
        cancelButtonColor: '#f71b4f'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }{
        }
    })
</script>

<?php
}
?>