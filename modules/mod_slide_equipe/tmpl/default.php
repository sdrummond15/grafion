<?php $count = count($slide_equipe); ?>

<!--Slide-->

<div id="modslide_equipes">
    <div class="slide_equipes">
        <div>
            <?php
            $parametros = json_decode($module->params);
            echo '<h2>' . $module->title . '</h2>';
            echo '<div class="linha"></div>';
            echo '<p><b>' . $parametros->txtintro . '</b></p>';
            ?>
        </div>
        <div class="slider-wrap">
            <div class="slider">
                <ul>
                    <?php
                    foreach ($slide_equipe as $slide_equipe) {
                        $fotoColor = $slide_equipe->photo;
                        $posImg = strripos($fotoColor, '/');
                        $caminho = substr($fotoColor, 0, $posImg + 1);
                        $img = substr($fotoColor, $posImg + 1);
                        $fotoColor = $caminho . substr($img, 0, -4) . '_hover.png';
                        $fotoPb = $slide_equipe->photo;

                        echo '<li>';
                        echo '<div>';
                        echo '<div class="slide_equipe">';
                        echo '<div class="fotoColor" style="background: url(' . JUri::base() . $fotoColor . ') no-repeat; ">';
                        echo '</div>';
                        echo '<div class="fotoPb" style="background: url(' . JUri::base() . $fotoPb . ') no-repeat; ">';
                        echo '</div>';
                        echo '</div>';
                        echo '<h1>' . $slide_equipe->name . '</h1>';
                        echo '<div class="desc"><p>' . $slide_equipe->obs . '</p></div>';
                        echo '</div>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
            <a href="#" class="slider-arrow sa-left">
                <i class="fa fa-chevron-left fa-1x" aria-hidden="true"></i>
            </a>
            <a href="#" class="slider-arrow sa-right">
                <i class="fa fa-chevron-right fa-1x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<script src="./modules/mod_slide_equipe/assets/js/jquery.lbslider.js"></script>
<script>
    jQuery(window).load(function() {
        var desc = jQuery("#modslide_equipes ul li > div > div.desc");
        var tam = 0;
        desc.each(function() {
            var tamLi = jQuery(this).innerHeight();
            if (tamLi > tam) {
                tam = tamLi;
            }
        });
        jQuery("#modslide_equipes ul li  > div > div.desc").css('min-height', tam - 100);
    });

    jQuery('.slider').lbSlider({
        leftBtn: '.sa-left',
        rightBtn: '.sa-right',
        visible: 2,
        autoPlay: true,
        autoPlayDelay: 3
    });

    jQuery(function() {
        jQuery(window).on('resize', function() {
            var largura = jQuery(window).width();
            if (largura > 768) {
                jQuery('.slider').mouseover(function() {
                    jQuery('.slider-arrow').css('opacity', '1');
                });
                jQuery('.slider').mouseout(function() {
                    jQuery('.slider-arrow').css('opacity', '0');
                });
                jQuery('.slider-arrow').mouseover(function() {
                    jQuery('.slider-arrow').css('opacity', '1');
                });
                jQuery('.slider-arrow').mouseout(function() {
                    jQuery('.slider-arrow').css('opacity', '0');
                });
            }
        }).trigger('resize');
    });

    jQuery(function() {
        jQuery(window).on('resize', function() {
            var largura = jQuery(window).width();
            var qtdMembros = "<?php echo $count; ?>";

            if ((largura > 660) && (qtdMembros <= 4)) {
                jQuery('.slider-arrow').hide();
                jQuery('.slider ul').addClass('inactive');
            } else {
                jQuery('.slider-arrow').show();
                jQuery('.slider ul').removeClass('inactive');
            }

            console.log(largura);
            if (largura > 660) {
                jQuery('#modslide_equipes .slider').css('width', 600);
            }

            if (largura <= 660 && largura > 0) {
                jQuery('#modslide_equipes .slider').css('width', 300);
            }

            var tamFoto = jQuery('#modslide_equipes .slider .slide_equipe').width();
            jQuery('#modslide_equipes .slider .slide_equipe').css('height', tamFoto);

            var tamFotoStatic = jQuery('#modslide_equipes_static .slider_static .slide_equipe_static').width();
            jQuery('#modslide_equipes_static .slider_static .slide_equipe_static').css('height', tamFotoStatic);

        }).trigger('resize');
    });

    jQuery(window).load(function() {
        jQuery(window).on('resize', function() {
            var liH = jQuery('.slider ul li').height();
            jQuery('.inactive').css('max-height', liH);
        }).trigger('resize');
    });
</script>