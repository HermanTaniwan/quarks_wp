<?php
/*
Template Name: Kalkulator Averaging up/down
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
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-beli-1" class="beli form-control text-start inputmask" value="100000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-beli-1">Harga Beli #1</label>
                    </div>
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-unit-1" class="unit form-control text-start inputmask" value="100" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-unit-1">Unit #1</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-beli-2" class="beli form-control text-start inputmask" value="50000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-beli-2">Harga Beli #2</label>
                    </div>
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-unit-2" class="unit form-control text-start inputmask" value="50" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-unit-2">Unit #2</label>
                    </div>
                </div>
                <div class="row mt-2 batch">
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-beli-3" class="beli form-control text-start inputmask" value="25000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-beli-3">Harga Beli #3</label>
                    </div>
                    <div class="col-6 ps-0 form-floating">
                        <input id="floating-unit-3" class="unit form-control text-start inputmask" value="20" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                        <label for="floating-unit-3">Unit #3</label>
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
                <p class="text-center m-0"> Nilai Rata Rata Kamu:</p>
                <h1 class="final-result text-center">Rp.0</h1>
            </div>
        </div>

        <script>
            window.addEventListener('DOMContentLoaded', function() {

                $('.calculate-btn').click(function() {
                    var unit = 0;
                    var sum = 0;
                    $('.batch').each(function(i, obj) {
                        unitVal = $(this).find('.unit').inputmask('unmaskedvalue');
                        priceVal = $(this).find('.beli').inputmask('unmaskedvalue');
                        if (unitVal != '' && priceVal != '') {
                            unit += Number(unitVal);
                            sum += Number(priceVal * unitVal);
                        }
                    });

                    final = Math.ceil(sum / unit);

                    $('.final-result').text('Rp.' + (isNaN(final) ? 0 : final.toLocaleString()));

                })
            });
        </script>
        <div class="mt-3"></div>
        <?php get_template_part('template-parts/content', 'default'); ?>
    </div>
</div>

<?php get_footer(); ?>