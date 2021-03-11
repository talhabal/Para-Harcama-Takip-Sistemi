<?php 
include 'baglan.php'; 
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading"><center>
                        <h3 class="panel-title">Lütfen Giriş Yapınız...</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="islem.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kullanıcı Adı" name="admin_kadi" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre" name="admin_sifre" type="password" value="">
                                </div>

                                <button type="sumbit" name="giris" class="btn btn-lg btn-success btn-block">Giriş Yap</button>
                            </fieldset>
                        </form>
                        <?php
                             
                            if ($giris == "bos") { ?>
                                <div class="alert alert-warning"><i class="fa fa-warning"></i>Lütfen Boş Alan Bırakmayınız..</div>
                            <?php  }elseif($giris == "no"){  ?>
                                <div class="alert alert-danger"><i class="fa fa-times-circle"></i>Giriş İşlemi Başarısız...</div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
