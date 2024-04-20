<?php
/*
Template Name: Kalkulator Bebas Finansial
Template Post Type: post
*/
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<?php get_header(); ?>

<body data-bs-theme="dark">

    <?php include get_template_directory() . '/sections/navigation.php'; ?>

    <div class="inline-block" style="height: 50px;"></div>

    <div class="container-fluid">

        <div class="wrapper row">
            <?php
            get_template_part('template-parts/content', 'sidenav_desktop');
            ?>

            <main class="col-md-9 ms-sm-auto col-lg-6 px-md-4 workspace resource-area">

                <?php
                get_template_part('template-parts/content', 'sidenav_mobile');
                ?>
                <!----













---->
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
                                        <input id="floating-year-expense" class="year-expense form-control text-start inputmask" value="300000000" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                                        <label for="floating-year-expense">Pengeluaran Tahunan</label>
                                    </div>
                                </div>
                                <div class="row mt-2 batch">
                                    <div class="col-12 ps-0 form-floating">
                                        <input id="floating-period" class="period form-control text-start inputmask" value="20" placeholder="Periode Investasi (Tahun)" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                                        <label for="floating-period">Periode Investasi (Tahun) </label>
                                    </div>
                                </div>
                                <div class="row mt-2 batch">
                                    <div class="col-12 ps-0 form-floating">
                                        <input id="floating-inflasi" class="inflasi form-control text-start inputmask" value="5" placeholder="Inflasi (%)" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 2, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                                        <label for="floating-inflasi">Inflasi (%) </label>
                                    </div>
                                </div>
                                <div class="row mt-2 batch">
                                    <div class="col-12 ps-0 form-floating">
                                        <input id="floating-interest" class="interest form-control text-start inputmask" value="7" placeholder="Bunga per Tahun (%)" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 2, 'digitsOptional': false, 'suffix': '', 'placeholder': '0'" inputmode="numeric" id="currency">
                                        <label for="floating-interest">Bunga per Tahun (%)</label>
                                    </div>
                                </div>
                                <div class="row mt-2 batch">
                                    <div class="col-12 ps-0 form-floating">
                                        <input id="floating-curr-asset" class="curr-asset form-control text-start inputmask" value="3000000000" placeholder="Aset Investasi Sekarang" data-inputmask="'alias': 'numeric', 'groupSeparator': '.', 'digits': 0, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" inputmode="numeric" id="currency">
                                        <label for="floating-curr-asset">Aset Investasi Sekarang</label>
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
                                <p class="text-center m-0 mb-4"> Dana tidak akan habis bila ditarik 4%/Tahun jika rutin menabung selama <span class="year-result">20</span> Tahun ke depan</p>
                                <p class="text-center m-0"> Nabung Rutin Tiap Tahun:</p>
                                <h2 class="final-interest text-center mb-4">Rp.0</h2>
                                <p class="text-center m-0"> Nabung Rutin Tiap Bulan:</p>
                                <h2 class="final-result text-center">Rp.0</h2>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <script>
                            function PMT(ir, np, pv, fv, type) {
                                /*
                                 * ir   - interest rate per month
                                 * np   - number of periods (months)
                                 * pv   - present value
                                 * fv   - future value
                                 * type - when the payments are due:
                                 *        0: end of the period, e.g. end of month (default)
                                 *        1: beginning of period
                                 */
                                var pmt, pvif;

                                fv || (fv = 0);
                                type || (type = 0);

                                if (ir === 0)
                                    return -(pv + fv) / np;

                                pvif = Math.pow(1 + ir, np);
                                pmt = -ir * (pv * pvif + fv) / (pvif - 1);

                                if (type === 1)
                                    pmt /= (1 + ir);

                                return pmt;
                            }

                            window.addEventListener('DOMContentLoaded', function() {
                                console.log(PMT(0.07, 20, -3000000000, 19899000000, 0) / -12)
                                $('.calculate-btn').click(function() {
                                    var inflasi = Number($('.inflasi').inputmask('unmaskedvalue')) / 100;
                                    var interest = Number($('.interest').inputmask('unmaskedvalue')) / 100;
                                    var yearExp = Number($('.year-expense').inputmask('unmaskedvalue'));
                                    var period = Number($('.period').inputmask('unmaskedvalue'));
                                    var currAsset = Number($('.curr-asset').inputmask('unmaskedvalue'));
                                    var fv = yearExp * Math.pow((1 + inflasi), period) * 25;
                                    var type = 0;

                                    console.log(interest + ' ' + period + ' ' + currAsset + ' ' + fv);

                                    var yearSave = -PMT(interest, period, -currAsset, fv, 0)
                                    var monthSave = yearSave / 12;

                                    $('.final-interest').text('Rp. ' + (isNaN(yearSave) ? 0 : yearSave.toLocaleString("id-ID", {
                                        maximumFractionDigits: 0
                                    })));
                                    $('.final-result').text('Rp. ' + (isNaN(monthSave) ? 0 : monthSave.toLocaleString("id-ID", {
                                        maximumFractionDigits: 0
                                    })));
                                    $('.year-result').text(period);

                                })
                            });
                        </script>

                        <?php get_template_part('template-parts/content', 'default'); ?>
                    </div>
                </div>

                <!----













---->

            </main>

            <div class="col-lg-2"></div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>

</html>