<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Şifre değiştir</title>
  </head>
  <body>



<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <h1>Şifre değiştir</h1>
                <img weight="200" height="200" src="<?= $website_ayarlari['site_logosu']   ?> ">
                <?php if(session()->getFlashdata('msg')):?> 
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
        

            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('yeni_sifre/' . $token); ?>">
                <div class="mb-3">
                    <label for="InputForNewPassword" class="form-label">Yeni Şifre</label>
                    <input type="password" name="new_password" class="form-control" id="InputForNewPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForConfirmPassword" class="form-label">Yeni Şifre (Tekrar)</label>
                    <input type="password" name="confirm_password" class="form-control" id="InputForConfirmPassword">
                </div>
                <button type="submit" class="btn btn-primary">Şifreyi Sıfırla</button>
            </form>

            </div>
        </div>
    </div>
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>