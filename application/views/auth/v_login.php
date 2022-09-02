<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopee Express | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/backend'); ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend'); ?>/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/backend'); ?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/frontend'); ?>/img/logo1.png" />
    <link rel="stylesheet" href="<?= base_url('assets/backend'); ?>/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/frontend'); ?>/img/logo/logo2.png" alt="logo">
                            </div>
                            <h4>Shopee Express HUB Pancoran</h4>
                            <h6 class="font-weight-light">Sign in</h6>
                            <form id="frm_login" class="pt-3">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="login()">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/backend'); ?>/vendors/base/vendor.bundle.base.js"></script>
    <script src="<?= base_url('assets/backend'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/backend'); ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets/backend'); ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/backend'); ?>/js/template.js"></script>
    <script src="<?= base_url('assets/backend'); ?>/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function login() {
        var link_login = '<?= base_url() . 'auth/login/proses_login'; ?>';

        var form = $('#frm_login');
        var data = form.serializeArray();
        var formHtml = form[0];
        var NewData = new FormData(formHtml);

        console.log(data);

        $.ajax({
            url: link_login,
            type: "POST",
            data: NewData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false
        }).done(function(response) {
            if (response.success) {
                // redirect
                window.location.reload();
            } else {
                Toast.fire({
                    icon: 'error',
                    title: response.msg
                });
            }
        });
    }
</script>