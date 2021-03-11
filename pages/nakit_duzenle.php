<?php include 'ust.php'; ?>


<?php 
$hesap_id = $_GET["hesap_id"];
$hesap = $db->prepare("SELECT * FROM hesap_form WHERE hesap_id=?");
$hesap->execute(array($hesap_id));
$hesapcek = $hesap->fetch(PDO::FETCH_ASSOC);
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Hesap Düzenle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php?hesap_id=<?php echo $hesapcek["hesap_id"]; ?>" method="POST" >
                                        <div class="form-group">
                                            <label>Hesap Adı</label>
                                            <input class="form-control" name="hesap_adi" value="<?php echo $hesapcek["hesap_adi"]; ?>">
                                        </div>  

                                        <div class="form-group">
                                            <label>Para Miktarı</label>
                                            <input class="form-control" name="miktar" value="<?php echo $hesapcek["miktar"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Para Birimi</label>
                                            <select class="form-control" name="birim">
                                                <option value="₺">₺</option>
                                                <option value="$">$</option>
                                                <option value="€">€</option>
                                            </select>
                                        </div>


                                    <button type="submit" name="nakit_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                               </form>
                                </div>
                        </div>
                </div>
             </div>
        </div>
       