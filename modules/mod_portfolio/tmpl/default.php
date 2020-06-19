<?php

foreach ($menuPortfolio as $menu) {
    $menu = $menu->path;
}

$count = 1;
?>
<div id="modportfolio">
    <div class="projetos">

        <h1 class="titulo"><?php echo $titulo; ?></h1>
        <div class="linha"></div>
        <div class="projetos_box">
            <div class="proj_box">
                <a href="index.php/portfolio-grafion">
                    <h1>Que tal conhecer um pouco mais nossos projetos?</h1>
                    <h3>ver todos</h3>
                </a>
            </div>

            <?php
            foreach ($portfolio as $portfolio):
                ?>
                <?php
                $link = 'index.php/' . $menu . '/' . $portfolio->spsimpleportfolio_item_id . '-' . $portfolio->alias;

                $backgroundPort = '';

                $tamImg = '800x800';
                switch ($count) {
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $tamImg = '800x533';
                        break;
                }

                if (!empty($portfolio->image)) {
                    $backgroundImage = JURI::base(true) . '/images/spsimpleportfolio/' . $portfolio->alias . '/' . JFile::stripExt(JFile::getName($portfolio->image)) . '_' . $tamImg . '.' . JFile::getExt($portfolio->image);
                    $backgroundPort = 'style="background: url(\'' . $backgroundImage . '\')"';
                }

                ?>
                <div class="proj_box" <?php echo $backgroundPort; ?>>
                    <div class="proj_box_info">
                        <h1 class="proj_box_title">
                            <a class="btn-portfolio" href="<?php echo $link; ?>">
                                <?php echo $portfolio->title; ?>
                            </a>
                        </h1>
                    </div>
                    <div class="proj_box_overlay">
                        <div class="proj_box_middle">
                            <div>
                                <div class="proj_box_btns">
                                    <a class="btn-portfolio" href="<?php echo $link; ?>">
                                        <img src="images/mais.png"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $count++;
            endforeach;
            ?>
        </div>
    </div>
</div>