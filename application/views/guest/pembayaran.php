<?php if($this->session->flashdata('nomor') === null): ?>
<div class="container-fluid">
    <div class="row justify-content-center my-3">
        <div class="col-md-5">
            <div class="alert alert-danger">
                <h5>Silahkan Lakukan Pemesanan Kembali</h5>
            </div>
        </div>
    </div>    
</div>
 
 <?php else : ?>

<div class="container-fluid">
    <div class="row justify-content-center my-3">
        <div class="col-md-5">
            <div class="alert alert-danger">
                <h5>PERINGATAN! <br> JANGAN REFRESH HALAMAN</h5>
                <P>Untuk menghindari kegagalan sistem</P>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1 class="text-primary">Selamat!</h1>
                    <h3>Anda Berhasil Melakukan Pemesanan Tiket</h3>
                    <hr>
                    <h5 class="text-danger">Silahkan Lakukan Pembayaran</h5>
                    <br>
                    <h3 class="text-center">126782637868</h3>
                    <p class="text-center font-weight-bold mb-0">a/n PT. Ngebuss</p>
                    <p class="text-center">BNI Syariah Kode Bank : 002</p>
                    <hr>
                    <h5 class="text-center">Total yang Harus Dibayar</h5>
                    <h2 class="text-center"><?= $this->session->flashdata('total') ?></h2>
                    <br>
                    <h5 class="text-center">Kode Pembayaran</h5>
                    <h2 class="text-center"><?= $this->session->flashdata('nomor') ?></h2>
                    <br><br>
                    <p class="text-danger">*Lakukan Konfirmasi Pembayan pada link <a target="blank" href="<?= base_url('konfirmasi') ?>">Konfirmasi Pembayaran</a></p>
                    <h4 class="text-center">Terimakasih</h4>
                </div>    
            </div>
        </div>
    </div>
</div>

<?php endif; ?>