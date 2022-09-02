<?php

$this->load->view('frontend/parts/header');
$this->load->view('frontend/parts/navbar');

?>

<main>
    <!--? slider Area Start-->
    <div id="home" class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="hero__caption">
                                <h1>Shopee <span>Express</span> Pancoran</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Shopee Express HUB Pancoran berada pada Jl. Pengadegan Timur II Pancoran, Jakarta Selatan, Jakarta 12770. Shopee Express HUB Pancoran berinovasi untuk membuat sebuah quesioner untuk meningkatkan pelayanan kepada pelanggan agar menjadi lebih baik.</p>
                            </div>
                            <!--Hero form -->
                            <!-- <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Your Tracking ID">
                                </div>
                                <div class="search-form">
                                    <a href="#">Track & Trace</a>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--? our info Start -->
    <div id="about" class="our-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="info-caption">
                            <p>Customer Service Shopee Express</p>
                            <span>0800-1500-702</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-clock"></span>
                        </div>
                        <div class="info-caption">
                            <p>Everyday OPEN</p>
                            <span>Mon - Sun 24 Jam</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-place"></span>
                        </div>
                        <div class="info-caption">
                            <p>Jl. Pengadegan Timur II</p>
                            <span>Pancoran, Jakarta Selatan, Jakarta 12770</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our info End -->

    <!--? About Area Start -->
    <div class="about-low-area padding-bottom ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span>Shopee Xpress HUB Pancoran</span>
                            <h2>Safe Logistic Solutions That Saves our Valuable Time</h2>
                        </div>
                        <p>Shopee Express adalah jasa kirim Shopee khusus untuk Penjual terpilih, di mana pengiriman akan ditangani langsung oleh Shopee. Shopee Express HUB Pancoran berada pada Jl. Pengadegan Timur II, Pancoran, Jakarta Selatan.</p>
                        <p>Shopee Express menyediakan empat jenis layanan, yaitu Shopee Express Standard, Shopee Express Sameday, Shopee Express Instant, dan Shopee Express Hemat.</p>
                        <!-- <a href="about.html" class="btn">More About Us</a> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img">
                            <img src="<?= base_url('assets/frontend'); ?>/img/gallery/about3.png" alt="">
                        </div>
                        <!-- <div class="about-back-img d-none d-lg-block">
                            <img src="<?= base_url('assets/frontend'); ?>/img/gallery/about3.png" alt="">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!--? contact-form start -->
    <section id="rating" class="contact-form-area section-bg  pt-115 pb-120 fix" data-background="<?= base_url('assets/frontend'); ?>/img/gallery/section_bg03.jpg">
        <div class="container">
            <div class="row justify-content-end">
                <!-- Contact wrapper -->
                <div class="col-xl-8 col-lg-9">
                    <div class="contact-form-wrapper">
                        <!-- From tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-50">
                                    <span>Shopee Express HUB Pancoran Rating</span>
                                    <h2>Penilaian Kepuasan Pelanggan Shopee Express HUB Pancoran</h2>
                                    <p>Untuk meningkatkan pelayanan dari Shopee Express HUB Pancoran, kami menyediakan quesioner penilaian kepuasan pelanggan agar kami bisa mengevaluasi kekurangan dan memaksimalkan performa pelayanan agar menjadi lebih baik.</p>
                                </div>
                            </div>
                        </div>
                        <!-- form -->
                        <form action="#" class="contact-form">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input id="input_nama" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input id="input_usia" type="number" placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <input id="input_email" type="text" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a href="#quesioner" id="next_form" type="button" class="submit-btn" style="text-align : center">Next</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--? About Area Start -->
    <div id="quesioner" class="contact-form-area padding-bottom ">
        <div class="container">
            <!-- Quesioner Start -->
            <div class="col-lg-16 pt-70">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h4 mb-0 text-gray-800">Quesioner Kepuasan</h1>
                </div>

                <form id="frm_rating">
                    <input type="hidden" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    <input type="hidden" class="form-control" id="usia" name="usia">
                    <input type="hidden" class="form-control" id="email" name="email">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="tbl_dashboard" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Pertanyaan</th>
                                    <th style="text-align: center;">Sangat Tidak Puas</th>
                                    <th style="text-align: center;">Tidak Puas</th>
                                    <th style="text-align: center;">Cukup Puas</th>
                                    <th style="text-align: center;">Puas</th>
                                    <th style="text-align: center;">Sangat Puas</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($pertanyaan as $row) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $no; ?>.</td>
                                        <td style="text-align: left;"><?= $row['pertanyaan'] ?></td>
                                        <td style="text-align: center;">
                                            <input value="1" type="radio" name="nilai_aspek[<?= $row['id_pertanyaan'] ?>]" id="stp_<?= $row['id_pertanyaan'] ?>" data-id="<?= $row['id_pertanyaan'] ?>">
                                        </td>
                                        <td style="text-align: center;">
                                            <input value="2" type="radio" name="nilai_aspek[<?= $row['id_pertanyaan'] ?>]" id="tp_<?= $row['id_pertanyaan'] ?>" data-id="<?= $row['id_pertanyaan'] ?>">
                                        </td>
                                        <td style="text-align: center;">
                                            <input value="3" type="radio" name="nilai_aspek[<?= $row['id_pertanyaan'] ?>]" id="cp_<?= $row['id_pertanyaan'] ?>" data-id="<?= $row['id_pertanyaan'] ?>">
                                        </td>
                                        <td style="text-align: center;">
                                            <input value="4" type="radio" name="nilai_aspek[<?= $row['id_pertanyaan'] ?>]" id="p_<?= $row['id_pertanyaan'] ?>" data-id="<?= $row['id_pertanyaan'] ?>">
                                        </td>
                                        <td style="text-align: center;">
                                            <input value="5" type="radio" name="nilai_aspek[<?= $row['id_pertanyaan'] ?>]" id="sp_<?= $row['id_pertanyaan'] ?>" data-id="<?= $row['id_pertanyaan'] ?>">
                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" class="form-control" id="avg" name="avg">
                    <input type="hidden" class="form-control" id="kesimpulan" name="kesimpulan">
                    <fieldset>
                        <legend>Apakah sering terjadi kerusakan pada paket dalam pengiriman kami?</legend>
                        <div class="col-sm-6">
                            <label style="font-size: 19px;">
                                <input type="radio" id="kerusakan" name="kerusakan" value="1" />Iya
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label style="font-size: 19px;">
                                <input type="radio" id="kerusakan" name="kerusakan" value="0" />Tidak
                            </label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label style="font-size: 24px;" for="feedback">Masukan anda terhadap Shopee Express Hub Pancoran</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                    </div>
                </form>

                <div class="col-12">
                    <button type="button" id="save_form" class="submit-btn">Send</button>
                </div>

            </div>
            <!-- Quesioner End -->
        </div>
    </div>
    <!-- About Area End -->
