<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Kelola Jadwal</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
</head>
<body>
    <?php include 'include/nav.php'; ?>
    <div class ="container-fluid my-4">
    <?php if($this->session->flashdata('pesan') !== null): ?>
        <div class="alert alert-dismissible alert-light">
            <?= $this->session->flashdata('pesan')  ?>
        </div>
    
    <?php endif; ?>
        <div class="card">        
            <div class ="card-header bg-primary text-white" >Daftar Jadwal</div>
            <div class = "card-body">
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Jadwal</button>
                <table class = "table table-bordered table-hover datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bus</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Sampai</th>
                            <th>Kelas</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>                                
                        <?php $no = 1; ?>
                        <?php foreach ($jadwal as $jd): ?>                                     
                        <tr>
                            <td><?= $no ++ ?></td>
                            <td><?= $jd -> nama_kota ?></td>
                            <td><?= $jd -> ASAL ?></td>
                            <td><?= $jd -> TUJUAN ?></td>
                            <td><?= $jd -> tgl_berangkat ?></td>
                            <td><?= $jd -> tgl_sampai ?></td>
                            <td><?= $jd -> kelas ?></td>
                            <td><?= "Rp " . number_format($jd -> harga,2,',','.'); ?></td>
                            <td>
                            <div class="btn btn-group btn-group-sm">
                                <?php if($jd->status === "0"):?>
                                    <a class ="btn btn-info" href ="<?= base_url('admin/dashboard/berangkat-jadwal/'.$jd ->id)?>">Berangkat</a>
                                <?php else:?>
                                    <button class="btn btn-info" disabled>Berangkat</button>
                                <?php endif; ?>
                                <a class ="btn btn-success" href ="<?= base_url('admin/dashboard/edit-jadwal/'.$jd ->id)?>">Edit</a>
                                <a class ="btn btn-outline-success" href ="<?= base_url('hapusJadwal/'.$jd ->id)?>">Hapus</a>                                        
                            </div>
                            </td>
                        </tr>
                        <?php endforeach ?> 
                    </tbody>
                </tabel>
            </div>
        </div>             
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url("tambahJadwal") ?>" method= "POST">
        <div class="modal-body">
            <div class ="formc-group">
                <label>Nama Bus</label>
                <input type="text" class ="form-control" name ="nama_bus" placeholder="Nama Bus" required >
            </div>
            <div class ="formc-group">
                <label>Terminal Asal</label>
                <select name ="asal" class ="form-control" required>
                    <?php foreach ($terminal as $ter): ?>                                     
                        <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class ="formc-group">
                <label>Terminal Tujuan</label>
                <select name ="tujuan" class ="form-control" required>
                    <?php foreach ($terminal as $ter): ?>                                     
                        <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                    <?php endforeach ?>
                </select>    
            </div>
            <div class ="formc-group">
                    <label>Tanggal Berangkat</label>
                    <input type="datetime-local" class ="form-control" name ="tgl_berangkat" min="<?=date('Y-m-d\TH:i') ?>" value ="<?=date('Y-m-d\TH:i') ?>" required>    
            </div>                      
            <div class ="formc-group">
                    <label>Tanggal Sampai</label>
                    <input type="datetime-local" class ="form-control" name ="tgl_sampai" min="<?= date('Y-m-d\TH:i') ?>" value ="<?=date('Y-m-d\TH:i') ?>" required>    
            </div>
            <div class ="formc-group">
                    <label>Kelas</label>
                <select name ="kelas" class ="form-control" required>
                    <option value ="EKONOMI">EKONOMI</option>
                    <option value ="BISNIS">BISNIS</option>
                    <option value ="EKSEKUTIF">EKSEKUTIF</option>
                </select>    
            </div>
            <div class ="formc-group">
                    <label>Harga</label>
                <input type="number" class ="form-control" name ="harga" placeholder="Harga Tiket" required >   
            </div>
            <br>      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src ="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src ="<?= base_url('assets/js/datatables.js') ?>"></script>
    <script src ="<?= base_url('assets/js/datatables-b4.js') ?>"></script>
    <?php include 'include/datatables.php' ?>
</body>
</html>