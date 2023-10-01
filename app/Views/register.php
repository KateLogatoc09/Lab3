<!doctype html> 
<html lang="en"> 
    <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <title>Register</title> 
</head> 
    <body style="background-image:url(<?= base_url() ?>shop/images/b4.jpg)"> 
        <div class="container">
            <div class="row" style="margin-top:80px; margin-left:100px">
                <div class="col-md-4 col-md-offset-4">
                    <h2 style="color: white">Sign Up</h2><hr style="color: white">
                    <form action="/signup" method="post">
                    <?= csrf_field(); ?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?>
                        </div><?php endif ?>
                        <?php if(!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?>
                        </div><?php endif ?>
                    <div class="form-group">
                            <label for="" style="color: white; font-size:20px">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?= set_value('username'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : ''?></span>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: white; font-size:20px">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter your email" value="<?= set_value('email'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : ''?></span>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: white; font-size:20px">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?= set_value('password'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : ''?></span>
                        </div>
                        <div class="form-group">
                            <label for="" style="color: white; font-size:20px">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="<?= set_value('cpassword'); ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : ''?></span>
                        </div>
                        <center><br>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Sign up</buttn>
                        </div>
                        <br><a href="/login" style="color: lightgreen">I Already Have Account, Login</a></center>
                    </form>
                </div>
            </div>
        </div>    
    </body> 
</html>
