<!-- app/Views/dashboard/aidat_borclarim.php -->

<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <h2>Aidat Borçlarım</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Borçlu Aidatlar</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Aidat ID</th>
               
                        <th>Açıklama</th>
                        <th>Ödeme Tarihi</th>
                        <th>Tutar</th>
                        <th>Ödeme Yap</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borcluAidatlar as $aidat) : ?>
                        <tr>
                            <td><?= $aidat['aidat_id']; ?></td>
                          
                            <td><?= $aidat['aciklama']; ?></td>
                            <td><?= $aidat['odeme_tarihi']; ?></td>
                            <td><?= $aidat['tutar']; ?></td>
                            <td>
                                <a href="<?= site_url('aidat_borclarim/odeme-yap/' . $aidat['aidat_id']); ?>" class="btn btn-sm btn-primary">Ödeme Yap</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h3>Ödenmiş Aidatlar</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Aidat ID</th>
                        <th>Kategori</th>
                        <th>Açıklama</th>
                        <th>Ödeme Tarihi</th>
                        <th>Tutar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($odenmisAidatlar as $aidat) : ?>
                        <tr>
                            <td><?= $aidat['aidat_id']; ?></td>
                            <td><?= $aidat['kategori']; ?></td>
                            <td><?= $aidat['aciklama']; ?></td>
                            <td><?= $aidat['odeme_tarihi']; ?></td>
                            <td><?= $aidat['tutar']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
