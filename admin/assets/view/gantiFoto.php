<?php
include "../system/querySQL.php";


?>


<div class="modal fade" id="foto<?= $x['idKaryawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Update Foto</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="../system/prosesUpdateFoto.php" method="POST" enctype="multipart/form-data">
                    <center>
                        <input type="hidden" name="id" value="<?= $x['idKaryawan'] ?>">
                        <input class="form-file mb-3" type="file" name="uFoto">
                    </center>
                    <button name="simpanFoto" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>