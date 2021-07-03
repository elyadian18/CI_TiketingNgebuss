<div class ="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-5">
        <?php if($this->session->flashdata('pesan') !== null): ?>
            <div class="alert alert-dismissible alert-light">
                <?= $this->session->flashdata('pesan') ?>
            </div>
        <?php endif; ?>
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                Konfirmasi Pembayaran
                </div>
                <div class="card-body">
                <form action="<?= base_url('cekKonfirmasi') ?>" method="POST">
                    <div class="form-group">
                        <label>Kode Booking</label>
                        <input text="text" name="kode" class="form-control" placehorder="Kode Booking">
                    </div>

                    <button class="btn btn-success">Cek Kode Booking</button>
                
                </form>
                </div>
            </div>
            <hr>
            <?php if(isset($_GET['kode'])) : ?>
            <h4>Kode Booking : <?= $_GET['kode']?></h4>
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Detail Pembayaran
                </div>
                <div class="card-body">
                    <h2 class="text-center">
                        <?php if($no_tiket->status === '0' || $no_tiket->status === '1'): ?>
                            <i class="fa fa-times text-danger"></i>Belum Dibayar
                        <?php elseif($no_tiket->status === '2'): ?>
                            <i class="fa fa-check text-success"></i>Sudah Dibayar
                        <?php endif; ?>
                    </h2>
                    <?php if ($this->session->flashdata('alert') !== null ): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flasdata('alert')?>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Identitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($detail as $dt): ?>
                                    <tr class="text-center">
                                        <td><?= $dt->nama ?></td>
                                        <td><?= $dt->no_identitas ?></td>                              
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <p><b>Total Pembayaran : </b> <b>Rp. <?= $no_tiket->total_pembayaran ?></b></p>                        
                        <?php if($no_tiket->status === '2'): ?>
                            <form action="<?= base_url('print')?>" method="post">
                                <input type="hidden" name="no_tiket" value="<?= $no_tiket->no_tiket ?>">
                                <button type="submit" class="btn btn-outline-success btn-block">Print</button>
                            </form>
                        <?php endif; ?>
                        <?php if($no_tiket->status === '0'): ?>
                        <p class="text-danger">Silahkan Kirim Bukti Pembayaran</p>
                        <?= form_open_multipart('kirimKonfirmasi'); ?>
                        <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran ?>">
                                                <br>
                        <p>Foto Bukti Pembayaran</p>
                        <input type="file" id="foto" name="gambar" class="form-control" required>
                        <br>
                        <p class="d-none" id="pesan"></p>
                        <button type="submit" id="btn_konfirmasi" class="btn btn-success">Kirim Bukti Pembayaran</button>
                        <?= form_close(); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    
