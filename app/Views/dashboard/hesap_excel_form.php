<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <h1>Excel Yükleme Formu</h1>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <div class="container p-3">
        <form action="<?= base_url('hesap_excel_upload') ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="excel_file" accept=".xlsx">
            <button type="submit" class="btn btn-success">Yükle</button>
        </form>
    </div>
</div>

<?= $this->endSection('content') ?>
