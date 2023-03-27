<?php
include "../system/querySQL.php";


?>


<div class="modal fade" id="viewFoto<?= $x['idKaryawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <img src="<?= ($x['foto']=="")
                                            ? "assets/img/Karyawan/img_avatar.png"
                                            : "assets/img/karyawan/$poto"
                                        ?>" alt="">
        </div>
    </div>
</div>