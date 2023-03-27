<?php

include "assets/view/header.php";
include "../system/querySQL.php";

$query = mysqli_query($con, "SELECT a.*,b.*,c.namaDivisi FROM karyawan a JOIN absensi b ON a.idKaryawan=b.idKaryawan 
JOIN divisi c ON a.idDivisi=c.idDivisi ORDER BY b.tanggal DESC");
$no = 1;

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Absensi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Absensi</li>
                        </ol>
                        <div class="card mb-4">
                            <!-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Karyawan
                            </div> -->
                            <div class="card-body">
                                <table class="table-responsive" id="datatablesSimple">
                                    <div class="mt-2 mb-3">
                                        <a href="assets/view/exportAbsen.php" class="btn btn-success" data-toggle="modal" data-target="#exportAbsen"><i class="fa-solid fa-print"></i> Export Absensi</a> &nbsp; 
                                        <a href="../system/alpa.php" class="btn btn-danger" data-toggle="modal" data-target="#alpa">Validasi Absensi</a>
                                    </div>
                                    
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="">No</th>
                                            <th>Nama</th>
                                            <th>Divisi</th>
                                            <th>Tanggal</th>
                                            <th>Masuk</th>
                                            <th>Pulang</th>
                                            <th class="text-center" colspan="1">Detail Karyawan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($x = mysqli_fetch_assoc($query)){

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $x['nama'] ?></td>
                                                <td><?= $x['namaDivisi'] ?></td>
                                                <td class="text-center" style="font-weight:bold"><?= $x['tanggal'] ?></td>
                                                <td class="text-center" style="font-weight:bold"><?= ($x['masuk'] !== NULL )? $x['masuk'] : "<span class='text-warning'>Belum Absen</span>" ?>
                                                    <br>
                                                    <span class="<?= ($x['statusMasuk']=='hadir') ? "text-success" : (($x['statusMasuk'] == NULL) ? "text-warning" : "text-danger") ?>" style="font-weight:bolder">
                                                        <?= $x['statusMasuk']?>
                                                    </span></td>
                                                <td class="text-center" style="font-weight:bold"><?= ($x['pulang'] !== NULL )? $x['pulang'] : "<span class='text-warning'>Belum Absen</span>" ?>
                                                    <br>
                                                        <span class="<?= ($x['statusPulang']=='hadir') ? "text-success" : (($x['statusPulang'] == NULL) ? "text-warning" : "text-danger") ?>" style="font-weight:bolder">
                                                            <?= $x['statusPulang']?>
                                                        </span></td>
                                                <td>
                                                    <button class="btn btn-info d-flex mx-auto mt-2 mb-2" data-toggle="modal" data-target="#d<?= $x['idKaryawan'] ?>"><i class="fa-solid fa-eye"></i></button> 
                                                </td>
                                            </tr>
                                        <?php
                                            include "assets/view/detailKaryawan.php";
                                            include "assets/view/editKaryawan.php";
                                            include "assets/view/tambahKaryawan.php";
                                        $no++;}
                                        include "assets/view/printSelect.php";
                                        include "assets/view/modalKaryawan.php";
                                        include "assets/view/modalDivisi.php";
                                        include "assets/view/modalTanggal.php";
                                        include "assets/view/modalAlpa.php";
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
