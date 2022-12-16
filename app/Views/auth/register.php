<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
    body{
        background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);
    }
</style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 " style="margin-top: 70px">
            <h4>Sign Up</h4>
            <hr>
           <form action="<?= base_url('auth/save');?>" method="post">
           <?=csrf_field(); ?>
           <?php if( !empty( session()->getFlashdata('fail') ) ) : ?>
                   <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
               <?php endif ?>

               <?php if( !empty( session()->getFlashdata('success') ) ) : ?>
                   <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
               <?php endif ?>

                   
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your Name"  value="<?= set_value('name') ?>" >
                    <span class="text-danger"><?= isset($validation)? display_error($validation,'name') : ''?>
                     </span>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email"  value="<?= set_value('email') ?>">   
                         <span class="text-danger"><?= isset($validation)? display_error($validation,'email') : ''?>
                     </span>                     
                    
                </div>
                
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password"  value="<?= set_value('password') ?>">
                     <span class="text-danger"><?= isset($validation)? display_error($validation,'password') : ''?>
                     </span>
                   
                </div>      
                   <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm password"  value="<?= set_value('cpassword') ?>">
                     <span class="text-danger"><?= isset($validation)? display_error($validation,'cpassword') : ''?>
                     </span>
                   
                </div>             
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                <br>
                <a href="<?=site_url('auth'); ?>">I already have an account</a>

           </form>
        </div>
    </div>
</div>
    
</body>
</html>