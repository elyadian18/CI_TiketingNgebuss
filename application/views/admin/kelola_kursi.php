<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Kelola Kursi</title>
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
    
    <div class ="container-fluid my-4">
        <div class ="row"> 
            <div class="col-md-4">
                    <div class ="card">
                        <div class ="card-header bg-primary text-white" > Form Tambah Terminal</div>
                        <div class ="card-body">
                            <form action="<?= base_url("tambahKursi") ?>" method= "POST">
                                <div class ="formc-group">
                                    <label>Jadwal</label>
                                    <select name="jadwal" required class="form-control">
                                        <?php foreach ($jadwal as $jad): ?>
                                            <option value="<?= $jad->id ?>"><?= $jad->nama_kota ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Kursi</label>
                                    <input type="number" name="jumlah" class="form-control" required placeholder="Jumlah Kursi">
                                </div>
                                <br>
                                <button class ="btn btn-success btn-block">Tambah Kursi</button>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-md-8">
                <div class ="card">
                    <div class ="card-header bg-primary text-white" >Daftar Kursi</div>
                    <div class = "card-body">
                        <table class = "table table-bordered table-hover datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bus</th>
                                    <th>Kursi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($kursi as $kur) :?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$kur->nama_kota?></td>
                                    <td><?=$kur->kursi?></td>
                                    <td>
                                        <div class="btn btn-group btn-group-sm">
                                            <a class ="btn btn-outline-success" href ="<?= base_url('hapusKursi/'.$kur ->id)?>">Hapus</a>                                        
                                        </div>
                                    </td>                                    
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </tabel>
                    </div>
                </div>
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