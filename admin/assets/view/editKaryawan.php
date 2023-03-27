<?php
include "../system/querySQL.php";


?>


<div class="modal fade" id="e<?= $x['idKaryawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Edit Data Karyawan</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="../system/prosesEdit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $x['idKaryawan'] ?>">
                    <div class="mb-3">
                        <label for="namaKaryawan" class="form-label"><b>Nama Karyawan</b></label>
                        <input name="nama" value="<?= $x['nama'] ?>" type="text" class="form-control" id="namaKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="alamatKaryawan" class="form-label"><b>Alamat</b></label>
                        <input name="addr" value="<?= $x['alamat'] ?>" type="text" class="form-control" id="alamatKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="teleponKaryawan" class="form-label"><b>Nomor Telepon</b></label>
                        <input name="nop" value="<?= $x['telepon'] ?>" type="text" maxlength="15" class="form-control" id="telepomKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="emailKaryawan" class="form-label"><b>Email</b></label>
                        <input name="mail" value="<?= $x['email'] ?>" type="email" class="form-control" id="emailKaryawan">
                    </div>
                    <div>
                        <label for="gender"><b>Jenis Kelamin</b></label>
                            <select class="form-select mb-3" name="gender" class="form-control" id="gender">
                                <option value="L" <?= ($x['gender'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= ($x['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                    </div>
                    <div>
                        <label for="divisi"><b>Divisi</b></label>
                            <select class="form-select mb-3" name="divisi" class="form-control" id="divisi">
                                <?php
                                    while ($divisi = mysqli_fetch_assoc($divisiSelectList)){
                                ?>
                                <option value="<?= $divisi['idDivisi'] ?>" <?= ($x['idDivisi'] == $divisi['idDivisi']) ? 'selected' : '' ?>><?= $divisi['namaDivisi'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                    </div>
                    <button name="simpanData" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>