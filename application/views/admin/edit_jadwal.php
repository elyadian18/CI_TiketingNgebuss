<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Dashboard | Edit Jadwal</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <?php include 'include/nav.php'; ?>
    <div class ="container-fluid my-4">
        <div class ="row justify-content-center">         
            <div class="col-md-4">
                <div class ="card">
                    <div class ="card-header bg-primary text-white text-center" >Edit Jadwal</div>
                    <div class = "card-body">
                            <form action="<?= base_url("editJadwal") ?>" method= "POST">
                                <input type ="hidden" name="id" value="<?= $data_edit -> id ?>">
                                <div class ="formc-group">
                                    <label>Nama Bus</label>
                                    <input type="text" class ="form-control" name ="nama_bus" required value ="<?= $data_edit->nama_kota ?>">
                                </div>
                                <div class ="formc-group">
                                    <label>Terminal Asal</label>
                                    <select name ="asal" class ="form-control" required>                                    
                                        <optgroup label ="TERPILIH">
                                            <option selected value ="<?= $data_edit-> asal ?>"><?= $data_edit-> ASAL ?></option>
                                        </optgroup>
                                        <optgroup label = "PILIHAN">                                            
                                            <?php foreach ($terminal as $ter): ?>                                     
                                                <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class ="formc-group">
                                    <label>Terminal Tujuan</label>
                                    <select name ="tujuan" class ="form-control" required>
                                        <optgroup label ="TERPILIH">
                                            <option selected value ="<?= $data_edit-> tujuan ?>"><?= $data_edit-> TUJUAN ?></option>
                                        </optgroup>
                                        <optgroup label = "PILIHAN"> 
                                            <?php foreach ($terminal as $ter): ?>                                     
                                                <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>    
                                </div>
                                <div class ="formc-group">
                                     <label>Tanggal Berangkat</label>
                                     <?php $date = date_create($data_edit->tgl_berangkat); ?>
                                     <input type="datetime-local" class ="form-control" name ="tgl_berangkat" min="<?=date_format($date, 'Y-m-d\TH:i') ?>" value ="<?=date_format($date, 'Y-m-d\TH:i') ?>" required>    
                                </div>                      
                                <div class ="formc-group">
                                     <label>Tanggal Sampai</label>
                                     <?php $date = date_create($data_edit->tgl_sampai); ?>
                                     <input type="datetime-local" class ="form-control" name ="tgl_sampai" min="<?=date_format($date, 'Y-m-d\TH:i') ?>" value ="<?=date_format($date, 'Y-m-d\TH:i') ?>" required>    
                                </div>
                                <div class ="formc-group">
                                    <label>Kelas</label>
                                    <select name ="kelas" class ="form-control" required>
                                        <optgroup label ="TERPILIH">
                                            <option selected value ="<?= $data_edit-> kelas ?>"><?= $data_edit-> kelas ?></option>
                                        </optgroup>
                                        <optgroup label = "PILIHAN"> 
                                        <option value ="EKONOMI">EKONOMI</option>
                                        <option value ="BISNIS">BISNIS</option>
                                        <option value ="EKSEKUTIF">EKSEKUTIF</option>
                                        </optgroup>
                                    </select>    
                                </div>
                                <div class ="formc-group">
                                    <label>Harga</label>
                                    <input type="number" class ="form-control" name ="harga" required value ="<?= $data_edit->harga ?>">
                                </div>
                                <br>
                                <button class ="btn btn-success btn-block">Edit Jadwal</button>
                            </form>
                    </div>
                </div>
            </div> 
      
           
        </div>
    </div>
    

    <script src ="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>