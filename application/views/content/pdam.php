<div class="container-fluid bg-putih padding" style="box-shadow:0px 0px 5px 0px gray;border-bottom:solid 2px #ef2470;">
    <div class="container padding">
        <div class="col-lg-3 padding">
            <?php
            echo anchor('front/','<div class="col-lg-12 padding color-white bg-pink bor-ra-3 text-center">
                <span class="glyphicon glyphicon-home"></span> &nbsp; <strong>MENU UTAMA</strong></div>'); ?>
    </div>
    <div class="col-lg-6 padding">
            <div class="col-lg-12">
                
                <?php
                echo form_open('pdam/'); ?>
                <div class="col-lg-10 no-padding">
                    <?php
                $inpt_cari=['name'=>'cari_pln','class'=>'form-control','placeholder'=>'Nama Pelanggan / No Pelanggan '];
                    echo form_input($inpt_cari);
                ?>
                </div>
                <div class="col-lg-2 no-padding">
                    <?php
                    echo form_submit('go_pln','Cari',['class'=>'btn btn-primary form-control']);
                ?>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <div class="col-lg-3 f-40">
            <?php echo anchor('pdam/','PDAM',['style'=>'color:black']); ?>
    </div>
    </div>
</div>

<div class="container padding">
    <div class="col-lg-12">
    <div class="col-lg-6 padding f-20">
        Jumlah Transaksi : <?php echo $jumlah; ?>
    </div>
    <div class="col-lg-6 padding f-20">
        Total : Rp.<?php echo number_format($tot->total,0,',','.'); ?>
    </div>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-12 padding bg-putih bor-ra-3" style="border:solid 1px lightgray;">
            <?php echo form_open('pdam/insert'); ?>
            <p class="padding"><strong>TAMBAH JUMLAH TRANSAKSI</strong></p>
        <table class="table">
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="text" id="datepicker" name="tanggal" class="form-control" value="<?php echo date('m/d/Y'); ?>"></td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>:</td>
                <td><input type="text" name="jam" class="form-control" value="<?php
                    date_default_timezone_set("Asia/Jakarta");
                    echo date('h:i a') ?>" readonly></td>
            </tr>
            <tr>
                <td>NO Pelanggan</td>
                <td>:</td>
                <td><input type="text" name="no_pelanggan" class="form-control" required></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>:</td>
                <td><input type="text" name="jenis" class="form-control" value="PDAM" readonly></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><input type="text" name="nama" class="form-control"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><input type="text" name="jumlah" class="form-control" required></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo form_submit('enter_insert','Simpan',['class'=>'btn btn-success btn-lg right']);
                    echo form_reset('','Batal',['class'=>'btn btn-warning btn-lg right mar-rig-10']);
                    ?></td>
            </tr>
        </table>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="container padding">
    <div class="col-lg-12">
        <table class="table bg-putih ">
            <tr>
                <th>NO</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>No Pelanggan</th>
                <th>Jenis</th>
                <th>Nama Pelanggan</th>
                <th>Jumlah</th>
                <th>Opsi</th>
            </tr>
            <?php
            $no=1;
            foreach($show as $row){
                ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->jam; ?></td>
                <td><?php echo $row->no_pelanggan; ?></td>
                <td><?php echo $row->jenis; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo"Rp ".number_format($row->jumlah,0,',','.'); ?></td>
                <td>
                    <?php echo anchor('pdam/hapus/'.$row->id_pdam,'Hapus',['class'=>'btn btn-danger btn-sm']); ?></td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <p class="padding"></p>
        <?php echo $paging; ?>
    </div>
</div>