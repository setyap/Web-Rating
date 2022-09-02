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
                        <h4 class="font-weight-bold mb-0">Report</h4>
                    </div>
                    <!-- <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                            <i class="ti-clipboard btn-icon-prepend"></i>Report
                        </button>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Repondent</p>
                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $rating30['total30'] ?></h3>
                        </div>
                        <p class="mb-0 mt-2 text-danger">(30 days)</p>
                    </div>
                </div>
            </div>

            <?php
            foreach ($rating30['rate30'] as $data) : ?>
                <div class="col-md-2 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left"><?= $data['summary'] ?></p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $data['jumlah'] ?></h3>
                            </div>
                            <p class="mb-0 mt-2 text-danger"><?= round($data['jumlah'] / $rating30['total30'] * 100, 2) ?>%<span class="text-black ml-1"><small>(30 days)</small></span></p>
                        </div>
                    </div>
                </div>
            <?php
            endforeach; ?>

        </div>

        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">1 Years Rating</p>
                        <p class="text-muted font-weight-light">Grafik penilaian pelayanan terhadap ShopeeXpress Hub Pancoran dalam 1 tahun kebelakang.</p>
                        <div id="rate_legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="rate_chart"></canvas>
                    </div>

                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card border-bottom-0">
                    <div class="card-body pb-0">
                        <p class="card-title">Rating Last 30 Days</p>
                        <canvas id="rating_chart"></canvas>
                        <div id="rating_legends" class="mb-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 grid-margin">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <?php
                            foreach ($damage['damage30'] as $data) : ?>
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-title text-md-center text-xl-left"><?= $data['kerusakan'] ?></p>
                                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $data['jumlah'] ?></h3>
                                            </div>
                                            <p class="mb-0 mt-2 text-danger"><?= round($data['jumlah'] / $rating30['total30'] * 100, 2) ?>%<span class="text-black ml-1"><small>(30 days)</small></span></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-bottom-0">
                            <div class="card-body pb-0">
                                <p class="card-title">Tingkat Keamanan paket dalam 30 hari</p>
                                <canvas id="damage_chart"></canvas>
                                <div id="damage_legends" class="mb-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Feedback</p>
                        <p class="text-muted font-weight-light">Masukan dari customer diharapkan bisa meningkatkan kualitas kami dalam memberi pelayanan kepada anda.</p>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height: 400px;">
                            <div class="table-responsive mb-3 mb-md-0">
                                <table class="table table-borderless report-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th style="text-align: center;">Feedback</th>
                                            <th style="text-align: center;">Kerusakan Paket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($feedback as $data) : ?>
                                            <tr>
                                                <td class="text-muted"><?= $data['nm_responden'] ?></td>
                                                <td class="w-100 px-0" style="text-align: center;">
                                                    <?= $data['feedback'] ?>
                                                </td>
                                                <td class="w-100 px-0" style="text-align: center;">
                                                    <?= $data['kerusakan'] ?>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>

                                </table>
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
            doughnutChartRate();
            barChartRate();
            doughnutChartDamage();
        });

        function doughnutChartRate() {
            var areaData = {
                labels: [<?php foreach ($rating30['rate30'] as $row) {
                                echo '"' . $row['summary'] . '",';
                            } ?>],
                datasets: [{
                    data: [<?php foreach ($rating30['rate30'] as $row) {
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
                                foreach ($rating30["rate30"] as $data) : ?>';

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

                    var text = <?= $rating30['avg30'] ?>,
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
        };

        function barChartRate() {
            var SalesChartCanvas = $("#rate_chart").get(0).getContext("2d");
            var SalesChart = new Chart(SalesChartCanvas, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($rating30['rateyear'] as $row) {
                                    $bulan = substr($row['bulan'], 0, 3);
                                    echo '"' . $bulan . '-' . $row['tahun'] . '",';
                                } ?>],
                    datasets: [{
                        data: [<?php foreach ($rating30['rateyear'] as $row) {
                                    echo '"' . $row['rating'] . '",';
                                } ?>],
                        backgroundColor: '#8EB0FF'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 20,
                            bottom: 0
                        }
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                display: false,
                                min: 0,
                                max: 5
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            ticks: {
                                beginAtZero: true,
                                fontColor: "#9fa0a2"
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                                display: false
                            },
                            barPercentage: 1
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }
                },
            });
            // document.getElementById('rate_legend').innerHTML = SalesChart.generateLegend();
        };

        function doughnutChartDamage() {
            var areaData = {
                labels: [<?php foreach ($damage['damage30'] as $row) {
                                echo '"' . $row['kerusakan'] . '",';
                            } ?>],
                datasets: [{
                    data: [<?php foreach ($damage['damage30'] as $row) {
                                echo '"' . $row['jumlah'] . '",';
                            } ?>],
                    backgroundColor: [
                        "#ffff00", "#00cc00",
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
                                foreach ($damage["damage30"] as $data) : ?>';

                    text_ += '<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[<?= $no ?>] + '"></div><p class="mb-0"><?= $data["kerusakan"] ?></p></div>';
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

                    var text = <?= $damage["avg30"]  ?>,
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }
            var northAmericaChartCanvas = $("#damage_chart").get(0).getContext("2d");
            var northAmericaChart = new Chart(northAmericaChartCanvas, {
                type: 'doughnut',
                data: areaData,
                options: areaOptions,
                plugins: northAmericaChartPlugins
            });
            document.getElementById('damage_legends').innerHTML = northAmericaChart.generateLegend();
        };
    </script>