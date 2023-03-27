<?php
include "../system/querySQL.php";


    include '../system/koneksi.php';

    // for each year from the one specified to the one after current
    
    
$queryTanggal = mysqli_fetch_all(mysqli_query($con,"SELECT namaDivisi FROM divisi ORDER BY idDivisi DESC"),MYSQLI_ASSOC);

$tahunDari = 2019;
$tanggalDari = 1;
$bulanDari = 1;

?>


<div class="modal fade" id="alpa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Pilih Tanggal</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <input type="hidden" name="x" value="<?= $x['keterangan'] ?>">
            <div class="modal-body">
                <form action="../system/alpa.php" method="POST">
                    
                        <div class="row mb-3">
                            <center>
                                <div class="col-4">
                                    <input name="alpa" type="date" class="form-control">
                            </center>
                            </div>
                            <button name="simpanData" type="submit" class="btn btn-primary" id="">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>