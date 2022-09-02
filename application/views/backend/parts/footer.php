<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a target="_blank">Shopee Express</a> HUB Pancoran.</span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= base_url('assets/backend'); ?>/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= base_url('assets/backend'); ?>/vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/backend'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('assets/backend'); ?>/js/off-canvas.js"></script>
<script src="<?= base_url('assets/backend'); ?>/js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/backend'); ?>/js/template.js"></script>
<script src="<?= base_url('assets/backend'); ?>/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/backend'); ?>/js/dashboard.js"></script>
<!-- End custom js for this page-->

</body>

</html>

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>