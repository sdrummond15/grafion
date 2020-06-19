<?php
/**
 * @package     SP Simple Portfolio
 *
 * @copyright   Copyright (C) 2010 - 2015 JoomShaper. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die();

require_once JPATH_COMPONENT . '/helpers/helper.php';
SpsimpleportfolioHelper::generateMeta($this->item);


$doc = JFactory::getDocument();
$doc->addStylesheet(JURI::root(true) . '/components/com_spsimpleportfolio/assets/css/spsimpleportfolio.css');

$tags = SpsimpleportfolioHelper::getTags((array)$this->item->spsimpleportfolio_tag_id);
$newtags = array();
foreach ($tags as $tag) {
    $newtags[] = $tag->title;
}

//video
if ($this->item->video) {
    $video = parse_url($this->item->video);

    switch ($video['host']) {
        case 'youtu.be':
            $video_id = trim($video['path'], '/');
            $video_src = '//www.youtube.com/embed/' . $video_id;
            break;

        case 'www.youtube.com':
        case 'youtube.com':
            parse_str($video['query'], $query);
            $video_id = $query['v'];
            $video_src = '//www.youtube.com/embed/' . $video_id;
            break;

        case 'vimeo.com':
        case 'www.vimeo.com':
            $video_id = trim($video['path'], '/');
            $video_src = "//player.vimeo.com/video/" . $video_id;
    }

}

?>

<div id="sp-simpleportfolio" class="sp-simpleportfolio sp-simpleportfolio-view-item">

    <div class="sp-simpleportfolio-details clearfix">

        <div class="sp-simpleportfolio-meta">
            <?php if (!empty($this->item->title)) { ?>
                <div class="sp-simpleportfolio-title">
                    <h2><?php echo $this->item->title; ?></h2>
                </div>
            <?php } ?>
        </div>

        <div class="sp-simpleportfolio-description">
            <p><?php echo $this->item->description; ?></p>
        </div>

    </div>

    <div class="sp-simpleportfolio-image">
        <?php if ($this->item->video) { ?>
            <div class="sp-simpleportfolio-embed">
                <iframe src="<?php echo $video_src; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen
                        allowFullScreen></iframe>
                <div class="sp-simpleportfolio-item-image">
                    <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image; ?>"
                         alt="<?php echo $this->item->title; ?>">
                </div>
                <?php if (!empty($this->item->image1)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image1; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image2)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image2; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image3)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image3; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image4)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image4; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image5)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image5; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <?php if ($this->item->image) { ?>
<!--                <div class="sp-simpleportfolio-item-image">-->
<!--                    <img class="sp-simpleportfolio-img" src="--><?php //echo $this->item->image; ?><!--"-->
<!--                         alt="--><?php //echo $this->item->title; ?><!--">-->
<!--                </div>-->
                <?php if (!empty($this->item->image1)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image1; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image2)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image2; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image3)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image3; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image4)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image4; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image5)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image5; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
                <?php if (!empty($this->item->image6)) { ?>
                    <div class="sp-simpleportfolio-item-image">
                        <img class="sp-simpleportfolio-img" src="<?php echo $this->item->image6; ?>"
                             alt="<?php echo $this->item->title; ?>">
                    </div>
                <?php } ?>
            <?php } else { ?>
                <img class="sp-simpleportfolio-img" src="<?php echo $this->item->thumbnail; ?>"
                     alt="<?php echo $this->item->title; ?>">
            <?php } ?>
        <?php } ?>
    </div>

    <div class="sp-simpleportfolio-details-project">
        <?php if (!empty($this->item->title)) { ?>
            <div class="sp-simpleportfolio-client">
                <h2><span>Cliente: </span><?php echo $this->item->client; ?></h2>
            </div>
        <?php } ?>

        <?php if (!empty($this->item->service)) { ?>
            <div class="sp-simpleportfolio-services">
                <p><span>Serviços: </span><?php echo $this->item->service; ?></p>
            </div>
        <?php } ?>
    </div>


</div>