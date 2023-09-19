<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-6">
                <h1> <?= $website_ayarlari['site_basligi'] ?></h1>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                 <img src="<?= $website_ayarlari['site_logosu'] ?>" width="300" height="300">
               <form method="post" action="<?php echo site_url('auth'); ?>">
    <img src=""> 
                        <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email Adresi</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Şifre</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword">
                    </div>
                    <div class = "mb-3">
                    <input type="checkbox" > Beni Hatırla
                </div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class ="mt-3">
                 <a href = "<?= site_url('register'); ?>">Kayıt Ol</a>
                 </div>
                 <div class="mb-3">
                  <a href="<?= base_url('sifremi_unuttum'); ?>">Şifremi Unuttum</a>
            </div>
        </div>
    </div>
    
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>