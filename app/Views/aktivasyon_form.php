<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Aktivasyon</title>
  </head>
  <body>



<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <h1>Aktivasyon Kodu</h1>
                <img weight="200" height="200" src="<?= $website_ayarlari['site_logosu']   ?> ">
                <?php if(session()->getFlashdata('msg')):?> 
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <form action="<?= site_url('aktivasyon/kontrol') ?>" method="post">
                    <div class="mb-3">
                        <input  type="text" name="aktivasyon_kodu" placeholder="Aktivasyon Kodu" required>
                         <button class ="btn btn-success" type="submit">Gönder</button>
                    </div>
                    <div class="mt-3">
                       
                        <button class="btn btn-warning"type="button" name="resend">Kodu Tekrar Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>