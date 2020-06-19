<?php
/**
 * @subpackage    Cirrus Green v1.6 HM02J
 * @copyright    Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$LeftMenuOn = ($this->countModules('position-5') or $this->countModules('position-7'));
$RightMenuOn = ($this->countModules('position-6') or $this->countModules('position-8'));
$TopNavOn = ($this->countModules('position-13'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');
$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';
$logo = $this->params->get('logo', $logopath);
$logoimage = $this->params->get('logoimage');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');
?>

<?php
$app = JFactory::getApplication();
$menu = $app->getMenu();
$lang = JFactory::getLanguage();
if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
    $home = 1;
    $backhome = 'class="home-article"';
} else {
    $home = 0;
    $backhome = '';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"
      lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <jdoc:include type="head"/>
    <link rel="stylesheet"
          href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/font-awesome.min.css"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/animate.css"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css"
          type="text/css"/>
    <script type="text/javascript"
            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/sfhover.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-24132529-43', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>

<div id="wrapper">

    <!-- TopNav -->
    <?php if ($TopNavOn): ?>
        <?php if ($home == 1) echo '<section id="home">'; ?>
        <div id="topnav_wrap">
            <div id="topnav">
                <jdoc:include type="modules" name="position-13" style="xhtml"/>
            </div>
        </div>
        <?php if ($home == 1) echo '</section>'; ?>
    <?php endif; ?>

    <div id="header_wrap">

        <div id="header">
            <div id="headerint">

                <!-- Logo -->
                <div id="logo">

                    <?php if ($logo && $logoimage == 1): ?>
                        <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>"
                                                                    alt="<?php echo $sitename; ?>"/></a>
                    <?php endif; ?>
                    <?php if (!$logo || $logoimage == 0): ?>

                        <?php if ($sitetitle): ?>
                            <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br/>
                        <?php endif; ?>

                        <?php if ($sitedescription): ?>
                            <div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
                        <?php endif; ?>

                    <?php endif; ?>

                </div>

                <div class="headerMenu">
                    <!-- Search -->
                    <?php if ($this->countModules('position-0')): ?>
                        <div id="search_wrap">
                            <div id="search">
                                <jdoc:include type="modules" name="position-0"/>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="menutop">
                        <div id="topmenu_wrap">
                            <div id="topmenu">
                                <jdoc:include type="modules" name="position-1"/>
                            </div>
                        </div>

                        <div class="gotomenu">
                            <div id="gotomenu">
                                <i class="fa fa-bars smallmenu" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="menuresp">
                            <jdoc:include type="modules" name="position-1"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Breadcrumbs -->
    <?php if ($this->countModules('position-2')): ?>
        <?php if ($home == 1) echo '<section id="portfolio">'; ?>
        <div id="breadcrumbs">
            <jdoc:include type="modules" name="position-2"/>
        </div>
        <?php if ($home == 1) echo '</section>'; ?>
    <?php endif; ?>

    <?php if ($home == 1) echo '<section id="grafion">'; ?>
    <?php if ($this->countModules('position-4')): ?>
        <div id="content-middle">
            <jdoc:include type="modules" name="position-4" style="xhtml"/>
        </div>
    <?php endif; ?>
    <?php if ($home == 1) echo '</section>'; ?>

    <?php if ($home == 1) echo '<section id="equipe">'; ?>
    <?php if ($this->countModules('position-3')): ?>
        <div id="before-content">
            <jdoc:include type="modules" name="position-3" style="xhtml"/>
        </div>
    <?php endif; ?>
    <?php if ($home == 1) echo '</section>'; ?>

    <?php if ($home == 1) echo '<section id="clientes">'; ?>
    <!-- Content/Menu Wrap -->
    <div id="content-menu_wrap_bg">
        <div id="content-menu_wrap">

            <!-- Left Menu -->
            <?php if ($LeftMenuOn): ?>
                <div id="leftmenu">
                    <jdoc:include type="modules" name="position-7" style="xhtml"/>
                    <jdoc:include type="modules" name="position-5" style="xhtml"/>
                </div>
            <?php endif; ?>


            <!-- Contents -->
            <?php if ($LeftMenuOn AND $RightMenuOn):
                $w = 1;
            elseif ($LeftMenuOn OR $RightMenuOn):
                $w = 2;
            else:
                $w = 3;
            endif;
            ?>

            <div id="content-w<?php echo $w; ?>" <?php echo $backhome; ?>>
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
            </div>


            <!-- Right Menu -->
            <?php if ($RightMenuOn): ?>
                <div id="rightmenu">
                    <jdoc:include type="modules" name="position-6" style="xhtml"/>
                    <jdoc:include type="modules" name="position-8" style="xhtml"/>
                </div>
            <?php endif; ?>


        </div>
    </div>
    <?php if ($home == 1) echo '</section>'; ?>

    <?php if ($this->countModules('position-12')): ?>
        <div id="content-bottom">
            <jdoc:include type="modules" name="position-12"/>
        </div>
    <?php endif; ?>

    <!-- Footer -->
    <div id="footer_wrap">
        <div id="footer">
            <jdoc:include type="modules" name="position-14"/>
        </div>
    </div>

    <div id="bottom_wrap">

        <?php if ($home == 1) echo '<section id="contato">'; ?>
        <!-- Banner/Links -->
        <?php if (($this->countModules('position-9')) || ($this->countModules('position-10'))): ?>
            <div id="box_wrap">
                <div id="box_placeholder">
                    <div id="box1">
                        <jdoc:include type="modules" name="position-9" style="xhtml"/>
                    </div>
                    <div id="box2">
                        <jdoc:include type="modules" name="position-10" style="xhtml"/>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->countModules('position-11')): ?>
            <div class="bottom-end">
                <div id="box3">
                    <jdoc:include type="modules" name="position-11" style="xhtml"/>
                </div>
            </div>
        <?php endif; ?>
        <div id="copyright">
            <div class="copyrightint">
                <p>
                    Copyright &copy; <?php echo $sitename; ?> <?php echo date('Y'); ?> | Todos os direitos reservados
                </p>
                <p>
                    <a class="sd" href="http://www.sdrummond.com.br" title="Sdrummond Tecnologia">
                        Desenvolvido por Sdrummond
                    </a>
                </p>
            </div>
        </div>
        <div id="animacao-contato"></div>
        <?php if ($home == 1) echo '</section>'; ?>


    </div>

</div>


<script>

    jQuery.noConflict();

    jQuery(window).load(function () {

        /**** SCROLL MENU SLOW****/
        jQuery('#topmenu a').click(function () {
            var alvo = jQuery(this).attr('href').split('#').pop();
            jQuery('html, body').animate({scrollTop: jQuery('#' + alvo).offset().top}, 500);
            return false;
        });
        /**** FIM SCROLL MENU SLOW ****/

        /**** SCROLL MENU SLOW****/
        jQuery('.custom-banner-principal .grafion > div.bounce a').click(function () {
            jQuery('html, body').animate({scrollTop: jQuery('#portfolio').offset().top}, 500);
            return false;
        });
        /**** FIM SCROLL MENU SLOW ****/

        jQuery(window).on('resize', function () {

            var larguraTela = jQuery(window).width();

            if (larguraTela > 1200) {

                <?php if ($home == 1): ?>
                /**** EFEITO PARA CADA SEÇÃO AO ROLAR ****/
                var sectionPortfolio = jQuery('#portfolio').offset().top + 180;
                var sectionEstudio = jQuery('#grafion').offset().top + 180;
                var sectionEquipe = jQuery('#equipe').offset().top + 180;
                var sectionClientes = jQuery('#clientes').offset().top + 180;
                var sectionContato = jQuery('#contato').offset().top + 180;
                var topLoadPage = jQuery(this).scrollTop();

                /***** ADICIONANDO ANIMAÇÃO A CADA TITULO ACIMA DO TOPO DA HOME *****/
                if (topLoadPage >= sectionPortfolio) {
                    jQuery('#modportfolio .projetos .titulo').addClass('animated slideInDown');
                }
                if (topLoadPage >= sectionEstudio) {
                    jQuery('#content-middle .moduletable-estudio .custom-estudio h2').addClass('animated slideInDown');
                }
                if (topLoadPage >= sectionEquipe) {
                    jQuery('#before-content #modslide_equipes .slide_equipes h2').addClass('animated slideInDown');
                }
                if (topLoadPage >= sectionClientes) {
                    jQuery('#content-menu_wrap .clientes h2').addClass('animated slideInDown');
                }
                if (topLoadPage >= sectionContato) {
                    jQuery('#box_wrap .moduletable-contato h3').addClass('animated slideInDown');
                }
                /***** FIM ADICIONANDO ANIMAÇÃO A CADA TITULO DA HOME *****/

                jQuery(document).on('scroll', function () {
                    var scrollPage = jQuery(this).scrollTop() + jQuery(window).height();

                    /***** ADICIONANDO ANIMAÇÃO A CADA TITULO DA HOME *****/
                    if (scrollPage >= sectionPortfolio) {
                        jQuery('#modportfolio .projetos .titulo').addClass('animated slideInDown');
                    }
                    if (scrollPage >= sectionEstudio) {
                        jQuery('#content-middle .moduletable-estudio .custom-estudio h2').addClass('animated slideInDown');
                    }
                    if (scrollPage >= sectionEquipe) {
                        jQuery('#before-content #modslide_equipes .slide_equipes h2').addClass('animated slideInDown');
                    }
                    if (scrollPage >= sectionClientes) {
                        jQuery('#content-menu_wrap .clientes h2').addClass('animated slideInDown');
                    }
                    if (scrollPage >= sectionContato) {
                        jQuery('#box_wrap .moduletable-contato h3').addClass('animated slideInDown');
                    }
                    /***** FIM ADICIONANDO ANIMAÇÃO A CADA TITULO DA HOME *****/

                });
                <?php endif;?>

            }

            var topoSeta = 0;
            if (larguraTela < 1200) {
                topoSeta = 300;
            }
            jQuery(document).on('scroll', function () {
                var scrollPage = jQuery(this).scrollTop() + jQuery(window).height();

                /****** SETA INDICADORA APARECE E DESAPARECE *****/
                if (jQuery(this).scrollTop() > topoSeta) {
                    jQuery('.custom-banner-principal .grafion > div.arrow').css('transition', 'linear 100ms');
                    jQuery('.custom-banner-principal .grafion > div.arrow').css('opacity', 0);
                } else {
                    jQuery('.custom-banner-principal .grafion > div.arrow').css('transition', 'linear 100ms');
                    jQuery('.custom-banner-principal .grafion > div.arrow').css('opacity', 1);
                }
                /****** FIM SETA INDICADORA APARECE E DESAPARECE *****/
            });


        }).trigger('resize');
    });

    jQuery(window).load(function () {

        var number = Math.round(Math.random() * 100000) + 1;
        var img_animacao_contato = "<?php echo JUri::base();?>/images/animacao-contato.gif?" + number;
        var img_animacao_estudio = "<?php echo JUri::base();?>/images/animacao-estudio.gif?" + number;

        jQuery(window).on('resize', function () {

            var larguraTela = jQuery(window).width();

            if (larguraTela > 1200) {

                <?php if ($home == 1): ?>

                var sectionContato = jQuery('#contato').offset().top;
                var tamContato = jQuery('#contato').height();
                var contatoGif = sectionContato + (tamContato * 0.6);

                var sectionEstudio = jQuery('#grafion').offset().top;
                var tamEstudio = jQuery('#grafion').height();
                var estudioGif = sectionEstudio + (tamEstudio * 0.6);


                jQuery(document).on('scroll', function () {
                    var scrollPage = jQuery(this).scrollTop() + jQuery(window).height();

                    /***** ADICIONANDO ANIMAÇÃO GIFS *****/
                    if (jQuery("#animacao-contato img").length == 0) {
                        if (scrollPage >= contatoGif) {
                            jQuery('#animacao-contato').append(jQuery('<img>', {id: 'theImg', src: img_animacao_contato}));
                            setTimeout(function () {
                                jQuery('#animacao-contato').remove();
                            }, 8000);
                        }
                    }

                    if (jQuery("#animacao-estudio img").length == 0) {
                        if (scrollPage >= estudioGif) {
                            jQuery('#animacao-estudio ').append(jQuery('<img>', {id: 'theImg', src: img_animacao_estudio}));
                            setTimeout(function () {
                                jQuery('#animacao-estudio ').remove();
                            }, 5500);
                        }
                    }

                });

                <?php endif;?>

            }

        }).trigger('resize');
    });

    jQuery(function () {
        jQuery(window).on('resize', function () {

            /**** BANNER HOME ****/
            var telaH = jQuery(window).height();
            var telaW = jQuery(window).width();

            /**** FIM BANNER HOME ****/

            /**** PADDING PARA MENU ****/
            var menuH = jQuery('#header_wrap').height();
            jQuery("#content-menu_wrap_bg .clientes, .moduletable-estudio, #breadcrumbs, #box1, #modslide_equipes").css('padding-top', menuH);

            <?php if ($home == 0): ?>
            jQuery("#content-menu_wrap_bg").css('padding-top', menuH);
            <?php endif;?>

            /**** FIM PADDING PARA MENU ****/

            var rodapeH = jQuery('#bottom_wrap').outerHeight();
            jQuery('#content-menu_wrap_bg').css('min-height', telaH - (menuH + rodapeH));

            /**** MENU ****/
            var offset = jQuery('#topnav_wrap').height();
            var menu = jQuery('#header_wrap');
            jQuery(document).on('scroll', function () {
                if (offset <= jQuery(window).scrollTop()) {
                    menu.addClass('fixa');
                    jQuery('#logo img').addClass('animated pulse');
                } else {
                    menu.removeClass('fixa');
                    jQuery('#logo img').removeClass('animated pulse');
                }
            });
            /**** FIM MENU ****/

            /**** SEÇÃO TOPO ****/

            /**** TAMANHO SECTION ****/
            jQuery("section#portfolio, section#grafion, section#equipe, section#clientes, section#contato").css('min-height', telaH);
            /**** FIM TAMANHO SECTION ****/

            /**** EFEITO MENU ****/
            var sections = jQuery('section')
                , nav = jQuery('#topmenu .menu-home')
                , nav_resp = jQuery('.menuresp .menu-home')
                , nav_height = nav.outerHeight();

            jQuery(window).on('scroll', function () {
                var cur_pos = jQuery(this).scrollTop();

                sections.each(function () {
                    var top = jQuery(this).offset().top - nav_height,
                        bottom = top + jQuery(this).outerHeight();

                    if (cur_pos >= top && cur_pos <= bottom) {
                        nav.find('a').parent('li').removeClass('active');
                        nav.find('a[href="#' + jQuery(this).attr('id') + '"]').parent('li').addClass('active');
                        nav_resp.find('a').parent('li').removeClass('active');
                        nav_resp.find('a[href="#' + jQuery(this).attr('id') + '"]').parent('li').addClass('active');
                    }
                });
            });
            /**** FIM EFEITO MENU ****/

            jQuery("#content-middle .moduletable-estudio .custom-estudio .content-estudio").css('min-height', telaH - menuH - 115 - 105);

        }).trigger('resize');
    });

    jQuery(window).load(function () {
        jQuery(window).on('resize', function () {

            var alturaTela = jQuery(window).height();
            var ban = jQuery('.custom-banner-principal .grafion > div').height();

            if (ban > alturaTela) {
                jQuery('#topnav_wrap').height(ban + 80);
            }

        }).trigger('resize');
    });

    jQuery(function () {

        jQuery(window).on('resize', function () {
            var largura = jQuery(window).width();

            if (largura <= 960) {
                jQuery('#topmenu_wrap').hide();
                jQuery("#topmenu_wrap").css('visibility', 'hidden');
                jQuery('#topmenu').hide();
                jQuery("#gotomenu").show();
                jQuery('.gotomenu').css('visibility', 'visible');
            } else {
                jQuery("#topmenu_wrap").show();
                jQuery("#topmenu_wrap").css('visibility', 'visible');
                jQuery('#topmenu').show();
                jQuery('#gotomenu').hide();
                jQuery('.menuresp').hide();
                jQuery('.gotomenu').css('visibility', 'hidden');
            }

        }).trigger('resize');
    });

    jQuery(function () {
        //MENU RESPONSIVO

        jQuery('.menuresp').hide();

        jQuery("#gotomenu").click(function () {
            jQuery('.menuresp').css('visibility', 'visible');
            jQuery('.menuresp').slideToggle();
        });

        /**** SCROLL MENU SLOW****/
        jQuery('.menuresp a').click(function () {
            var alvo = jQuery(this).attr('href').split('#').pop();
            jQuery('html, body').animate({scrollTop: jQuery('#' + alvo).offset().top}, 500);
            jQuery('.menuresp').slideToggle();
            return false;
        });
        /**** FIM SCROLL MENU SLOW ****/

    });

    jQuery(function () {
        jQuery(window).on('resize', function () {

            var tela = jQuery(window).height();
            var telaContato = jQuery('#box_wrap').height();
            var telaCopyright = jQuery('#copyright').height();

            <?php if ($home == 1): ?>
            jQuery('#box3').css('min-height', tela - telaContato - telaCopyright + 1);
            <?php endif;?>

        }).trigger('resize');
    });

</script>
</body>
</html>
