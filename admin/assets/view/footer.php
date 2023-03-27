                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Luth &copy; Magang Technos Studio 2022</div>
                            <div>
                                <!-- <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="../js/tampilJam.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script>
            function hapus(){
            document.getElementById("hapus").addEventListener("click", function(event){
            event.preventDefault()
            });
            swal.fire({
                    title: "Yakin min?",
                    text: "capek kesian input data",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "gas lah"

                }).then((result) => 
                    {
                        if (result.isConfirmed)
                        {
                        window.location = '../system/delete.php?<?= $x['idKaryawan'] ?>';
                        }
                    }
                )
            }
        </script>
        <script>

            //     Swal.fire({
            //     title: 'Hapus?',
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#00c4aa',
            //     confirmButtonText: 'ya'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         window.location.href="../admin/karyawanList.php?<?= $x['idKaryawan'] ?>";
            //     }
            // })
            // }
        </script>
        <script>
            function konfirmasiKeluar(){
                    Swal.fire({
                        title: 'Keluar?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#00c4aa',
                        cancelButtonColor: '#f71b4f',
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../system/logout.php';
                        }{
    
                        }
                    })
            }
        </script>
        <script>
            $("#keluar").mouseover(function(){
            $("#pintuKeluar").addClass("fa-solid fa-door-open").removeClass("fa-solid fa-door-closed")
            })
            $("#keluar").mouseout(function(){
            $("#pintuKeluar").addClass("fa-solid fa-door-closed").removeClass("fa-solid fa-door-open")
            })

        </script>
        <script>
            function getTimeDateCustom() {
            var x = document.getElementById("waktu");
            var defaultVal = x.defaultValue;
            var currentVal = x.value;
            
            if (defaultVal == currentVal) {
                document.getElementById("example").innerHTML = "Default value and active value is the same: "
                + x.defaultValue + " and " + x.value
                + "<br>Update the value of the time field to display the difference!";
            } else {
                document.getElementById("example").innerHTML = "The default value was: " + defaultVal
                + "<br>The new, active value is: " + currentVal;
            }
            }
        </script>
        <script>
            $("#tgl").click(function() {
                $('#tanggal').attr("disabled", !this.checked);
            });
        </script>
        <script>
            $("#bln").click(function() {
                $('#bulan').attr("disabled", !this.checked);
            });
        </script>
        <script>
            $("#thn").click(function() {
                $('#tahun').attr("disabled", !this.checked);
            });
        </script>


    </body>
</html>