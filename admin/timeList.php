<?php

include "assets/view/header.php";
include "../system/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM jam");
$no = 1;

?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Jadwal Kerja</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Jadwal Kerja</li>
                        </ol>
                        <div class="card mt-4 mb-4">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ketarangan</th>
                                            <th>Waktu</th>
                                            <th>Edit Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($x = mysqli_fetch_assoc($query)){

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td> 
                                                    Absen <?=$x['keterangan']?>
                                                </td>
                                                <td><?= $x['mulai']." - ".$x['selesai'] ?></td>
                                                <td>
                                                    <button class="btn btn-success d-flex mx-auto mt-2 mb-2" data-toggle="modal" data-target="#t<?= $x['keterangan'] ?>"><i class="fa-sharp fa-solid fa-file-pen"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                        include "assets/view/editWaktu.php";
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
