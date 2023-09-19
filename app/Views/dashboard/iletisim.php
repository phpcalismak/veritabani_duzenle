<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2>İletişim Bilgileri</h2>
        </div>
    </div>

      
        <div class="form-group">
            <label for="site_basligi">Site Başlığı:</label>
            <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
         <div class="form-group">
            <label for="site_aciklamasi">Site Logosu :</label>
            
        </div>
        <div class="form-group">
            <label for="site_aciklamasi">Site Açıklaması:</label>
              <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
        <div class="form-group">
            <label for="email_adresi">E-Mail Adresi:</label>
              <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
        <div class="form-group">
            <label for="telefon_numarasi">Telefon Numarası:</label>
              <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
        <div class="form-group">
            <label for="ana_sayfa_mesaji">Ana Sayfa Mesajı:</label>
    <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
        <div class="form-group">
            <label for="sosyal_medya_linkleri">Sosyal Medya Linkleri:</label>
             <p class="form-control" id="site_basligi"><?= $website_ayarlari['site_basligi']; ?></p>
        </div>
      
</div>

<?= $this->endSection('content') ?>
