<?php
session_start();

if(!$_SESSION){
    if(isset($_POST['loginMasuk'])){
        include "system/valogin.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link rel="stylesheet" href="css/all.css">
        <script src="js/all.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles1.css" rel="stylesheet" />
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/jquery.min.js"></script>
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"> <center><img class="mt-2 mb-3" src="1.png" style="width:40%"></center></div>
                                    <div class="card-body">
                                        <form action="system/valogin.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input name="usern" class="form-control" id="inputEmail" type="text" placeholder="name@example.com" autofocus maxlength="12"/>
                                                <label for="inputEmail">Email atau Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="pass" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="tampilPassword" type="checkbox" onclick="tutupBuka()" />
                                                <label class="form-check-label" id="boxHide" for="tampilPassword">Tampilkan Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Daftar</a>
                                                <button class="btn btn-primary" type="submit" name="loginMasuk">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            function tutupBuka(){
                var x = document.getElementById('boxHide');
                var y = document.getElementById('inputPassword');

                if ( y.type === "password" ){
                    y.type = "text";
                    x.innerHTML = "Sembunyikan Password";
                }else {
                    y.type = "password";
                    x   .innerHTML = "Tampilkan Password";
                }
            }
        </script>
    </body>
</html>

<?php

session_destroy();

}elseif($_SESSION['akses'] == 'admin'){
    header('location: admin/index.php');
}elseif($_SESSION['akses'] == 'user'){
    header('location: absen.php');
}

?>
