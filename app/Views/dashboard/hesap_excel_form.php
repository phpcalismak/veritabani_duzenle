<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <h1>Excel</h1>

Toplu veri girmek için gereken Excel şablonunu <a href="<?= base_url('hesap_excel_template')  ?>">buradan</a> indirebilirsiniz.





    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <div class="container p-3 mt-3">
        <form action="<?= base_url('hesap_excel_upload') ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="excel_file" accept=".xlsx">
            
            <button type="submit" class="btn btn-success">Yükle</button>
        </form>
    </div>
</div>






<?= $this->endSection('content') ?>
