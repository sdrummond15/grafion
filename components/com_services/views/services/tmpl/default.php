<?php
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
?>

<div class="servicos">
    <?php foreach ($this->services as $service): ?>

        <?php
        if (!empty($service->keywords)) {
            $service->keywords = ', ' . $service->keywords;
        }
        $document->setMetadata('keywords', $service->alias . $service->keywords);

        ?>

        <div class="imgservico">
            <img src="<?php echo $service->image; ?>" alt="grafion <?php echo $service->alias; ?>" class="animated fadeInUp"/>
        </div>
        <div class="descservico">
            <div class="servico">
                <h1 class="animated slideInRight"><?php echo $service->name; ?></h1>
                <div class="linha"></div>
                <div class="desc">
                    <?php echo $service->description; ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>
<script>
    jQuery(function () {
        jQuery(window).on('resize', function () {

            var servicoH = jQuery('.imgservico').height();
            jQuery('.descservico').css('height', servicoH);

        }).trigger('resize');
    });
</script>