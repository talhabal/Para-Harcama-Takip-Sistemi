<?php include 'ust.php';?>



<div id="page-wrapper">
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                        <i class="fa fa-tags" ></i> Nakit İşlemler
                        <a href="transfer.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-mail-reply-all"></i> Para Transfer İşlemi</a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        		<thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hesap Adı</th>
                                        <th>Para Miktarı</th>
                                        <th>Para Birimi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                                $nakit = $db->prepare("SELECT * FROM hesap_form where hesap_turu=?");
                                                $nakit->execute(array('nakit'));
                                                $h_cek = $nakit->fetchALL(PDO::FETCH_ASSOC);
                                                $h_say = $nakit->rowCount();
                                                if ($h_say) {
                                                    foreach ($h_cek as $row) {

                                                           
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["hesap_id"]; ?></td>
                                        <td><?php echo $row["hesap_adi"]; ?></td>
                                        <td><?php echo $row["miktar"]; ?></td>
                                        <td><?php echo $row["birim"]; ?></td>
                                        <td>
                                        	<center>
                                            <a href="nakit_duzenle.php?hesap_id=<?php echo $row["hesap_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a> 
                                            <a href="islem.php?nakitsil_id=<?php echo $row["hesap_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
