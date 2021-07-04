<div class="bg-light">
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-7"><img class="img-fluid max-width: 50%" src="<?= base_url('assets/picBuss.svg') ?>" alt=""></div>
                <h1 class="display-4">Selamat Datang di Ngebuss</h1>                    
                <p class="lead">Anda dapat melakukan pemesanan tiket Bus Online dengan mudah</p>
            </div>
            <div class="col-md-4">
                <form action="<?= base_url('cariTiket') ?>" method = "POST">
                <div class = "form-group">
                <label>Asal</label>
                <select name ="asal" class ="form-control">
                        <?php foreach ($terminal as $ter): ?>                                     
                            <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                        <?php endforeach ?>
                </select>
                </div>
                <div class = "form-group">
                <label>Tujuan</label>
                <select name ="tujuan" class ="form-control">
                     <?php foreach ($terminal as $ter): ?>                                     
                            <option value ="<?= $ter->id?>"><?= $ter -> kota ?></option>
                        <?php endforeach ?> 
                </select>
                </div>
                <div class = "form-group">
                <label>Tanggal Berangkat</label>
                <input type="date" name = "tanggal" class="form-control" min="<?=date('Y-m-d') ?>" value ="<?=date('Y-m-d') ?>">
                </div>
                <div class = "form-group">
                <label>Jumlah Penumpang</label>
                <select name ="jumlah" class ="form-control">
                         <?php for ($i=1; $i<=5; $i++): ?>                                     
                            <option value ="<?= $i ?>"><?= $i ?> Penumpang</option>
                        <?php endfor; ?> 
                </select>
                </div>
                <button class ="btn btn-warning btn-block">Cari Tiket</button>
            </div>
        </div>        
    </div>
    </div>
    <div class = "container">    
    <hr>
    <?php if (!isset($tiket)): ?> 

    <?php else :?>
    <div class ="table-responsive">
    <table class ="table table-hover table-bordered">
       <thead class = "bg-primary text-white text-center">
       <tr>
           <th>No</th>
           <th>Nama Bus</th>
           <th>Tanggal Berangkat</th>
           <th>Tanggal Sampai</th>
           <th>Kelas</th>
           <th>Harga</th>
           <th>Aksi</th>                 
        </tr>                   
       </thead>
       <tbody class = "text-center">
       <?php $no = 1; ?>
       <?php foreach ($tiket as $tk): ?>
       <tr>
            <td><?= $no ++ ?></td>
            <td><?= $tk -> nama_kota ?></td>
            <td><?=$tk -> tgl_berangkat?></td>
            <td><?=$tk -> tgl_sampai?></td>
            <td><?= $tk -> kelas ?></td>
            <td><?= "Rp " . number_format($tk -> harga,2,',','.'); ?></td>
            <td>
                <a class = "btn btn-outline-success" href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang)?>">Pesan</a>
            </td>               
        </tr>
        <?php endforeach ?>                   
       </tbody>                     
    </table>
    </div>

    <?php endif ; ?>

    </div>
</div>