</main>

<?php

$this->load->view('frontend/parts/footer');


?>

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {
        $("#quesioner").hide();
    });

    $('#next_form').click(function() {
        var nama_lengkap = $('#input_nama').val();
        var usia = $('#input_usia').val();
        var email = $('#input_email').val();

        if (nama_lengkap != '' && usia != '' && email != '') {
            $('#nama_lengkap').val(nama_lengkap);
            $('#usia').val(usia);
            $('#email').val(email);

            $("#quesioner").show();

            $('#input_nama').attr('readonly', 'true');
            $('#input_usia').attr('readonly', 'true');
            $('#input_email').attr('readonly', 'true');
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Form Masih Kosong'
            });
        }
        getNilaiAspek();

        // $('html, body').animate({
        //     scrollTop: $("#quesioner").offset().top
        // }, 1000);
    });

    function getNilaiAspek() {
        $("input[type=radio]").change(function() {
            var total_nilai = 0;
            var avg = 0;
            var avg_nilai = 0;
            var field_val = $('input[name*="nilai_aspek"]:checked');
            var checked_length = field_val.length;
            var sumary = "";
            var id_summary = 0;

            $.each(field_val, function(i, j) {
                var nilai = $(j).val();

                if (nilai) {
                    total_nilai += parseInt(nilai);
                }
            });
            avg = total_nilai / checked_length;
            avg_nilai = avg.toFixed(1);

            $('#avg').val(avg_nilai);


            if (avg_nilai >= 1 && avg_nilai <= 1.5) {
                sumary = "Sangat Tidak Puas";
            } else if (avg_nilai >= 1.5 && avg_nilai <= 2.5) {
                sumary = "Tidak Puas";
            } else if (avg_nilai >= 2.5 && avg_nilai <= 3.5) {
                sumary = "Cukup Puas";
            } else if (avg_nilai >= 3.5 && avg_nilai <= 4.5) {
                sumary = "Puas";
            } else if (avg_nilai >= 4.5) {
                sumary = "Sangat Puas";
            }

            $('#kesimpulan').val(sumary);

            // $('#id_tm_kesimpulan').val(id_summary).change;
        });
    }

    $('#save_form').click(function() {
        var link_Save = '<?= base_url() . 'save_quesioner' ?>';

        var form = $('#frm_rating');
        var data = form.serializeArray();
        console.log(data);
        var formHtml = form[0];
        var NewData = new FormData(formHtml);

        var feedback = $('#feedback').val();

        var is_valid = false;

        if (feedback != '') {
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
                        title: 'Terima Kasih',
                        text: response.msg,
                    });
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
                text: 'Pastikan Form Terisi Semua',
            });
        }

    });
</script>