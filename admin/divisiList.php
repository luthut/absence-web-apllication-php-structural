<?php

include "assets/view/header.php";
include "../system/koneksi.php";
include "../system/querySQL.php";

$query = mysqli_query($con, "SELECT *, (SELECT COUNT(idKaryawan) FROM karyawan WHERE idDivisi = divisi.idDivisi) AS jumlahPerDivisi FROM divisi;");
$numero = 1;



?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Divisi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Divisi</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Nama Divisi</th>
                                            <th class="text-center">Jumlah Karyawan</th>
                                            <!-- <th class="text-center">Detail</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            while($x = mysqli_fetch_assoc($query)){

                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $x['namaDivisi'] ?></td>
                                                <td class="text-center"><?= $x['jumlahPerDivisi'] ?></td>
                                                <!-- <td class="text-center"> <a href="aksi/detailDiv.php?id=<?= $x['idDivisi'] ?>" class="btn btn-primary">Lihat</a> </td> -->
                                            </tr>
                                        <?php
                                        $numero++;}
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
