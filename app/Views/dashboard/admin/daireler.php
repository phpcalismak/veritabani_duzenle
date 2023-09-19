<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <div class="row">
        <div class="col-lg-8">
            <h2>daireler</h2>
        </div>



        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Daire Ekle
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="userTable">
        <thead>
            <tr>
                <th>daire id</th>
                <th>blok_adi</th>
                <th>daire_no</th>
                <th>daire_tipi</th>
                <th>Aidat Borcu</th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daireler as $daire) : ?>
                <tr id="<?= $daire['daire_id']; ?>">
                    <td><?= $daire['daire_id']; ?></td>
                    <td><?= $daire['blok_adi']; ?></td>
                    <td><?= $daire['daire_no']; ?></td>
                    <td><?= $daire['daire_tipi']; ?></td>
                    <td><?= $daire['kasa']; ?></td>
                    <td>
                        <a data-id="<?= $daire['daire_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="<?= $daire['daire_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
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
                <form id="addUser" name="addUser" action="<?= site_url('daireler/store'); ?>" method="post">
                    <div class="modal-body">

                        <!--   input alanı -->
                        <div class="form-group">
                            <label for="txtUsername">Username:</label>
                            <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username" name="txtUserName">
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password:</label>
                            <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password" name="txtPassword">
                        </div>
                         <div class="form-group">
                            <label for="txtDuzenlemeTarihi">Duzenleme Tarihi:</label>
                            <input type="text" class="form-control" id="txtDuzenlemeTarihi" placeholder="Enter Password" name="txtDuzenlemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txtOdemeTarihi">Odeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtOdemeTarihi" placeholder="Enter Password" name="txtOdemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txtToplam">Toplam:</label>
                            <input type="text" class="form-control" id="txtToplam" placeholder="Enter Password" name="txtToplam">
                        </div>
                         <div class="form-group">
                            <label for="txtKalan">Kalan:</label>
                            <input type="text" class="form-control" id="txtKalan" placeholder="Enter Kalan" name="txtKalan">
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
                <form id="updateUser" name="updateUser" action="<?= site_url('daireler/update'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="hdnUserId" id="hdnUserId"/>
                      <!-- ***************   input alanı ******************* -->
                        <div class="form-group">
                            <label for="txtUsername">Username:</label>
                            <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username" name="txtUserName">
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password:</label>
                            <input type="text" class="form-control" id="txtPassword" placeholder="Enter Password" name="txtPassword">
                        </div>
                            <div class="form-group">
                            <label for="txtDuzenlemeTarihi">Duzenleme Tarihi:</label>
                            <input type="text" class="form-control" id="txtDuzenlemeTarihi" placeholder="Enter Password" name="txtDuzenlemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txtOdemeTarihi">Odeme Tarihi:</label>
                            <input type="text" class="form-control" id="txtOdemeTarihi" placeholder="Enter Password" name="txtOdemeTarihi">
                        </div>
                         <div class="form-group">
                            <label for="txtToplam">Toplam:</label>
                            <input type="text" class="form-control" id="txtToplam" placeholder="Enter Password" name="txtToplam">
                        </div>
                         <div class="form-group">
                            <label for="txtKalan">Kalan:</label>
                            <input type="text" class="form-control" id="txtKalan" placeholder="Enter Kalan" name="txtKalan">
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
            txtUsername: "required",
            txtPassword: "required",
            txtDuzenlemeTarihi: "required",
            txtOdemeTarihi: "required",
            
            

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
                       res.data.daire_id,
                        res.data.blok_adi,
                        res.data.daire_no,
                        res.data.daire_tipi,
                        res.data.kasa,
                        '<a data-id="' + res.data.daire_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                        '<a data-id="' + res.data.daire_id + '" class="btn btn-danger btnDelete">Delete</a>'
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
            var daire_id = $(this).attr('data-id');
            $.ajax({
                url: 'daireler/edit/' + daire_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#updateModal').modal('show');
                    $('#updateUser #hdnUserId').val(res.data.daire_id);
                    $('#updateUser #txtUsername').val(res.data.kategori);
                    $('#updateUser #txtPassword').val(res.data.aciklama);
                },
                error: function (data) {}
            });
        });
    

    $("#updateUser").validate({
        rules: {
            txtUsername: "required",
            txtPassword: "required",
            txtDuzenlemeTarihi: "required",
            txtOdemeTarihi: "required",
            
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
                    var updatedRow = userTable.row('#' + res.data.daire_id);
                    updatedRow.data([
                        res.data.daire_id,
                        res.data.blok_adi,
                        res.data.daire_no,
                        res.data.daire_tipi,
                        res.data.kasa,
                      
                        '<a data-id="' + res.data.daire_id + '" class="btn btn-primary btnEdit">Edit</a>' +
                        '<a data-id="' + res.data.daire_id + '" class="btn btn-danger btnDelete">Delete</a>'
                    ]).draw();

                    $('#updateUser')[0].reset();
                    $('#updateModal').modal('hide');
                },
                error: function (data) {}
            });
        }
    });
  $('body').on('click', '.btnDelete', function () {
        var daire_id = $(this).attr('data-id');
        $.get('daireler/delete/' + daire_id, function (data) {
            userTable.row('#' + daire_id).remove().draw();
            })
        });
    });

</script>
<?= $this->endSection('pageSpecificScript') ?>
 