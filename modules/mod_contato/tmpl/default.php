<div class="linha">&nbsp;</div>
<section id="contact">
    <div class="contact">
        <div id="retornoHTML">
            <form>
                <fieldset>
                    <input id="nome" type="text" placeholder="Nome"><br>
                    <input id="email" type="email" placeholder="E-mail"><br>
                    <?php if ($telefone == 1): ?>
                        <input id="phone" type="tel" placeholder="Telefone"><br>
                    <?php endif; ?>
                    <textarea id="msg" placeholder="Mensagem:"></textarea><br>
                    <input id="email_admin" type="hidden" name="email_admin" value="<?php echo $email_admin; ?>"/>
                    <input id="subject" type="hidden" name="subject" value="<?php echo $subject; ?>"/>
                    <input id="sucesso" type="hidden" name="sucesso" value="<?php echo $sucesso; ?>"/>
                    <input id="erro" type="hidden" name="erro" value="<?php echo $erro; ?>"/>
                    <input type="button" id="btn" class="btn" value="<?php echo (!empty($enviar)) ? $enviar : 'Enviar'; ?>">
                    <div class="loading">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
