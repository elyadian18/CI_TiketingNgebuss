<div class="container-fluif">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Ngebuss</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama Pemesan <br> <strong><?= $detail->nama_pemesan ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <?php $date = date_create($detail->tanggal); ?>
                            <p class="text-right"><strong><?= date_format($date, "d F Y h:i:s") ?></strong></p>
                        </div> 
                    </div> 
                        <hr>    
                        <div class="row">
                            <div class="col-md-5">
                                <p>Jumlah Penumpang : <strong><?= $jml_penumpang ?></strong></p>                                
                                <p>Harga Per Tiket <br> <strong><?= "Rp " .number_format($detail->harga,2,',','.'); ?></strong></p>
                                <p>Harga Total <br> <strong><?= "Rp " .number_format($detail->harga*$jml_penumpang,2,',','.'); ?></strong></p>
                                <p>Status : <strong>Lunas</strong></p>
                            </div>
                            <div class="col-md-7">
                                <p>Nama Bus : <strong><?= $detail->nama_kota ?></strong></p>
                                <?php $date= date_create($detail->tgl_berangkat); ?>
                                <p>Berangkat  : <strong><?= date_format($date,"d F Y h:i:s") ?></strong></p>
                                <?php $date= date_create($detail->tgl_sampai); ?>
                                <p>Sampai: <strong><?= date_format($date,"d F Y h:i:s") ?></strong></p>
                                <p>Kelas: <strong><?= $detail->kelas ?></strong></p>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Rute: <strong><?= $detail->ASAL ?> - <?= $detail->TUJUAN ?></strong></p>                   
                </div>
            </div>
        </div>
    </div>
</div>