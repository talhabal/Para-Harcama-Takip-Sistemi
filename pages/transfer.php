
<?php include 'ust.php'; 
error_reporting(E_ALL & ~E_NOTICE);
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
            <div class="panel-heading">Transfer İşlemi</div>
                <div class="panel-body">
                    <form role="form" action="islem.php" method="POST">
                        <div class="form-group">
                            <label>Gönderen Hesabı Seçiniz</label>
                            <select class="form-control" name="gonderen_hesap">
                                <?php 
                                    $transfer = $db->prepare("SELECT * FROM  hesap_form WHERE hesap_turu=?");
                                    $transfer->execute(array('nakit'));
                                    $kategori_cek = $transfer->fetchALL(PDO::FETCH_ASSOC);
                                    foreach ($kategori_cek as $row) { ?>
                                    <option><?php echo $row["hesap_adi"]; ?></option> 
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gönderilecek Miktar</label>
                            <input class="form-control" name="gonder_miktar">
                        </div>
                        <div class="form-group">
                            <label>Alıcı Hesabı Seçiniz</label>
                            <select class="form-control" name="gonderen_hesap">
                                <?php 
                                    $transfer = $db->prepare("SELECT * FROM  hesap_form WHERE hesap_turu=?");
                                    $transfer->execute(array('kart'));
                                    $kategori_cek = $transfer->fetchALL(PDO::FETCH_ASSOC);
                                    foreach ($kategori_cek as $row) { ?>
                                    <option><?php echo $row["hesap_adi"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gönderilecek Para Birimi</label>
                            <select class="form-control" name="gonder_birim"> 
                                <?php 
                                    $birim = $db->prepare("SELECT * FROM  hesap_form WHERE birim=?");
                                    $transfer->execute();
                                    $kategori_cek = $transfer->fetchALL(PDO::FETCH_ASSOC);
                                    foreach ($kategori_cek as $row) { ?>
                                    <option><?php echo $row["birim"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="transfer">Gönder </button>
                    </form>
                </div>
            </div>
        </div>
    </div>