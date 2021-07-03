<html>
<head>
    <link rel="icon" href="<?= base_url('assets/favicon.png') ?>" type="image/png">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class ="container-fluid">
    <div class ="row justify-content-center my-5">
    <div class="col-md-4">
        <div class ="card">
            <div class ="card-header bg-primary text-white text-center" >Login Sebagai Admin</div>
            <div class = "card-body">
                <form action = "<?= base_url('proseslogin')?>" method="POST">

                    <div class ="form-group">
                        <label>User name</label>
                        <input type="text" name="username" class="form-control" placehorder="Username">
                    </div>
                    <div class ="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placehorder="Password">
                    </div>
                    <button class="btn btn-success btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src ="<?= base_url('assets/js/bootstrap.min.js') ?>">
</body>