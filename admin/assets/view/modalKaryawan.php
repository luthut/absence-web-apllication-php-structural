<?php
include "../system/querySQL.php";


    include '../system/koneksi.php';


$queryNama = mysqli_fetch_all(mysqli_query($con,"SELECT nama FROM karyawan ORDER BY nama DESC"),MYSQLI_ASSOC);



?>


<div class="modal fade" id="modalKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Export Absen Berdasarkan Nama Karyawan</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <input type="hidden" name="x" value="<?= $x['keterangan'] ?>">
            <div class="modal-body">
                <form action="assets/view/exportAbsen_Karyawan.php" method="POST">
                <select class="form-select mb-3" aria-label="Default select example" name="eNama">
                    <option selected>Silahkan Pilih Nama Karyawan</option>
                    <?php
                        foreach ($queryNama as $namaKaryawan) {
                            ?>
                    <option value="<?= $namaKaryawan['nama'] ?>"><?= $namaKaryawan['nama'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                    <button name="simpanData" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>