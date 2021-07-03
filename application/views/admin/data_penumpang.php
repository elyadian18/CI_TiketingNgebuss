<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Data Penumpang</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatables.css') ?>">
</head>
<body>
    <?php include 'include/nav.php'; ?>
    <div class ="container-fluid my-4">
        <div class="card">
            <div class ="card-header bg-primary text-white" >Verifikasi Daftar Penumpang</div>
            <div class="card-body">            
                <div class="table-resposive">
                    <table class="table table-bordered table-hover datatables">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nomor Tiket</th>
                                <th>Nama</th>
                                <th>Nomor Identitas</th>
                                <th>Jadwal</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead> 
                        <tbody>                  
                            <?php $no = 1; ?>                          
                            <?php foreach ($penumpang as $tp): ?>
                            <tr>
                                <td><?= $no ++ ?></td>
                                <td><?= $tp->nomor_tiket ?></td>
                                <td><?= $tp->nama ?></td>
                                <td><?= $tp->no_identitas ?></td>
                                <td> <?= $tp->nama_kota ?> berangkat pada <?= $tp->tgl_berangkat ?> </td>
                                <td>                               
                                    <?php if($tp->status === '0' || $tp->status === '1'): ?>
                                        Belum Dibayar
                                    <?php elseif($tp->status === '2'): ?>
                                        Sudah Dibayar
                                    <?php endif; ?>                                
                                </td>
                                <td>                                        
                                    <div class="btn btn-group btn-group-sm">
                                       <a class ="btn btn-outline-success" href ="<?= base_url('hapusPenumpang/'.$tp ->id)?>">Hapus</a>                                        
                                    </div>
                                </td>
                            </tr>
                            
                            <?php endforeach; ?>                            
                        </tbody>               
                    </table>
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