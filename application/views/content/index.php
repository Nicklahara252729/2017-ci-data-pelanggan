<?php 
$uri3 = $this->uri->segment(3);
$uri2 = $this->uri->segment(2);
?>
<div class="container-fluid padding bg-putih " style="border-bottom:solid 1px lightgray;box-shadow:0px 0px 5px lightgray;">
    <div class="container no-padding">
        <div class="col-lg-10 no-padding f-30">
            <?php
            if($uri3 == 'tambah'){
                echo form_open('front/insert'); ?>
            <p class="padding"><strong>TAMBAH JUMLAH DEPOSIT</strong></p>
        <table class="table">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="text" id="datepicker" name="tanggal" class="form-control" value="<?php echo date('m/d/Y'); ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><input type="text" name="jumlah" class="form-control" required></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo form_submit('enter_insert','Simpan',['class'=>'btn btn-success btn-lg right']);
                    echo form_reset('','Hapus',['class'=>'btn btn-warning btn-lg right mar-rig-10']);
                    ?></td>
            </tr>
        </table>
            <?php
             echo form_close();
            }else{
            ?>
            <table class="table">
                <tr>
                    <td>Sisa Deposit</td>
                    <td>:</td>
                    <td style="color:green;">Rp.
                        <?php
                echo $total->total - ($pln->total + $pdam->total + $pulsa->total + $bpjs->total);
                ?>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Transaksi</td>
                    <td>:</td>
                    <td><?php echo $jum ?></td>
                </tr>
                <tr>
                    <td>Terakhir Deposit</td>
                    <td>:</td>
                    <td><?php 
                    if(isset($last->tanggal)){ 
                        echo $last->tanggal;}?></td>
                </tr>
                <tr>
                    <td>Total Deposit</td>
                    <td>:</td>
                    <td>Rp <?php echo number_format($total->total,0,',','.'); ?></td>
                </tr>
            </table>
            <?php } ?>
        </div>
        <div class="col-lg-2 ">
            <?php
            echo anchor('front/index/detail','<span class="glyphicon glyphicon-folder-open"></span> Detail',['class'=>'btn btn-lg btn-primary']);
            echo anchor('front/index/tambah','<span class="glyphicon glyphicon-plus"></span> Tambah Deposit',['class'=>'btn btn-lg btn-success mar-top-10']);
            if($uri3 == 'detail' or $uri3 == 'tambah' or $uri2 == 'detail'){
                echo anchor('front/','<span class="glyphicon glyphicon-home"></span> ',['class'=>'btn btn-lg btn-danger mar-top-10']);
            }
            ?>
        </div>
    </div>
</div>
<?php
if($uri3 == 'detail' or $uri2 == 'detail'){
    ?>
<div class="container padding">
    <p class="padding">
              <?php echo form_open('front/detail'); ?>
        <table class="table">
            <tr>
                <td>
                    <input type="text" value="<?php echo date('m/d/Y'); ?>" class="form-control" name="tgl" id="datepicker">
                </td>
                <td>
                    <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span></button>
                </td>
            </tr>
            </table>
    <?php echo form_close();?>
    </p>
    <table class="table table-border bg-putih">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Opsi</th>
        </tr>
        <?php
            $no=1;
            foreach($record as $row){
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo"Rp ".number_format($row->jumlah,0,',','.'); ?></td>
                <td>
                    <?php echo anchor('front/hapus/'.$row->id_deposit,'Hapus',['class'=>'btn btn-danger btn-sm']); ?></td>
            </tr>
            <?php
                $no++;
            }
            ?>
    </table>
</div>
<?php
}else{
?>
<div class="container-fluid padding">
    <?php
    echo anchor('pln/','<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
        <div class="col-lg-12 pln padding text-center color-white f-50 f-calibri">
            <span class="glyphicon glyphicon-flash"></span> PLN
        </div>
    </div>');
    echo anchor('pdam','<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
        <div class="col-lg-12 pdam padding text-center color-white f-50 f-calibri">
            <span class="glyphicon glyphicon-tint"></span> PDAM
        </div>
    </div>');
    echo anchor('pulsa','<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
        <div class="col-lg-12 pulsa padding text-center color-white f-50 f-calibri">
            <span class="glyphicon glyphicon-phone"></span> PULSA
        </div>
    </div>');
    echo anchor('bpjs','<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
        <div class="col-lg-12 bpjs padding text-center color-white f-50 f-calibri">
            <span class="glyphicon glyphicon-heart"></span> BPJS
        </div>
    </div>');?>
</div>
<?php
} ?>