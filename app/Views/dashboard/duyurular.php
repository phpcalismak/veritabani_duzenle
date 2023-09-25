<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<style>
    /* CSS ile active başlığı özelleştirin */
    .list-group-item.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
</style>

<div class="row message-wrapper rounded p-3">
    <div class="col-md-4 message-sideleft">
        <div class="panel">
            <div class="panel-heading">
                <div class="pull-left ml-3 mt-3">
                    <h3 class="panel-title">Duyurular</h3>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="list-group no-margin list-message">
                    <?php foreach ($duyurular as $duyuru): ?>
                        <a href="#" class="list-group-item" data-duyuru="<?= $duyuru['duyuru_metni']; ?>" data-duyuru-id="<?= $duyuru['duyuru_id']; ?>">
                            <h4 class="list-group-item-heading"><?= $duyuru['duyuru_basligi']; ?></h4>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 message-sideright">
        <div class="panel" id="duyuruDetayPanel">
            <div class="panel-heading">
                <div class="media">
                    <a class="pull-left" href="#"></a>
                    <div class="media-body">
                       
                    </div>
                </div>
            </div>
            <div class="panel-body mt-5 p-5 bg-white" id="duyuruDetayIcerik">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".list-group-item").click(function () {
            // Tüm başlıkları pasif yapın
            $(".list-group-item").removeClass("active");

            var duyuruMetni = $(this).data("duyuru");
            var duyuruId = $(this).data("duyuru-id");
            $("#duyuruDetayIcerik").html(duyuruMetni);

            // Seçilen başlığı active yapın
            $(this).addClass("active");
        });
    });
</script>

<?= $this->endSection('content') ?>
