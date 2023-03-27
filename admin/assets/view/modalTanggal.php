<?php
include "../system/querySQL.php";


    include '../system/koneksi.php';

    // for each year from the one specified to the one after current
    
    
$queryTanggal = mysqli_fetch_all(mysqli_query($con,"SELECT namaDivisi FROM divisi ORDER BY idDivisi DESC"),MYSQLI_ASSOC);

$tahunDari = 2019;
$tanggalDari = 1;
$bulanDari = 1;

?>


<div class="modal fade" id="modalTanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Export Absen Berdasarkan Tanggal</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <input type="hidden" name="x" value="<?= $x['keterangan'] ?>">
            <div class="modal-body">
                <form action="assets/view/exportAbsen_Tanggal.php" method="POST">

                    <input type="hidden" name="date" value="<?= date('d') ?>" id="tglH">
                    <input type="hidden" name="month" value="<?= date('m') ?>" id="blnH">
                    <input type="hidden" name="tahun" value="<?= date('Y') ?>" id="thnH">
                    
                        <div class="row mb-3">
                            <div class="col-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="others" onclick="enable_text(this.checked)" class="medium" id='tgl' />
                                        <label for="tgl" class="mb-2"><b>Tanggal</b></label>
                                    </div>
                                    <select name="date" id="tanggal" class="form-select"  style="width:80px;" disabled>
                                    <?php
                                        foreach(range($tanggalDari, $tanggalDari + 30) as $date) {
                                    ?>
                                        <option value="<?= (strlen($date)<2)?"0".$date:$date ?>" <?= ($date)==date('j')?"selected":"" ?>> <?= $date ?> </option>
                                    <?php
                                        }
                                    ?>
                                    </select>

                            </div>
                            <div class="col-4">
                                <div class="form-check mr-3">
                                    <input type="checkbox" name="others" onclick="enable_text(this.checked)" class="medium" id='bln' />
                                    <label for="bln" class="mb-2"><b>Bulan</b></label>
                                </div>
                                <select name="month" id="bulan" class="form-select"  style="width:80px;" disabled>
                                    <?php
                                        foreach(range($bulanDari, $bulanDari + 11) as $month) {
                                    ?>
                                        <option value="<?= (strlen($month)<2)?"0".$month:$month ?>" <?= ($month)==date('n')?"selected":"" ?>> <?= $month ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="others" onclick="enable_text(this.checked)" class="medium" id='thn' />
                                        <label for="thn" class="mb-2"><b>Tahun</b></label>
                                    </div>
                                    <select name="tahun" id="tahun" class="form-select"  style="width:100px;" disabled>
                                            <?php
                                                $tahunSekarang = date('Y');
                                                foreach(range($tahunDari, date('Y') + 8) as $year) {
                                            ?>
                                                <option value="<?= $year ?>" <?= ($year==$tahunSekarang)?'selected':'' ?>> <?= $year ?> </option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                    </div>
                        </div>
                            <button name="simpanData" type="submit" class="btn btn-primary" id="">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>