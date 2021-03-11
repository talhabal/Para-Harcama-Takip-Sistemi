<?php include 'ust.php'; ?>
<div id="page-wrapper">
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                        <i class="fa fa-bar-chart-o fa-fw"></i> Hesap Hareketleri
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        		<thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th>Harcanan Yer İsmi</th>
                                        <th>Harcanan Miktarı</th>
                                        <th>Birim</th>
                                        <th>Tarih</th>
                                        <th>Yer</th>
									</tr>
                                </thead>
                                <tbody>

                                    <?php 
                                                $hareket = $db->prepare("SELECT * FROM harcama WHERE harcama_id ");
                                                $hareket->execute();
                                                $har_cek = $hareket->fetchALL(PDO::FETCH_ASSOC);
                                                $har_say = $hareket->rowCount();
                                                if ($har_say) {
                                                    foreach ($har_cek as $row) {

                                                        ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["harcama_id"]; ?></td>
                                        <td><?php echo $row["harcama_adi"]; ?></td>
                                        <td><?php echo $row["harcama_miktar"]; ?></td>
                                        <td><?php echo $row["harcama_birim"]; ?></td>
                                        <td><?php echo $row["harcama_tarih"]; ?></td>
                                        <td><?php echo $row["harcama_adres"]; ?></td>
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
 
