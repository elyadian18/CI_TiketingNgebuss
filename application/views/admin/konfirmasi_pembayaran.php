<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Konfirmasi Pembayaran</title>
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
                                <th>No Pembayaran</th>
                                <th>Nomor Tiket</th>
                                <th>Total Pembayaran</th>
                                <th width ="20%">Bukti Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php foreach ($list as $li): ?>
                            <tr>
                                <td><?= $li->no_pembayaran ?></td>
                                <td><?= $li->no_tiket ?></td>
                                <td><?= $li->total_pembayaran ?></td>
                                <td>
                                    <a href="<?= base_url('assets/bukti/'.$li->bukti) ?>" target="_blank">
                                        <img width="50%" src="<?= base_url('assets/bukti/'.$li->bukti) ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Yakin Ingin Verifikasi No Pembayaran <?= $li->no_pembayaran?>')" href="<?= base_url('Verifikasi/'.$li->id)?>" class="btn btn-primary">Verifikasi</a>
                                </td>
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