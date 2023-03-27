<?php
include "../system/querySQL.php";


?>


<div class="modal fade" id="a<?= $x['idKaryawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Edit Akun</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="../system/prosesEditAkun.php" method="POST">
                    <input type="hidden" value="<?= $x['idKaryawan'] ?>" name="id">
                    <input type="hidden" value="<?= $x['passwd'] ?>" name="passAwal">
                    <div class="">
                        <span>
                            <b>
                                Akses
                            </b>
                        </span>
                    </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="opsi1" >Admin</label>
                            <input name="akses" value="admin" type="radio" class="form-check-input" id="opsi1" <?= ($x['akses'] == 'admin') ? 'checked' : '' ?>>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                            <label for="opsi2" class="form-check-label">User</label>
                            <input name="akses" value="user" type="radio" class="form-check-input" id="opsi2" <?= ($x['akses'] == 'user') ? 'checked' : '' ?>>
                        </div>
                    <div class="mb-3">
                        <label for="username" class="form-label"><b>Username</b></label>
                        <input name="user" value="<?= $x['username'] ?>" type="text" maxlength="12" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label"><b>Password Baru</b></label>
                        <input name="passwd" type="password" class="form-control" id="pwd" placeholder="kosongkan jika tidak ingin mengganti password">
                    </div>
                    <button name="simpanDataAkun" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>