<?php

$this->load->view('Backend/Parts/header');
$this->load->view('Backend/Parts/navbar');
$this->load->view('Backend/Parts/sidebar');

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Quesioner</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quesioner Table</h4>
                        <button data-toggle="modal" data-target="#addUserModel" id="add_user" data-item="" type="button" class="btn btn-primary mb-4">Add Quesioner</button>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tbl_respondent">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    foreach ($quesioner as $data) : ?>
                                        <tr>
                                            <td><?php echo $no; ?>.</td>
                                            <td><?php echo $data['pertanyaan'] ?></td>
                                            <td><?php echo $data['status'] ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#updateModal" id="updateUser" data-item="<?= $data['id_pertanyaan'] ?>" data-stat="<?= $data['is_active'] ?>" type="button" class="btn btn-warning">Update</button>
                                                <button data-toggle="modal" data-target="#deleteModal" id="deleteUser" data-item="<?= $data['id_pertanyaan'] ?>" type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    <!-- Add User Modal-->
    <div class="modal fade" id="addUserModel" tabindex="-1" role="dialog" aria-labelledby="addUserModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModelLabel">Add New User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="frm_user" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Quesioner</label>
                                <input class="form-control" id="quesioner" type="text" name="quesioner" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="save_user" class="btn btn-primary" type="button" data-dismiss="modal">Save User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quesioner Modal-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Attention</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="frm_upd" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="upd_id_akun" name="id_akun" value="" />
                            <input type="hidden" id="upd_stat" name="stat" value="" />
                        </form>
                        <h4>Are you sure want to Update this Quesioner ?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="upd_ques" class="btn btn-primary" type="button" data-dismiss="modal">Yes, Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quesioner delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Attention</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="frm_del" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="del_id_akun" name="id_akun" value="" />
                        </form>
                        <h4>Are you sure want to Delete this Quesioner ?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="del_ques" class="btn btn-primary" type="button" data-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php

    $this->load->view('backend/parts/footer');

    ?>

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $(document).ready(function() {
            $(document).on("click", "#updateUser", function() {
                var id_akun = $(this).data('item');
                var is_active = $(this).data('stat');
                var stat = '';
                // console.log(id_akun);
                if (is_active == 1) {
                    stat = 0;
                } else {
                    stat = 1;
                }
                $('#upd_id_akun').val(id_akun);
                $('#upd_stat').val(stat);
            });

            $(document).on("click", "#deleteUser", function() {
                var id_akun = $(this).data('item');
                $('#del_id_akun').val(id_akun);
            });
        });

        $('#save_user').click(function() {
            var link_Save = '<?= base_url() . 'quesioner/save' ?>';

            var form = $('#frm_user');
            var data = form.serializeArray();
            console.log(data);
            var formHtml = form[0];
            var NewData = new FormData(formHtml);

            var quesioner = $('#quesioner').val();

            var is_valid = false;

            if (quesioner != '') {
                is_valid = true;
            } else {
                is_valid = false;
            }

            if (is_valid) {
                $.ajax({
                    url: link_Save,
                    type: "POST",
                    data: NewData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.msg,
                        });
                        $('#quesioner').val('');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.msg,
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Pastikan Form Terisi',
                });
            }

        });

        $('#upd_ques').click(function() {
            var link_Save = '<?= base_url() . 'quesioner/update' ?>';

            var form = $('#frm_upd');
            var data = form.serializeArray();
            console.log(data);
            var formHtml = form[0];
            var NewData = new FormData(formHtml);

            $.ajax({
                url: link_Save,
                type: "POST",
                data: NewData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false
            }).done(function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.msg,
                    });
                    $('#upd_id_akun').val('');
                    $('#upd_stat').val('');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.msg,
                    });
                }
            });
        });

        $('#del_ques').click(function() {
            var link_Save = '<?= base_url() . 'quesioner/delete' ?>';

            var form = $('#frm_del');
            var data = form.serializeArray();
            console.log(data);
            var formHtml = form[0];
            var NewData = new FormData(formHtml);

            $.ajax({
                url: link_Save,
                type: "POST",
                data: NewData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false
            }).done(function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.msg,
                    });
                    $('#del_id_akun').val('');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.msg,
                    });
                }
            });
        });
    </script>