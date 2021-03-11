<?php include 'ust.php'; 
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php 
$ayarlar = $db->prepare("SELECT * FROM hesap_form");
$ayarlar->execute();
$ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper">
    <div class="col-lg-12"><br>
    <?php
    extract($_GET); 
    if ($sonuc == "bos") { ?>
        <div class="alert alert-warning">
            <b>Dikkat! Lütfen boş alan bırakmayınız...</b>
        </div>
    <?php } elseif($sonuc == "yes"){ ?>
        <div class="alert alert-success">
            <b>Hesap Eklendi!</b>
        </div>
    <?php } ?>   
        <div class="panel panel-default">
            <div class="panel-heading">Yeni Hesap Ekle</div>
            <div class="panel-body">
                <form role="form" action="islem.php" method="POST">
                    <div class="form-group">
                        <label>Hesap Adı</label>
                        <input class="form-control" name="hesap_adi" placeholder="Hesap Adını Giriniz...">
                    </div>

                    <div class="form-group">
                        <label>Hesap Türü</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="hesap_turu" value="nakit">Nakit
                            </label>
                        </div>
                    
                        <div class="radio">
                            <label>
                                <input type="radio" name="hesap_turu" value="kart">Kart
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Para Miktarı</label>
                        <input class="form-control" name="miktar" placeholder="Para Miktarı Giriniz...">
                    </div>
                                        
                    <div class="form-group">
                        <label>Para Birimi</label>
                        <select class="form-control" name="birim">
                            <option>₺</option>
                            <option>$</option>
                            <option>€</option>
                        </select>
                    </div>
                    <button type="submit" name="form_ekle" class="btn btn-primary btn-block">Ekle </button>
                </form>
            </div>
        </div>
    </div>
</div>
                
          


    

