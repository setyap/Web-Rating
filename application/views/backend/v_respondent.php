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
                        <h4 class="font-weight-bold mb-0">Respondent</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Respondent Table</h4>
                        <div class="template-demo mb-5">
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('all')">View All</button>
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('sangat tidak puas')">Sangat Tidak Puas</button>
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('tidak puas')">Tidak Puas</button>
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('puas')">Puas</button>
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('cukup puas')">Cukup Puas</button>
                            <button type="button" class="btn btn-primary btn-rounded btn-fw" onclick="getData('sangat puas')">Sangat Puas</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tbl_respondent">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Rating </th>
                                        <th>Score</th>
                                        <th>Summary</th>
                                        <th>Kerusakan Paket</th>
                                        <th>Feedback</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

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
            getData('all');
        });

        function getData($where) {
            var table = $('#tbl_respondent');
            var table_body = table.find('tbody');

            table_body.html('');

            $.ajax({
                url: '<?= base_url() . 'respondent/get'; ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    where: $where,
                },
                success: function(result) {

                    if (result.success) {
                        let data_dtl = result.data;

                        $.each(data_dtl, function(i, data) {
                            table_body.append(`
            			<tr>
            			<td>` + data.no + `</td>
            			<td>` + data.nm_responden + `</td>
            			<td>` + data.rate + `</td>
            			<td>` + data.score + `</td>
            			<td>` + data.summary + `</td>
            			<td>` + data.kerusakan + `</td>
            			<td>` + data.feedback + `</td>
            			<td>` + data.format_date + `</td>`)
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: result.msg,
                        });
                    }
                }
            });
        }
    </script>