<?php include 'ust.php'; ?>
<div id="page-wrapper">
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                        <i class="fa fa-user" ></i> Kullanıcı İşlemleri
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        		<thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Şifre</th>
                                        <th>Sisteme Giriş Tarihi</th>
                                        <th>IP Adresi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $kadi_islem = $db->prepare("SELECT * FROM admin ORDER BY admin_id");
                                    $kadi_islem->execute();
                                    $a_cek = $kadi_islem->fetchALL(PDO::FETCH_ASSOC);
                                    $a_say = $kadi_islem->rowCount();
                                    if ($a_say) {
                                        foreach ($a_cek as $row) {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["admin_id"]; ?></td>
                                        <td><?php echo $row["admin_kadi"]; ?></td>
                                        <td><?php echo $row["admin_sifre"]; ?></td>
                                        <td><?php echo $row["son_giris_tarih"]; ?></td>
                                        <td><?php echo $row["ip_addr"]; ?></td>
                                        <td>
                                        	<center>
                                            <a href="kadi_islem_duzenle.php?admin_id=<?php echo $row["admin_id"]; ?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a> 
                                            <a href="islem.php?kadisil_id=<?php echo $row["admin_id"]; ?>">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
                                            </center>
                                        </td>
									</tr>
                                    <?php
                                    }
                                            }
                                    ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

