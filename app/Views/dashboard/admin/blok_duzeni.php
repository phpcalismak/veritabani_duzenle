<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2>Site Ayarları</h2>
        </div>
    </div>

    <form action="<?= site_url('site_ayarlari/update'); ?>" method="post">
      
        <div class="form-group">
            <label for="site_basligi">Site Başlığı:</label>
            <input type="text" class="form-control" id="site_basligi" name="site_basligi" value="<?= $website_ayarlari['site_basligi']; ?>">
        </div>
         <div class="form-group">
            <label for="site_aciklamasi">Site Logosu :</label>
            
        </div>
        <div class="form-group">
            <label for="site_aciklamasi">Site Açıklaması:</label>
            <textarea class="form-control" id="site_aciklamasi" name="site_aciklamasi" ><?= $website_ayarlari['site_aciklamasi']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="email_adresi">E-Mail Adresi:</label>
            <input type="text" class="form-control" id="email_adresi" name="email_adresi" value="<?= $website_ayarlari['email_adresi']; ?>">
        </div>
        <div class="form-group">
            <label for="telefon_numarasi">Telefon Numarası:</label>
            <input type="text" class="form-control" id="telefon_numarasi" name="telefon_numarasi" value="<?= $website_ayarlari['telefon_numarasi']; ?>">
        </div>
        <div class="form-group">
            <label for="ana_sayfa_mesaji">Ana Sayfa Mesajı:</label>
            <textarea class="form-control" id="ana_sayfa_mesaji" name="ana_sayfa_mesaji"><?= $website_ayarlari['ana_sayfa_mesaji']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="sosyal_medya_linkleri">Sosyal Medya Linkleri:</label>
            <input type="text" class="form-control" id="sosyal_medya_linkleri" name="sosyal_medya_linkleri" value="<?= $website_ayarlari['sosyal_medya_linkleri']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
    </form>
</div>

<?= $this->endSection('content') ?>
