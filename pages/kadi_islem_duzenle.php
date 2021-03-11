<?php include 'ust.php'; ?>


<?php 
$admin_id = $_GET["admin_id"];
$admin = $db->prepare("SELECT * FROM admin WHERE admin_id=?");
$admin->execute(array($admin_id));
$admincek = $admin->fetch(PDO::FETCH_ASSOC);
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-user fa-fw"></i> Admin Düzenle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php?admin_id=<?php echo $admincek["admin_id"]; ?>" method="POST" >
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input class="form-control" name="admin_kadi" value="<?php echo $admincek["admin_kadi"]; ?>">
                                        </div>  

                                        <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" name="admin_sifre" value="<?php echo $admincek["admin_sifre"]; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Sisteme Giriş Tarihi</label>
                                            <input class="form-control" name="son_giris_tarih" value="<?php echo $admincek["son_giris_tarih"]; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>IP Adresi</label>
                                            <input class="form-control" name="ip_addr" value="<?php echo $admincek["ip_addr"]; ?>" disabled>
                                        </div>


                                    <button type="submit" name="admin_guncelle" class="btn btn-primary btn-block">Güncelle</button>
                               </form>
                                </div>
                        </div>
                </div>
             </div>
        </div>
       