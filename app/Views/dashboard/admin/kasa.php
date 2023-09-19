<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h2>Kasa</h2>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Kasa Ekle
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="KasaTable">
        <thead>
            <tr>
                <th>Kasa</th>
                <th>Düzenleme Tarihi</th>
                <th>Bakiye</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kasalar as $kasa) : ?>
                <tr id="<?= $kasa['kasa_id']; ?>">
                    <td><?= $kasa['kasa_adi']; ?></td>
                    <td><?= $kasa['tarih']; ?></td>
                    <td><?= $kasa['bakiye']; ?></td>
                    <td>
                        <a data-id="<?= $kasa['kasa_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="<?= $kasa['kasa_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Kasa ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addKasa" name="addKasa" action="<?= site_url('kasa/store'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtKasaAdi">Kasa adı:</label>
                            <input type="text" class="form-control" id="txtKasaAdi" placeholder="Kasa Adı" name="txtKasaAdi">
                        </div>
                        <div class="form-group">
                            <label for="txtBakiye">Bakiye:</label>
                            <input type="text" class="form-control" id="txtBakiye" placeholder="Bakiye" name="txtBakiye">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Kasa Güncelle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateKasa" name="updateKasa" action="<?= site_url('kasa/update'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="hdnKasaId" id="hdnKasaId"/>
                        <div class="form-group">
                            <label for="txtKasaAdi">Kasa adı:</label>
                            <input type="text" class="form-control" id="txtKasaAdi" placeholder="Kasa Adı" name="txtKasaAdi">
                        </div>
                        <div class="form-group">
                            <label for="txtBakiye">Bakiye:</label>
                            <input type="text" class="form-control" id="txtBakiye" placeholder="Bakiye" name="txtBakiye">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection('content') ?>

<?= $this->section('pageSpecificScript') ?>
<script>
    $(document).ready(function () {
        var kasaTable = $('#KasaTable').DataTable();

        $("#addKasa").validate({
            rules: {
                txtKasaAdi: "required",
                txtBakiye: "required"
            },
            messages: {},
            submitHandler: function (form) {
                var form_action = $("#addKasa").attr("action");
                $.ajax({
                    data: $('#addKasa').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        var newRow = [
                            res.data.kasa_adi,
                            res.data.tarih,
                            res.data.bakiye,
                            '<a data-id="' + res.data.kasa_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                            '<a data-id="' + res.data.kasa_id + '" class="btn btn-danger btnDelete">Delete</a>'
                        ];

                        kasaTable.row.add(newRow).draw(false);

                        $('#addKasa')[0].reset();
                        $('#addModal').modal('hide');
                    },
                    error: function (data) {}
                });
            }
        });

        $('body').on('click', '.btnEdit', function () {
            var kasa_id = $(this).attr('data-id');
            $.ajax({
                url: 'kasa/edit/' + kasa_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#updateModal').modal('show');
                    $('#updateKasa #hdnKasaId').val(res.data.kasa_id);
                    $('#updateKasa #txtKasaAdi').val(res.data.kasa_adi);
                    $('#updateKasa #txtBakiye').val(res.data.bakiye);
                },
                error: function (data) {}
            });
        });

        $("#updateKasa").validate({
            rules: {
                txtKasaAdi: "required",
                txtBakiye: "required"
            },
            messages: {},
            submitHandler: function (form) {
                var form_action = $("#updateKasa").attr("action");
                $.ajax({
                    data: $('#updateKasa').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        var updatedRow = kasaTable.row('#' + res.data.kasa_id);
                        updatedRow.data([
                            res.data.kasa_adi,
                            res.data.tarih,
                            res.data.bakiye,
                            '<a data-id="' + res.data.kasa_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                            '<a data-id="' + res.data.kasa_id + '" class="btn btn-danger btnDelete">Delete</a>'
                        ]).draw();

                        $('#updateKasa')[0].reset();
                        $('#updateModal').modal('hide');
                    },
                    error: function (data) {}
                });
            }
        });

        $('body').on('click', '.btnDelete', function () {
            var kasa_id = $(this).attr('data-id');
            $.get('kasa/delete/' + kasa_id, function (data) {
                kasaTable.row('#' + kasa_id).remove().draw();
            });
        });
    });
</script>
<?= $this->endSection('pageSpecificScript') ?>
