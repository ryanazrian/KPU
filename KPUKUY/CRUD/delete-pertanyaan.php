<?php

$server = "localhost" ;
$username = "root" ;
$password = "" ;
$database = "kpu";

//Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die ("Koneksi database gagal");
mysql_select_db($database) or die ("Database tidak tersedia");

    $id = $_GET['id'];
    $data = mysql_query("SELECT * FROM faq WHERE id='$id'");

    while($row=  mysql_fetch_array($data)){
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Delete Post</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="../admin_kpu/faq_hapus.php" name="modal-popup" enctype="multipart/form-data" method="POST">

                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ?</div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">ID</label>
                                    <div class="col-lg-5">
                                        <input style="width: 200px;"  class="form-control" type="text" name="id" value="<?php echo $row['id']; ?>" readonly/>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Pertanyaan</label>
                                    <div class="col-lg-5">
                                        <input style="width: 200px;"  class="form-control" type="text" name="judul" value="<?php echo $row['pertanyaan']; ?>" readonly/>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jawaban</label>
                                    <div class="col-lg-5">
                                    <? if($row['jawaban'] == null) echo '<textarea style="width: 210px;"  class="form-control" type="text" name="jawaban" value=""/>';
                                           else {
                                            echo '<textarea style="width: 210px;" class="form-control" type="text" name="jawaban" value="" rows= "5" readonly>';
                                            echo $row['pertanyaan'];
                                            echo '</textarea>';
                                           }
                                        ?>
                                    </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                            </div>
            </form>
            <?php
    }
            ?>
        </div>
    </div>
</div>
