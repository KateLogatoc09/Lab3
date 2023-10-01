<!doctype html> 
<html lang="en"> 
    <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Login</title> 
</head> 
    <body style="background-image:url(<?= base_url() ?>shop/images/b5.jpg)"> 
        <div class="container">
            <div class="row" style="margin-top:145px; margin-left:100px">
                <div class="col-md-4 col-md-offset-4">
                    <h2 style="color: white">Log In</h2><hr style="color: white">
                    <?= csrf_field(); ?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?>
                        </div><?php endif ?>
                    <form action="/check" method="post">
                        <div class="form-group">
                            <label for="" style="color: white; font-size:20px">Email</label>
                            <input type="text" class="form-control" name="email"  value="<?= set_value('email'); ?>" placeholder="Enter your email">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : ''?></span>
                        </div>
                        <div class="form-group" style="color: white; font-size:20px">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password"  value="<?= set_value('password'); ?>" placeholder="Enter password">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : ''?></span>
                        </div>
                        <center><br>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Log In</buttn>
                        </div>
                    </form>
                    <br><a href="/register" style="color: lightblue">Have No Account? Create New Account</a></center>
                </div>
            </div>
        </div>    
    </body> 
</html>
