<?php

include "assets/view/header.php";
include "system/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM jam");
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($x = mysqli_fetch_assoc($query)){

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>Jam <?= $x['keterangan'] ?></td>
                                                <td><?= $x['mulai'] ?></td>
                                                <td><?= $x['selesai'] ?></td>
                                                <td> <a href="aksi/editTime.php?id=<?= $x['idWaktu'] ?>" class="btn btn-primary"><i class="fa-duotone fa-file-pen"></i>Edit</a> </td>
                                            </tr>
                                        <?php
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
