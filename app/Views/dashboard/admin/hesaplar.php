<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <div class="row">
        <div class="col-lg-8">
            <h2>Hesaplar</h2>
        </div>



        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Hesap Ekle
            </button>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="userTable">
        <thead>
            <tr>
                <th>hesap id</th>
                <th>hesap turu</th>
                <th>email</th>
                <th>şifre</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hesaplar as $hesap) : ?>
               <tr id="<?= $hesap['hesap_id']; ?>">
                    <td><?= $hesap['hesap_id']; ?></td>
                    <td><?php
                        if ($hesap['hesap_turu'] == 1) {
                            echo 'Yönetici';
                        } else {
                            echo 'Site Sakini';
                        }
                    ?></td>
                      <td><?= $hesap['email']; ?></td>
                    <td><?= $hesap['sifre']; ?></td>
            <td>
        <a data-id="<?= $hesap['hesap_id']; ?>" class="btn btn-primary btnEdit">Edit</a>
        <a data-id="<?= $hesap['hesap_id']; ?>" class="btn btn-danger btnDelete">Delete</a>
        
        <!-- Profil bağlantısı ekle -->
        <a href="<?= site_url('profiller/') . $hesap['hesap_id']; ?>" class="btn btn-info">Profil</a>
    </td>
</tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Yeni Hesap Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addUser" name="addUser" action="<?= site_url('daireler/store'); ?>" method="post">
                    <div class="modal-body">

                        <!--   input alanı -->
                        <div class="form-group">
                            <label for="txtUsername">Hesap Türü:</label>
                            <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username" name="txtUserName">
                        </div>
                          <!--   input alanı -->
                        <div class="form-group">
                            <label for="txtEmail">Email:</label>
                            <input type="text" class="form-control" id="txtEmail" placeholder="Enter Email" name="txtEmail">
                        </div>
                      
                         <div class="form-group">
                            <label for="txtDuzenlemeTarihi">Şifre:</label>
                            <input type="text" class="form-control" id="txtDuzenlemeTarihi" placeholder="Enter Password" name="txtDuzenlemeTarihi">
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
                            <label for="txtUsername">Hesap Türü:</label>
                            <input type="text" class="form-control" id="txtUsername" placeholder="Enter Username" name="txtUserName">
                        </div>
                         <div class="form-group">
                            <label for="txtEmail">Email:</label>
                            <input type="text" class="form-control" id="txtEmail" placeholder="Enter Email" name="txtEmail">
                        </div>
                    
                            <div class="form-group">
                            <label for="txtDuzenlemeTarihi">Şifre:</label>
                            <input type="text" class="form-control" id="txtDuzenlemeTarihi" placeholder="Enter Password" name="txtDuzenlemeTarihi">
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
                txtEmail: "required",
                txtUsername: "required",
               
                txtDuzenlemeTarihi: "required",
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
                            res.data.hesap_id,
                            res.data.hesap_turu,
                     
                            res.data.email,
                            res.data.sifre,
                            '<div class="btn-group">' +
                            '<button type="button" class="btn btn-primary btnEdit" data-id="' + res.data.hesap_id + '">Edit</button>' +
                            '<button type="button" class="btn btn-danger btnDelete" data-id="' + res.data.hesap_id + '">Delete</button>' +
                            '</div>'
                        ];

                        userTable.row.add(newRow).draw(false);

                        $('#addUser')[0].reset();
                        $('#addModal').modal('hide');
                    },
                    error: function (data) { }
                });
            }
        });

        $('body').on('click', '.btnEdit', function () {
            var hesap_id = $(this).attr('data-id');
            $.ajax({
                url: 'daireler/edit/' + hesap_id,
                type: "GET",
                dataType: 'json',
                success: function (res) {
                    $('#updateModal').modal('show');
                    $('#updateUser #hdnUserId').val(res.data.hesap_id);
                    $('#updateUser #txtUsername').val(res.data.kategori);
                
                },
                error: function (data) { }
            });
        });

        $("#updateUser").validate({
            rules: {
                txtUsername: "required",
              
                txtDuzenlemeTarihi: "required",
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
                        var updatedRow = userTable.row('#' + res.data.hesap_id);
                        updatedRow.data([
                            res.data.hesap_id,
                            res.data.hesap_turu,
                             res.data.email,
                         
                            res.data.sifre,
                            '<div class="btn-group">' +
                            '<button type="button" class="btn btn-primary btnEdit" data-id="' + res.data.hesap_id + '">Edit</button>' +
                            '<button type="button" class="btn btn-danger btnDelete" data-id="' + res.data.hesap_id + '">Delete</button>' +
                            '</div>'
                        ]).draw();

                        $('#updateUser')[0].reset();
                        $('#updateModal').modal('hide');
                    },
                    error: function (data) { }
                });
            }
        });

        $('body').on('click', '.btnDelete', function () {
            var hesap_id = $(this).attr('data-id');
            $.get('daireler/delete/' + hesap_id, function (data) {
                userTable.row('#' + hesap_id).remove().draw();
            })
        });

        $(".profile-link").on("click", function () {
            var hesapId = $(this).data("hesapid");
            window.location.href = "<?= site_url('profil/'); ?>" + hesapId;
        });
    });
</script>


<?= $this->endSection('pageSpecificScript') ?>
 