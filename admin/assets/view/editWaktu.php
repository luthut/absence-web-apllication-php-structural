<?php
include "../system/querySQL.php";


$mulai = $x['mulai'];
$selesai = $x['selesai'];



?>


<div class="modal fade" id="t<?= $x['keterangan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Edit Data Karyawan</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- <input type="hidden" name="x" value="<?= $x['keterangan'] ?>"> -->
            <div class="modal-body">
                <form action="../system/updateJam.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idjam" value="<?= $x['idWaktu'] ?>" id="">
                    <div class="mb-3">
                        <label for="waktu" class="form-label"><b>Dari</b></label>
                        <input name="start" value="<?= $mulai ?>" type="time" class="form-control" id="waktu">
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label"><b>Sampai</b></label>
                        <input name="end" value="<?= $selesai ?>" type="time" class="form-control" id="waktu">
                    </div>
                    <button name="simpanData" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>