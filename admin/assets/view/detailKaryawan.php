<div class="modal fade" id="d<?= $x['idKaryawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <div>
                <h3 class="modal-title" id="exampleModalCenterTitle"><?= $x['nama'] ?></h3>
            </div>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <?php
                if($x['akses'] === 'admin'){
            ?>
                <div class="row mb-3">
                    <div>
                        <h3 class=" text-center text-danger">[<?= $x['akses'] ?>]</h3>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="mt-3 mb-3 col text-center">
                <img src="assets/img/Karyawan/<?= $x['foto'] ?>" alt="" width="45%">
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <span style="font-weight:bold">Divisi</span>
                </div>
                <div class="col-md-1">
                    <span style="font-weight:bold">:</span>
                </div>
                <div class="col-md-6">
                    <?= $x['namaDivisi'] ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <span style="font-weight:bold">Alamat</span>
                </div>
                <div class="col-md-1">
                    <span style="font-weight:bold">:</span>
                </div>
                <div class="col-md-6">
                    <?= $x['alamat'] ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <span style="font-weight:bold">Nomor Telepon</span>
                </div>
                <div class="col-md-1">
                    <span style="font-weight:bold">:</span>
                </div>
                <div class="col-md-6">
                    <?= $x['telepon'] ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <span style="font-weight:bold">Jenis Kelamin</span>
                </div>
                <div class="col-md-1">
                    <span style="font-weight:bold">:</span>
                </div>
                <div class="col-md-6">
                    <?php
                        if ($x['gender'] == 'L'){
                            echo "<i class='fa-solid fa-mars text-info'></i> Jantan ";
                        }elseif($x['gender'] == 'P'){
                            echo "<i class='fa-solid fa-venus text-danger'></i> Betina ";
                        }
                    ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-5">
                    <span style="font-weight:bold">Email Karyawan</span>
                </div>
                <div class="col-md-1">
                    <span style="font-weight:bold">:</span>
                </div>
                <div class="col-md-6">
                    <?= $x['email'] ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button id='' type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
    </div>
</div>