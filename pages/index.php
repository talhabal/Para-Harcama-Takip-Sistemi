<?php include 'ust.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-eye fa-fw"></i>  Genel Bakış</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fas fa-balance-scale-right fa-5x" style="margin-top: 65"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><i> Giderler Toplamı</i></div>
                            <?php 
                                $Fiyat=$db->prepare("SELECT SUM(kategori_tl) AS kategori_tl_top FROM kategori");
                                $Fiyat->execute();
                                $FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);
                                $topla=$FiyatYaz['kategori_tl_top'];
                                ?>  
                                <div class="huge"><?php echo $topla; ?> TL</div>
                                <?php 
                                $Fiyat2=$db->prepare("SELECT SUM(kategori_dolar) AS kategori_dolar_top FROM kategori");
                                $Fiyat2->execute();
                                $FiyatYaz2= $Fiyat2->fetch(PDO::FETCH_ASSOC);
                                $topla2=$FiyatYaz2['kategori_dolar_top'];
                                ?>
                                <div class="huge"><?php echo $topla2; ?> $</div>
                                <?php 
                                $Fiyat3=$db->prepare("SELECT SUM(kategori_euro) AS kategori_euro_top FROM kategori");
                                $Fiyat3->execute();
                                $FiyatYaz3= $Fiyat3->fetch(PDO::FETCH_ASSOC);
                                $topla3=$FiyatYaz3['kategori_euro_top'];
                                ?>
                                <div class="huge"><?php echo $topla3; ?> €</div>
                        </div>
                    </div>
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


