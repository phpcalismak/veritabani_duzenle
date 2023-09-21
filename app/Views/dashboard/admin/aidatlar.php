<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <div class="row">
        <div class="col-lg-8">
            <h2>Aidatlar</h2>
        </div>



        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Aidat Ekle
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="userTable">
        <thead>
            <tr>
                <th>aidat id</th>
                <th>aciklama</th>
                <th>odeme_tarihi</th>
                <th>tutar</th>
            


                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aidatlar as $aidat) : ?>
                <tr id="<?= $aidat['aidat_id']; ?>">
                    <td><?= $aidat['aidat_id']; ?></td>
                    <td><?= $aidat['aciklama']; ?></td>
                    <td><?= $aidat['odeme_tarihi']; ?></td>
                    <td><?= $aidat['tutar']; ?></td>
                    
                    <td>
                        <a data-id="<?= $aidat['aidat_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="<?= $aidat['aidat_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addUser" name="addUser" action="<?= site_url('aidatlar/store'); ?>" method="post">
                    <div class="modal-body">

                        <!--   input alanı -->
                       
                        <div class="form-group">
                            <label for="txtAciklama">Açıklama:</label>
                            <input type="text" class="form-control" id="txtAciklama" placeholder="Açıklama girin" name="txtAciklama">
                        </div>
                      
                         <div class="form-group">
                            <label for="txtOdemeTarihi">Ödeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtOdemeTarihi" placeholder="Ödenmesi gereken tarih" name="txtOdemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txttutar">Tutar:</label>
                            <input type="text" class="form-control" id="txttutar" placeholder="Aidat Tutarı" name="txttutar">
                        </div>
                        

                        <!-- input alanı bitiş -->

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
                    <h5 class="modal-title" id="ModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUser" name="updateUser" action="<?= site_url('aidatlar/update'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="hdnUserId" id="hdnUserId"/>
                      <!-- ***************   input alanı ******************* -->
                        
                        <div class="form-group">
                            <label for="txtAciklama">Açıklama:</label>
                            <input type="text" class="form-control" id="txtAciklama" placeholder="Açıklama girin" name="txtAciklama">
                        </div>

                         <div class="form-group">
                            <label for="txtOdemeTarihi">Odeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtOdemeTarihi" placeholder="Enter Password" name="txtOdemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txttutar">tutar:</label>
                            <input type="text" class="form-control" id="txttutar" placeholder="Enter tutar" name="txttutar">
                        </div>
                      


                         <!--************* input alanı bitiş ***************-->
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
    var userTable = $('#userTable').DataTable();
    $(document).ready(function () {
    $("#addUser").validate({
        rules: {
            txtAciklama: "required",
            txtOdemeTarihi: "required",
            txttutar: "required",
          
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
                        res.data.aidat_id,
                        res.data.aciklama,
                        res.data.odeme_tarihi,
                        res.data.tutar,
                      
                        '<a data-id="' + res.data.aidat_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                        '<a data-id="' + res.data.aidat_id + '" class="btn btn-danger btnDelete">Delete</a>'
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
            var aidat_id = $(this).attr('data-id');
            $.ajax({
                url: 'aidatlar/edit/' + aidat_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#updateModal').modal('show');
                    $('#updateUser #hdnUserId').val(res.data.aidat_id);
                 
                    $('#updateUser #txtPassword').val(res.data.aciklama);
                },
                error: function (data) {}
            });
        });
    

    $("#updateUser").validate({
        rules: {
          
            txtAciklama: "required",
            txtOdemeTarihi: "required",
            txttutar: "required",
          
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
                    var updatedRow = userTable.row('#' + res.data.aidat_id);
                    updatedRow.data([
                        res.data.aidat_id,
                       
                        res.data.aciklama,
                        res.data.odeme_tarihi,
                        res.data.tutar,
                      
                        '<a data-id="' + res.data.aidat_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                        '<a data-id="' + res.data.aidat_id + '" class="btn btn-danger btnDelete">Delete</a>'
                    ]).draw();

                    $('#updateUser')[0].reset();
                    $('#updateModal').modal('hide');
                },
                error: function (data) {}
            });
        }
    });
  $('body').on('click', '.btnDelete', function () {
        var aidat_id = $(this).attr('data-id');
        $.get('aidatlar/delete/' + aidat_id, function (data) {
            userTable.row('#' + aidat_id).remove().draw();
            })
        });
    });

</script>
<?= $this->endSection('pageSpecificScript') ?>
 