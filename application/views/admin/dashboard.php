<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
</head>
<body>
    <?php include 'include/nav.php'; ?>
    <div class ="container-fluid my-4">
        <div class ="row"> 
            <div class="col-md-4">
                    <div class ="card">
                        <div class ="card-header bg-primary text-white" > Form Tambah Terminal</div>
                        <div class ="card-body">
                            <form action="<?= base_url("tambahTerminal") ?>" method= "POST">
                                <div class ="formc-group">
                                    <label>Kota </label>
                                    <input type="text" class ="form-control" name ="terminal" placeholder="Kota">
                                </div>
                                <br>
                                <button class ="btn btn-success btn-block">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-md-8">
                <div class ="card">
                    <div class ="card-header bg-primary text-white" >Daftar Terminal</div>
                    <div class = "card-body">
                        <table class = "table table-bordered table-hover datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($terminal as $ter): ?>                                     
                                <tr>
                                    <td><?= $no ++ ?></td>
                                    <td><?= $ter -> kota ?></td>
                                    <td>
                                        <div class="btn btn-group btn-group-sm">
                                            <a class ="btn btn-success" href ="<?= base_url('admin/dashboard/edit/'.$ter ->id)?>">Edit</a>
                                            <a class ="btn btn-outline-success" href ="<?= base_url('hapusTerminal/'.$ter ->id)?>">Hapus</a>                                        
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?> 
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