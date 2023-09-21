<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">




    <div class="row">
        <div class="col-lg-10">
            <h2>Giderler</h2>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#kategoriModal">
                Kategorileri Düzenle
            </button>       
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Gider Ekle
            </button>
        </div>

        <div class="mb-3">
        <form action="<?= base_url('excelForm') ?>">
            <input class="btn btn-primary" type="submit" value="Excel'den Aktar" />
        </form>
        </div>

        
    </div>
    <table class="table table-bordered table-striped" id="UserTable">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Toplam Tutar</th>
                <th>Ödeme Tarihi</th>
                <th>Açıklama</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($giderler as $gider) : ?>
                <tr id="<?= $gider['gider_id']; ?>">
                    <td><?= $gider['kategori_adi']; ?></td>
                    <td><?= $gider['toplam_odenecek']; ?></td>
                    <td><?= $gider['son_odeme_tarihi']; ?></td> 
                    <td><?= $gider['aciklama']; ?></td>
                    <td>
                        <a data-id="<?= $gider['gider_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="<?= $gider['gider_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<!-- Ekleme Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Gider Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addUser" name="addUser" action="<?= site_url('giderler/store'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtKategori">Gider Kategorisi:</label>
                            <select class="form-control" id="txtKategori" name="txtKategori">
                                <option value="">Kategori Seçin</option>
                                <?php foreach ($giderKategorileri as $kategori) : ?>
                                    <option value="<?= $kategori['kategori_id']; ?>"><?= $kategori['kategori_adi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtToplamOdenecek">Toplam Ödenecek Tutar:</label>
                            <input type="text" class="form-control" id="txtToplamOdenecek" placeholder="Ödenecek Tutar" name="txtToplamOdenecek">
                        </div>
                            <div class="form-group">
                            <label for="txtSonOdemeTarihi">Son Ödeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtSonOdemeTarihi" placeholder="Son Ödeme Tarihi" name="txtSonOdemeTarihi">
                        </div>
                          <div class="form-group">
                            <label for="txtOdenenTutar">Ödenen Tutar:</label>
                            <input type="text" class="form-control" id="txtOdenenTutar" placeholder="Son Ödeme Tarihi" name="txtOdenenTutar">
                        </div>
                         <div class="form-group">
                            <label for="txtAciklama">Açıklama:</label>
                            <input type="text" class="form-control" id="txtAciklama" placeholder="Açıklama" name="txtAciklama">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--  Güncelleme Modal-->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUser" name="updateUser" action="<?= site_url('giderler/update'); ?>" method="post">
                   <div class="modal-body">
                        <div class="form-group">
                            <label for="txtKategori">Gider Kategorisi:</label>
                            <input type="text" class="form-control" id="txtKategori" placeholder="Gider Kategorisi Seçin" name="txtKategori">
                        </div>
                        <div class="form-group">
                            <label for="txtToplamOdenecek">Toplam Ödenecek Tutar:</label>
                            <input type="text" class="form-control" id="txtToplamOdenecek" placeholder="Ödenecek Tutar" name="txtToplamOdenecek">
                        </div>
                            <div class="form-group">
                            <label for="txtSonOdemeTarihi">Son Ödeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtSonOdemeTarihi" placeholder="Son Ödeme Tarihi" name="txtSonOdemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txtAciklama">Açıklama:</label>
                            <input type="text" class="form-control" id="txtAciklama" placeholder="Açıklama" name="txtAciklama">
                        </div>
                           <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Gider Kategorisi Modal -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Kategorileri Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <p><strong>Mevcut Kategoriler</strong></p>
                    <hr>
                    <?php foreach ($giderKategorileri as $kategori): ?>
                        <tr id="<?= $kategori['kategori_id'] ?>">
                            <td><?= $kategori['kategori_adi'] ?></td>
                            <td>  <a data-id="<?= $kategori['kategori_id'] ?>" class="btn btn-danger btnDeleteKategori">Sil</a></td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
                <form id="updateUser" name="updateUser" action="<?= site_url('giderler/kategori'); ?>" method="post">
                   <div class="modal-body">
                        <div class="form-group">
                            <label for="txtKategori">Gider Kategorisi:</label>
                            <input type="text" class="form-control" id="txtKategori" placeholder="Gider Kategorisi" name="txtKategori">
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kategoriyi Ekle</button>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $this->endSection('content') ?>


<?= $this->section('pageSpecificScript') ?>
<script>
     $(document).ready(function () {
        var userTable = $('#UserTable').DataTable();

        $("#addUser").validate({
            rules: {
                txtKategori: "required",
                txtToplamOdenecek: "required",
                txtSonOdemeTarihi: "required",
                txtAciklama: "required",
            },
            messages: {},
            submitHandler: function (form) {
                var form_action = $("#addUser").attr("action");
                $.ajax({
                    data: $('#addUser').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                        var newRow = [
                            res.data.gider_id,
                            res.data.kategori_id,
                            res.data.toplam_odenecek,
                            res.data.son_odeme_tarihi,
                            res.data.aciklama,
                            '<a data-id="' + res.data.gider_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                            '<a data-id="' + res.data.gider_id + '" class="btn btn-danger btnDelete">Delete</a>'
                        ];
                        
                        userTable.row.add(newRow).draw(false);

                        $('#addUser')[0].reset();
                        $('#addModal').modal('hide');
                    },
                    error: function (data) {}
                });
            }
        });


        $('body').on('click', '.btnEdit', function () {
            var gider_id = $(this).attr('data-id');
            $.ajax({
                url: 'giderler/edit/' + gider_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#updateModal').modal('show');
                    $('#updateUser #hdnUserId').val(res.data.gider_id);
                    $('#updateUser #txtUsername').val(res.data.kategori);
                    $('#updateUser #txtPassword').val(res.data.aciklama);
                },
                error: function (data) {}
            });
        });

        $("#updateUser").validate({
            rules: {
                txtUsername: "required",
                txtPassword: "required"
            },
            messages: {},
            submitHandler: function (form) {
                var form_action = $("#updateUser").attr("action");
                $.ajax({
                    data: $('#updateUser').serialize(),
                    url: form_action,
                    type: "POST",
                    dataType: 'json',
                    success: function (res) {
                    var updatedRow = userTable.row('#' + res.data.gider_id);
                    updatedRow.data([
                       res.data.gider_id,
                            res.data.kategori_id,
                            res.data.toplam_odenecek,
                            res.data.son_odeme_tarihi,
                            res.data.aciklama,
                        '<a data-id="' + res.data.gider_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                        '<a data-id="' + res.data.gider_id + '" class="btn btn-danger btnDelete">Delete</a>'
                    ]).draw();

                    $('#updateUser')[0].reset();
                    $('#updateModal').modal('hide');
                },
                    error: function (data) {}
                });
            }
        });

        $('body').on('click', '.btnDelete', function () {
        var gider_id = $(this).attr('data-id');
        $.get('giderler/delete/' + gider_id, function (data) {
            userTable.row('#' + gider_id).remove().draw();
            })
        });

         $('.btnDeleteKategori').click(function () {
            var kategoriID = $(this).data('id');
            
            if (confirm('Bu kategoriyi silmek istediğinizden emin misiniz?')) {
                $.ajax({
                    url: '<?= site_url('giderler/giderkategorisil/') ?>' + kategoriID,
                    type: 'GET',
                    dataType: 'json',
                    success: function (res) {
                        if (res.status) {
                            $('#' + kategoriID).remove();
                        } else {
                            alert('Kategori silinemedi.');
                        }
                    },
                    error: function () {
                        alert('Bir hata oluştu.');
                    }
                });
            }
        });
    
    });

// EXCEL BUTONU 

  
</script>
<?= $this->endSection('pageSpecificScript') ?>
 