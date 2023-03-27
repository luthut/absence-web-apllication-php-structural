
<div class="modal fade" id="exportAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Export Absen Berdasarkan:</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <input type="hidden" name="x" value="">
            <div class="modal-body">
                <center>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalKaryawan">
                                Nama
                            </button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalDivisi">
                                Divisi
                            </button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalTanggal">
                                    Tanggal
                            </button>
                        </div>
                        <div class="col-3">
                        <a href="assets/view/exportAbsen.php" class="btn btn-primary">
                                Semua
                            </a>
                        </div>
                    </div>
                </center>
            </div>
                <?php

                ?>
        </div>
    </div>
</div>