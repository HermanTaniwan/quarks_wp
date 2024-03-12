<?php
/*
Template Name: Kalkulator Lama Investasi
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
                        <input id="floating-final-invest" class="final-invest form-control text-start inputmask" value="100000" placeholder="Nilai Akhir Investasi" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-final-invest">Nilai Akhir Investasi</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-interest" class="interest form-control text-start inputmask" value="5" placeholder="Bunga per Tahun (%)" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 2, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-interest">Bunga per Tahun (%)</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-final-invest" class="principal form-control text-start inputmask" value="50000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-final-invest">Nilai Awal Investasi</label>
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
                <p class="text-center m-0"> Lama Waktu:</p>
                <h1 class="period-result text-center">0 Tahun</h1>
            </div>
        </div>
        <div class="mt-3"></div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {

                $('.calculate-btn').click(function() {
                    var principal = Number($('.principal').inputmask('unmaskedvalue'));
                    var interest = Number($('.interest').inputmask('unmaskedvalue'));
                    var final = Number($('.final-invest').inputmask('unmaskedvalue'));

                    var finalperiod = Math.log10(final / principal) / Math.log10(1 + (interest / 100));

                    $('.period-result').text((isNaN(final) ? 0 : finalperiod.toLocaleString(undefined, {
                        maximumFractionDigits: 2
                    })) + ' Tahun');

                })
            });
        </script>

        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>

<?php get_footer(); ?>