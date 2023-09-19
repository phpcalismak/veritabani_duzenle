<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-6">
                <h1>Kayıt ol</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                 <form method="post" action="<?= site_url('/save') ?>">
                    <div class="mb-3">
                        <label for="kullanici_adi" class="form-label">Ad</label>
                        <input type="text" name="kullanici_adi" class="form-control" id="kullanici_adi" value="<?= set_value('kullanici_adi') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email adresi</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sifre" class="form-label">Şifre</label>
                        <input type="password" name="sifre" class="form-control" id="sifre">
                    </div>
                    <div class="mb-3">
                        <label for="InputForConfPassword" class="form-label">Şifreyi onayla</label>
                        <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <div class="mt-3">
                 <a href = "<?= site_url('/login'); ?>">Giriş Yap</a>
             </div>
            </div>
           
        </div>
    </div>
    
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>