<?php



include "assets/view/header.php";
include "../system/querySQL.php";



?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="btn-group">
                                <div class="col-xl-3 col-md-4 d-inline-flex mx-auto mb-3 mt-3">
                                    <a href="karyawanList.php">
                                        <div class="btn btn-danger text-white mb-6 btn-block" style="width:250px;">
                                            <h4 class="card-body">Jumlah Karyawan</h4>
                                            <div class="card-body display-3 mb-4"><?= mysqli_num_rows($karyawanCount) ?></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-md-4 d-inline-flex mx-auto mb-3 mt-3">
                                    <a href="divisiList.php">
                                        <div class="btn btn-success text-white mb-6 btn-block" style="width:250px;">
                                            <h4 class="card-body">Jumlah Divisi</h4>
                                            <div class="card-body display-3 mb-4"><?= mysqli_num_rows($divisiCount) ?></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-md-4 mx-auto mb-3 mt-3">
                                    <a href="absensi.php">
                                        <div class="btn btn-warning text-white mb-6 btn-block" style="width:250px;">
                                            <h4 class="card-body">Jumlah Absensi</h4>
                                            <div class="card-body display-3 mb-4"><?= mysqli_num_rows($absensiCount) ?></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-md-4 mx-auto mb-3 mt-3">
                                    <a href="../absen.php">
                                        <div class="btn btn-info text-white mb-6" style="width:250px;">
                                            <h4 class="card-body">Halaman Absen</h4>
                                            <div class="card-body display-3 mb-4"><i class="fa-sharp fa-solid fa-newspaper"></i></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    </div>
                </main>

<?php

include "assets/view/footer.php";

?>
