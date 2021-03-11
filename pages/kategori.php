<?php include 'ust.php'; ?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-4x" style="margin-left: 65; color: black"></i>
                        <p style="margin-left: 65; color: black; font-size: 25"> Market </p>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 text-right">
                            <?php 
                            $verisor=$db->prepare("SELECT * FROM kategori WHERE kategori_adi='market'");
                            $verisor->execute();
                            $vericek=$verisor->fetch(PDO::FETCH_ASSOC);
                            ?>   
                            <div class="huge"><?php echo $vericek['kategori_tl']; ?> TL</div> 
                            <div class="huge"><?php echo $vericek['kategori_dolar']; ?> $</div>
                            <div class="huge"><?php echo $vericek['kategori_euro']; ?> €</div>
                        </div>
                    </div>
                </div>
            <div class="container">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#market" 
                        style="margin-left: 60;margin-top: 5; margin-bottom: 5" value="market">Harcama Ekle
                </button>
                <div class="modal" id="market">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Market Harcaması Ekle</h4>
                            </div>
                                <div class="modal-body">
                                    <form action="islem.php" method="POST">
                                        <input type="hidden" name="kategori_adi" value="<?php echo $vericek['kategori_adi']; ?>">
                                            <div class="form-group">
                                                <label>Harcanan Yer İsmi</label>
                                                <input class="form-control" name="harcama_adi">
                                            </div>
                                            <div class="form-group">
                                                <label>Harcama Miktarı</label>
                                                <input class="form-control" name="harcama_miktar">
                                            </div>
                                            <div class="form-group">
                                                <label>Para Birimi</label>
                                                <select class="form-control" name="harcama_birim">
                                                    <option value="₺">₺</option>
                                                    <option value="$">$</option>
                                                    <option value="€">€</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input class="form-control" name="harcama_adres">
                                            </div>
                                            <button type="submit" name="market_ekle" class="btn btn-primary btn-block">Ekle </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="col-xs-3">
                            <i class="fa fa-gas-pump fa-4x" style="margin-left: 65; color: black"></i>
                            <p style="margin-left: 35; color: black; font-size: 25"> Akaryakıt </p>
                        </div>
                        <div class="row">
                            <div class="col-xs-9 text-right">
                                <?php 
                                $verisor=$db->prepare("SELECT * FROM kategori WHERE kategori_adi='akaryakit'");
                                $verisor->execute();
                                $vericek=$verisor->fetch(PDO::FETCH_ASSOC)
                                ?>   
                                <div class="huge"><?php echo $vericek['kategori_tl']; ?> TL</div> 
                                <div class="huge"><?php echo $vericek['kategori_dolar']; ?> $</div>
                                <div class="huge"><?php echo $vericek['kategori_euro']; ?> €</div>
                          
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#akaryakit" 
                        style="margin-left: 60;margin-top: 5; margin-bottom: 5" value="akaryakit">Harcama Ekle
                        </button>
                        <div class="modal" id="akaryakit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Akaryakıt Harcaması Ekle</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="islem.php" method="POST">
                                            <input type="hidden" name="kategori_adi" value="<?php echo $vericek['kategori_adi']; ?>">
                                            <div class="form-group">
                                                <label>Harcanan Yer İsmi</label>
                                                <input class="form-control" name="harcama_adi">
                                            </div>
                                            <div class="form-group">
                                                <label>Harcama Miktarı</label>
                                                <input class="form-control" name="harcama_miktar">
                                            </div>
                                            <div class="form-group">
                                                <label>Para Birimi</label>
                                                <select class="form-control" name="harcama_birim">
                                                    <option value="tl">₺</option>
                                                    <option value="dolar">$</option>
                                                    <option value="euro">€</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input class="form-control" name="harcama_adres">
                                            </div>
                                            <button type="submit" name="akaryakit_ekle" class="btn btn-primary btn-block">Ekle </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="col-xs-3">
                            <i class="  fa fa-ambulance fa-4x" style="margin-left: 65; color: black;"></i>
                            <p style="margin-left: 65; color: black; font-size: 25"> Sağlık </p>
                        </div>
                        <div class="row">
                            <div class="col-xs-9 text-right">
                                <?php 
                                $verisor=$db->prepare("SELECT * FROM kategori WHERE kategori_adi='saglik'");
                                $verisor->execute();
                               $vericek=$verisor->fetch(PDO::FETCH_ASSOC)
                                ?>   
                                <div class="huge"><?php echo $vericek['kategori_tl']; ?> TL</div> 
                                <div class="huge"><?php echo $vericek['kategori_dolar']; ?> $</div>
                                <div class="huge"><?php echo $vericek['kategori_euro']; ?> €</div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#saglik" 
                        style="margin-left: 60;margin-top: 5; margin-bottom: 5" value="saglik">Harcama Ekle
                        </button>
                        <div class="modal" id="saglik">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Sağlık Harcaması Ekle</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="islem.php" method="POST">
                                            <input type="hidden" name="kategori_adi" value="<?php echo $vericek['kategori_adi']; ?>">
                                            <div class="form-group">
                                                <label>Harcanan Yer İsmi</label>
                                                <input class="form-control" name="harcama_adi">
                                            </div>
                                            <div class="form-group">
                                                <label>Harcama Miktarı</label>
                                                <input class="form-control" name="harcama_miktar">
                                            </div>
                                            <div class="form-group">
                                                <label>Para Birimi</label>
                                                <select class="form-control" name="harcama_birim">
                                                    <option value="tl">₺</option>
                                                    <option value="dolar">$</option>
                                                    <option value="euro">€</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input class="form-control" name="harcama_adres">
                                            </div>
                                            <button type="submit" name="saglik_ekle" class="btn btn-primary btn-block">Ekle </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
