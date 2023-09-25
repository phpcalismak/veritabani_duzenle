<!-- views/layout/admin_template.php dosyasının içeriği -->

<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <style>
        /* CSS ile active başlığı özelleştirin */
        .list-group-item.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        /* Duyuru Sil butonunun stilini özelleştirin */
        .delete-duyuru-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>

    <div class="row message-wrapper rounded">
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
                                <h4 class="list-group-item-heading"><?= $duyuru['duyuru_basligi']; ?>
                                    <button class="delete-duyuru-btn float-right" data-duyuru-id="<?= $duyuru['duyuru_id']; ?>">Sil</button>
                                </h4>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 message-sideright mt-5 bg-white">
            <div class="panel" id="duyuruDetayPanel">
                <div class="panel-heading">
                    <div class="media">
                        <a class="pull-left" href="#"></a>
                        <h5>
                            <div class="panel-body " id="duyuruDetayIcerik">

                            </div>
                        </h5>
                        <div class="media-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Duyuru Ekle</h2>
            <br>
            <form method="post" action="<?= base_url('duyuru_post'); ?>">
                <label for="baslik">Duyuru Başlığı:</label>
                <input type="text" id="baslik" name="baslik">
                <br>
                <label for="mesaj">Duyuru Metni:</label>
                <textarea id="mesaj" name="mesaj" rows="4" cols="50"></textarea>
                <br>
                <button class="btn btn-primary" type="submit">Duyuru Gönder</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".list-group-item").click(function () {
            $(".list-group-item").removeClass("active");
            var duyuruMetni = $(this).data("duyuru");
            var duyuruId = $(this).data("duyuru-id");
            $("#duyuruDetayIcerik").html(duyuruMetni);
            $(this).addClass("active");
        });

        $(".delete-duyuru-btn").click(function () {
            var duyuruId = $(this).data("duyuru-id");
            if (confirm("Duyuruyu silmek istediğinizden emin misiniz?")) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('/duyurugonder/delete/') ?>" + duyuruId,
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert("Duyuru silme sırasında bir hata oluştu.");
                        }
                    },
                    error: function () {
                        alert("Duyuru silme işlemi sırasında bir hata oluştu.");
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection('content') ?>
