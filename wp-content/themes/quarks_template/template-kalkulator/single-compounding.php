<?php
/*
Template Name: Kalkulator Compounding
Template Post Type: post
*/
?>

<?php get_header(); ?>
<header class="content-header mt-3 mt-md-5">
    <div class="meta mb-3">
        <h1><?php the_title(); ?></h1>
    </div>
</header>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <form>
                <div class="row batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-final-invest" class="principal form-control text-start inputmask" value="50000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-final-invest">Nilai Awal Investasi</label>
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
                        <input id="floating-period" class="period form-control text-start inputmask" value="3" placeholder="Lama Investasi" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-period">Lama Investasi (Tahun)</label>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-12 ps-0">
                        <button type="button" class="calculate-btn btn btn-primary w-100">Hitung</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-6 border p-3 d-flex align-items-center justify-content-center ">
            <div>
                <p class="text-center m-0"> Bunga Diterima:</p>
                <h2 class="final-interest text-center mb-4">Rp.0</h2>
                <p class="text-center m-0"> Nilai Akhir:</p>
                <h2 class="final-result text-center">Rp.0</h2>
            </div>
        </div>
        <div class="mt-3"></div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {

                $('.calculate-btn').click(function() {
                    var principal = Number($('.principal').inputmask('unmaskedvalue'));
                    var interest = Number($('.interest').inputmask('unmaskedvalue'));
                    var period = Number($('.period').inputmask('unmaskedvalue'));

                    var final_interest = principal * Math.pow((1 + (interest / 100)), period) - principal;
                    var final = Number(principal) + final_interest;

                    $('.final-interest').text('Rp.' + (isNaN(final_interest) ? 0 : final_interest.toLocaleString()));
                    $('.final-result').text('Rp.' + (isNaN(final) ? 0 : final.toLocaleString()));

                })
            });
        </script>

        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>

<?php get_footer(); ?>