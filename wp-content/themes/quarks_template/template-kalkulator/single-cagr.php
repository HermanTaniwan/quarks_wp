<?php
/*
Template Name: Kalkulator CAGR
Template Post Type: post
*/
?>

<?php get_header(); ?>
<header class="content-header mt-3 mt-md-5">
    <div class="meta mb-3">
        <small class="badge bg-secondary"><?= get_the_date() ?></small>
        <h1><?php the_title(); ?></h1>
    </div>
</header>
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <form>
                <div class="row batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-start" class="start form-control text-start inputmask" value="100000" placeholder="Nilai Awal Investasi" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-start">Nilai Awal</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-end" class="end form-control text-start inputmask" value="500000" placeholder="Nilai Akhir Investasi" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-end">Nilai Akhir</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-period" class="period form-control text-start inputmask" value="3" placeholder="Lama Investasi" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-period">Lama Investasi (Tahun)</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 ps-0">
                        <button type="button" class="calculate-btn btn btn-primary w-100">Hitung</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 border p-3 d-flex align-items-center justify-content-center ">
            <div>
                <p class="text-center m-0"> CAGR:</p>
                <h1 class="cagr-result text-center">0%</h1>
            </div>
        </div>
        <div class="mt-3"></div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {

                $('.calculate-btn').click(function() {

                    var period = Number($('.period').inputmask('unmaskedvalue'));
                    var start = Number($('.start').inputmask('unmaskedvalue'));
                    var end = Number($('.end').inputmask('unmaskedvalue'));
                    var result = 100 * (Math.pow((end / start), 1 / period) - 1);
                    $('.cagr-result').text((isNaN(result) ? 0 : result.toLocaleString("id-ID", {
                        maximumFractionDigits: 2
                    }) + ' %'));

                })
            });
        </script>

        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>

<?php get_footer(); ?>