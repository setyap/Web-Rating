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
                        <h4 class="font-weight-bold mb-0">Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <p class="card-title">Detailed Reports</p>
                        <div class="row">
                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                                <div class="ml-xl-4">
                                    <h1><?= $total_respon ?></h1>
                                    <h3 class="font-weight-light mb-xl-4">Responden</h3>
                                    <!-- <p class="text-muted mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                                <div class="row">
                                    <div class="col-md-6 mt-3 col-xl-5">
                                        <canvas id="rating_chart"></canvas>
                                        <div id="rating_legends"></div>
                                    </div>

                                    <div class="col-md-6 col-xl-7">
                                        <div class="table-responsive mb-3 mb-md-0">
                                            <table class="table table-borderless report-table">
                                                <?php
                                                foreach ($respon as $data) : ?>
                                                    <tr>
                                                        <td class="text-muted"><?= $data['nm_responden'] ?></td>
                                                        <td class="w-100 px-0">
                                                            <?= $data['rate'] ?>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-weight-bold mb-0"><?= $data['score'] ?></h5>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        $(document).ready(function() {
            chart();
            // chartRate();
        });

        function chart() {
            var areaData = {
                labels: [<?php foreach ($rating['dataset'] as $row) {
                                echo '"' . $row['summary'] . '",';
                            } ?>],
                datasets: [{
                    data: [<?php foreach ($rating['dataset'] as $row) {
                                echo '"' . $row['jumlah'] . '",';
                            } ?>],
                    backgroundColor: [
                        "#0099ff", "#66ccff", "#00cc00", "#66ff66", "#ffff00",
                    ],
                    borderColor: "rgba(0,0,0,0)"
                }]
            };
            var areaOptions = {
                responsive: true,
                maintainAspectRatio: true,
                segmentShowStroke: false,
                cutoutPercentage: 78,
                elements: {
                    arc: {
                        borderWidth: 4
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true
                },
                legendCallback: function(chart) {


                    var text = [];
                    var text_ = '';
                    text_ += '<div class="report-chart">';
                    text_ += '<?php $no = 0;
                                foreach ($rating["dataset"] as $data) : ?>';

                    text_ += '<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[<?= $no ?>] + '"></div><p class="mb-0"><?= $data["summary"] ?></p></div>';
                    text_ += '<p class="mb-0"><?= $data["jumlah"] ?></p>';
                    text_ += '</div>';

                    text_ += '<?php $no++;
                                endforeach; ?>';

                    text_ += '</div>';

                    // text.push()

                    return text_;
                },
            }
            var northAmericaChartPlugins = {
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = 3.125;
                    ctx.font = "600 " + fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = "#000";

                    var text = <?= $rating['rating'] ?>,
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }
            var northAmericaChartCanvas = $("#rating_chart").get(0).getContext("2d");
            var northAmericaChart = new Chart(northAmericaChartCanvas, {
                type: 'doughnut',
                data: areaData,
                options: areaOptions,
                plugins: northAmericaChartPlugins
            });
            document.getElementById('rating_legends').innerHTML = northAmericaChart.generateLegend();
        }

        function chartRate() {
            var ctx = document.getElementById('rating_chart').getContext('2d');
            var data = {
                labels: [<?php foreach ($rating['dataset'] as $row) {
                                echo '"' . $row['summary'] . '",';
                            } ?>],
                dataset: [{
                    data: [<?php foreach ($rating['dataset'] as $row) {
                                echo '"' . $row['jumlah'] . '",';
                            } ?>],
                    backgroundColor: ['', '']
                }]
            };

            var piechart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                }
            })
        }
    </script>