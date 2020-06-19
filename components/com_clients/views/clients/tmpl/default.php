<?php  defined('_JEXEC') or die('Restricted access');  ?>
<div class="clientes">
    <div>
        <h2>Clientes</h2>
        <div class="linha"></div>
    </div>
    <?php foreach ($this->clients as $client): ?>

        <?php

        $data = @getimagesize($client->logo);
        $width = $data[0];
        $height = $data[1];

        if ($height >= $width) {
            $tamanho = 'background-size: auto 75%;';
        } else {
            $tamanho = 'background-size: 75% auto;';
        }

        $backcliente = 'style="background-color: #FFF !important; background: url(' . $client->logo . ') no-repeat center;' . $tamanho . '"';

        ?>

        <div class="cliente" <?php echo $backcliente; ?>>

        </div>
    <?php endforeach;?>
</div>
<script>
    jQuery(function () {
        jQuery(window).on('resize', function () {

            var clienteH = jQuery('.cliente').width();
            jQuery('.cliente').css('height', clienteH);

        }).trigger('resize');
    });
</script>
