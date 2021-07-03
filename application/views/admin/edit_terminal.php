<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Dashboard | Edit Terminal</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <?php include 'include/nav.php'; ?>
    <div class ="container-fluid my-4">
        <div class ="row justify-content-center">         
            <div class="col-md-4">
                <div class ="card">
                    <div class ="card-header bg-primary text-white text-center" >Edit Terminal</div>
                    <div class = "card-body">
                    <form action = "<?=base_url('editTerminal')?>" method="POST">
                        <div class ="form-group">
                            <label>Nama Kota</label>
                            <input type="hidden" name="id" value = "<?= $data_terminal->id ?>">
                            <input type="text" name="kota" class="form-control" placehorder="Nama Kota" value = "<?= $data_terminal->kota ?>">
                        </div>
                        <button class="btn btn-success btn-block">Edit Kota</button>
                    </div>
                </div>
            </div> 
      
           
        </div>
    </div>
    

    <script src ="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>