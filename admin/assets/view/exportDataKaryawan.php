<?php
//import koneksi ke database
include "../../../system/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM karyawan a INNER JOIN divisi b ON a.idDivisi = b.idDivisi ORDER BY idKaryawan ASC");
$no = 1;

?>
<html>
<head>
  <title>Data Karyawan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Data Karyawan</h2>
			<h4></h4>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="absenExport" >
                    <div class="mt-2 mb-3">
                       
                    </div>    
                    <thead class="thead-dark">
                        <tr>
                            <th scope="">No</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>username</th>
                            <th>Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            while($x = mysqli_fetch_assoc($query)){

                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $x['nama'] ?></td>
                                <td><?= $x['namaDivisi'] ?></td>
                                <td><?= $x['alamat'] ?></td>
                                <td><?= $x['telepon'] ?></td>
                                <td><?= $x['email'] ?></td>
                                <td><?= $x['username'] ?></td>
                                <td><?= $x['akses'] ?></td>
                            </tr>
                        <?php
                        $no++;}
                        include 'printSelect.php';
                        ?>
                    </tbody>
                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#absenExport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>