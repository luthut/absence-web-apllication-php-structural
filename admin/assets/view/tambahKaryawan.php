<?php

include "../system/querySQL.php";

?>


<div class="modal fade" id="inputKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Tambah Data Karyawan</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="../system/prosesInput.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username</label>
                        <input name="user" type="text" class="form-control" maxlength="12" id="Username" autofocus='on'>
                    </div>
                    <div class="mb-3">
                        <label for="namaKaryawan" class="form-label">Nama Karyawan</label>
                        <input name="nama" type="text" class="form-control" id="namaKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="alamatKaryawan" class="form-label">Alamat</label>
                        <input name="addr" type="text" class="form-control" id="alamatKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="teleponKaryawan" class="form-label">Nomor Telepon</label>
                        <input name="nop" type="text" class="form-control" maxlength="15" id="telepomKaryawan">
                    </div>
                    <div class="mb-3">
                        <label for="emailKaryawan" class="form-label">Email</label>
                        <input name="mail" type="email" class="form-control" id="emailKaryawan">
                    </div>
                    <div>
                        <label for="gender">Jenis Kelamin</label>
                            <select class="form-select mb-3" name="gender" class="form-control" id="gender">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                    </div>
                    <div>
                        <label for="divisi">Divisi</label>
                            <select class="form-select mb-3" name="divisi" class="form-control" id="divisi">
                                <?php
                                    while ($divisi = mysqli_fetch_assoc($divisiSelectList)){
                                ?>
                                <option value="<?= $divisi['idDivisi'] ?>"><?= $divisi['namaDivisi'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="mb-5">
                        <label for="foto"><b>Upload Foto</b></label><br>
                        <input type="file" name="foto" id="foto">
                    </div>
                    <button name="inputData" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>