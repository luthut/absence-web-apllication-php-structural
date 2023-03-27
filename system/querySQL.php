<?php

include "koneksi.php";

// index.php
$karyawanCount = mysqli_query($con, "SELECT * FROM karyawan");
$divisiCount = mysqli_query($con, "SELECT * FROM divisi");
$absensiCount = mysqli_query($con, "SELECT * FROM absensi");

// divisiList.php
$a = mysqli_query($con, "SELECT idKaryawan, nama, idDivisi FROM karyawan");

// formTambahKaryawan
$divisi = mysqli_query($con,"SELECT namaDivisi FROM divisi");

$divisiSelectList = mysqli_query($con, "SELECT * FROM  divisi");
$shiftSelectList = mysqli_query($con, "SELECT * FROM  jam");


// login


?>