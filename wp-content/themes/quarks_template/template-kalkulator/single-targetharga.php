<?php
/*
Template Name: Kalkulator Target Harga
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
        <div class="col-sm-12 col-md-6 mb-2">
            <form>
                <div class="row batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-curr-price-target" class="price-target form-control text-start inputmask" value="21000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-curr-price-target">Target Rata-Rata Harga</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-beli" class="beli form-control text-start inputmask" value="28000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-beli">Harga Pembelian</label>

                    </div>
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-unit" class="unit form-control text-start inputmask" value="50" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-unit">Jumlah Unit</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-12 ps-0 form-floating">
                        <input id="floating-curr-asset" class="current-price form-control text-start inputmask" value="20000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-curr-asset">Harga Aset Sekarang</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 ps-0">
                        <button type="button" class="calculate-btn btn btn-primary w-100">Hitung</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-12 col-md-6 border p-3 d-flex align-items-center justify-content-center ">
            <div>
                <p class="text-center m-0"> Jumlah Unit yang diperlukan:</p>
                <h2 class="final-result text-center mb-4">Rp.0</h2>
                <p class="text-center m-0"> Jumlah Biaya:</p>
                <h2 class="final-cost-result text-center">Rp.0</h2>
            </div>
        </div>
        <div class="mt-3"></div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {

                $('.calculate-btn').click(function() {
                    var a1 = Number($('.beli').inputmask('unmaskedvalue'));
                    var b1 = Number($('.unit').inputmask('unmaskedvalue'));
                    var a2 = Number($('.price-target').inputmask('unmaskedvalue'));
                    var a3 = Number($('.current-price').inputmask('unmaskedvalue'));


                    final = Math.ceil(((a1 * b1) - (a2 * b1)) / (a2 - a3));

                    $('.final-result').text((isNaN(final) ? 0 : final.toLocaleString()));
                    final_buy = 'Rp.' + String((final * a3).toLocaleString());
                    $('.final-cost-result').text((isNaN(final) ? 0 : final_buy));

                })
            });
        </script>

        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>

<?php get_footer(); ?>