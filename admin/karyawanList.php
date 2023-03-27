<?php

include "assets/view/header.php";
include "../system/querySQL.php";

$query = mysqli_query($con, "SELECT * FROM karyawan a INNER JOIN divisi b ON a.idDivisi = b.idDivisi ORDER BY idKaryawan ASC");
$no = 1;

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Karyawan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Karyawan
                            </div>
                            <div class="card-body">
                                <table class="table-responsive" id="datatablesSimple">
                                    <div class="mt-2 mb-3">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#inputKaryawan">+ Tambah Karyawan</button>&nbsp;
                                        <a class="btn btn-success" type="button" href="assets/view/exportDataKaryawan.php"><i class="fa-solid fa-print"></i> Export Data Karyawan</a>
                                        <br><br> ( <span class="text-danger"><b>*</b></span>&nbsp;) klik pada foto untuk menampilkan foto utuh <br><br>
                                    </div>    
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="">No</th>
                                            <th>Nama</th>
                                            <th>Foto<span class="text-danger"><b>*</b></span></th>
                                            <th>Divisi</th>
                                            <th>Username</th>
                                            <th class="text-center" colspan="4">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($x = mysqli_fetch_assoc($query)){
                                                $poto = $x['foto'];

                                        ?>
                                            <tr id="zx">
                                                <td><?= $no ?></td>
                                                <td><?= $x['nama'] ?></td>
                                                <td>
                                                    <div class="text-center mb-2">
                                                        <div data-toggle="modal" data-target="#viewFoto<?= $x['idKaryawan'] ?>">
                                                            <img src="<?= ($x['foto']=="")
                                                                        ? "assets/img/Karyawan/img_avatar.png"
                                                                        : "assets/img/karyawan/$poto"
                                                                    ?>" class="rounded-circle" alt="<?= $poto ?>" style="height:90px;">
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#foto<?= $x['idKaryawan'] ?>">Ganti Foto</button>
                                                        <!-- <button class="btn btn-secondary btn-sm" ">View</button> -->
                                                    </center>
                                                    </td>
                                                <td><?= $x['namaDivisi'] ?></td>
                                                <td><?= $x['username'] ?></td>
                                                <td>
                                                    <button class="btn btn-info d-flex mx-auto mt-2 mb-2" data-toggle="modal" data-target="#d<?= $x['idKaryawan'] ?>"><i class="fa-solid fa-eye"></i></button> 
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning d-flex mx-auto mt-2 mb-2" data-toggle="modal" data-target="#e<?= $x['idKaryawan'] ?>"><i class="fa-sharp fa-solid fa-file-pen"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success d-flex mx-auto mt-2 mb-2" data-toggle="modal" data-target="#a<?= $x['idKaryawan'] ?>"><i class="fa-solid fa-user"></i></button>
                                                </td>
                                                <td>
                                                    <a href="../system/delete.php?status=x&del=<?= $x['idKaryawan'] ?>" id="hapus" class="btn btn-danger d-flex mx-auto mt-2 mb-2" style="width: 40px ;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            include "assets/view/detailKaryawan.php";
                                            include "assets/view/viewFoto.php";
                                            include "assets/view/editKaryawan.php";
                                            include "assets/view/gantiFoto.php";
                                            include "assets/view/tambahKaryawan.php";
                                            include "assets/view/editAkun.php";
                                        $no++;}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php

include "assets/view/footer.php";

?>
