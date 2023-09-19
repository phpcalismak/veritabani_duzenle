<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">




    <table class="table table-bordered table-striped" id="UserTable">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Toplam Tutar</th>
                <th>Ödeme Tarihi</th>
                <th>Açıklama</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giderler as $gider) : ?>
                <tr id="<?= $gider['gider_id']; ?>">
                    <td><?= $gider['kategori_adi']; ?></td>
                    <td><?= $gider['toplam_odenecek']; ?></td>
                    <td><?= $gider['son_odeme_tarihi']; ?></td> 
                    <td><?= $gider['aciklama']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



<!-- /.content-wrapper -->
<?= $this->endSection('content') ?>
