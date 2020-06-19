<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');


$doc = JFactory::getDocument();

$doc->addStyleSheet('components/com_vacancies/css/stylevacancies.css');

$dados = $_POST;

if(!empty($dados)){

    $nome = $dados['nome'];
    $email = $dados['email'];
    $cargo = $dados['cargo'];
    $link = $dados['link'];

    $file = JRequest::getVar('file', null, 'files', 'array');

    if (empty($file['error'])) {

        jimport('joomla.filesystem.file');
        $filename = JFile::makeSafe($file['name']);
        $src = $file['tmp_name'];
        $dest = JPATH_SITE . DIRECTORY_SEPARATOR . "curriculos" . DIRECTORY_SEPARATOR . $filename;

        if ((strtolower(JFile::getExt($filename)) == 'pdf') || (strtolower(JFile::getExt($filename)) == 'doc') || (strtolower(JFile::getExt($filename)) == 'docx')) {
            JFile::upload($src, $dest);
        } else {
            echo '<h3>E-mail não foi enviado! Tipo de arquivo inválido!</h3>';
        }

    }

//ENVIANDO EMAIL PARA A GRAFION

    $app = JFactory::getApplication();

    $mail_from = 'grafion@grafion.com.br';
    if(!empty($mail_from)){
        $mailfrom = $mail_from;
    }else{
        $mailfrom = $app->get('mailfrom');
    }

    $fromname = $app->get('fromname');
    $sitename = $app->get('sitename');

    $subject = 'Candidato a fazer parte da equipe Gráfion';

    // Prepare email body

    $body = '<html>'
            . '<body>'
                . '<div style="font-size: 14px; font-family: Verdana;">'
                    . '<p>Nome: ' . $nome . '<br>'
                    . 'E-mail: ' . $email . '<br>'
                    . 'Cargo: ' . $cargo . '</p>'
                    . '<p>Portfólio: <a href="'. $link .'" target="_blank">' . $link . '</a></p>'
                . '</div>'
            . '</body>'
        . '</html>';

    $mail = JFactory::getMailer();
    $mail->addRecipient($mailfrom);
    $mail->addReplyTo(array($email, $nome));
    $mail->setSender(array($mailfrom, $fromname));
    $mail->isHtml();
    $mail->setSubject($subject);
    $mail->setBody($body);
    $mail->AddAttachment(JPATH_SITE . DIRECTORY_SEPARATOR . "curriculos" . DIRECTORY_SEPARATOR . $filename, $filename);
    $sent = $mail->Send();

    echo '<div class="enviado-overlay"></div>'
        .'<div class="enviado animated fadeIn">'
            . '<div class="fechar"><i class="fa fa-times" aria-hidden="true"></i></div>'
            . '<h1>Obrigado por<br>entrar em contato!</h1>'
            . '<div class="linha"></div>'
        . '</div>';

}


?>

<div class="vacancies-form">
    <h1 class="animated slideInDown">Junte-se a nós</h1>
    <div class="linha"></div>
    <form id="vacancy-form"
          action=""
          method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        <fieldset>
            <input type="text" id="nome" name="nome" placeholder="Nome Completo" required="true"/>
            <input type="email" name="email" placeholder="E-mail" required="true" class="input" id="email"/>
            <select name="cargo" id="cargo" required="true">
                <option value="">Selecione um setor</option>
                <option value="Jornalismo">Jornalismo</option>
                <option value="Editoração">Editoração</option>
                <option value="Design">Design</option>
                <option value="Revisão">Revisão</option>
                <option value="Tradução">Tradução</option>
            </select>
            <input name="curriculo" type="text" id="descfile" readonly="readonly" placeholder="Anexar currículo" />
            <input name="file" type="file" id="currirulum"
                   accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
            <input type="url" name="link" id="link" placeholder="Link site portfólio"/>
            <input type="submit" value="Enviar" class="submitform"/>
        </fieldset>
    </form>
</div>
<script>
    jQuery(document).ready(function () {

        jQuery('#currirulum').hide();

        jQuery("#descfile").click(function () {
            jQuery('#currirulum').trigger('click');
            jQuery('#currirulum').change(function() {
                var arquivo = jQuery(this).val();
                var curriculo = arquivo.split('\\').pop();
                //console.log(explo.pop());
                jQuery("#descfile").val(curriculo);
            });
        });

        jQuery("#submit").click(function () {
            var email = jQuery("#email").val();
            if (email != "") {
                var emailFilter = /^.+@.+\..{2,}$/;
                var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/;
                // condição
                if (!(emailFilter.test(sEmail)) || sEmail.match(illegalChars)) {
                    alert('Por favor, informe um email válido.');
                    return false;
                } else {
                    return true;
                }
            } else {
                alert('Digite um email!');
                return false;
            }
        });

        jQuery("div.enviado > div.fechar i").click(function () {
            jQuery('.enviado-overlay').css('transition', 'linear 100ms');
            jQuery('.enviado-overlay').hide();
            jQuery('.enviado').css('transition', 'linear 100ms');
            jQuery('.enviado').hide();
        });

        jQuery(document).keyup(function(e) {
            if (e.keyCode == 27) {
                jQuery('.enviado-overlay').css('transition', 'linear 100ms');
                jQuery('.enviado-overlay').hide();
                jQuery('.enviado').css('transition', 'linear 100ms');
                jQuery('.enviado').hide();
            }
        });

        jQuery(".enviado-overlay").click(function () {
            jQuery('.enviado-overlay').css('transition', 'linear 100ms');
            jQuery('.enviado-overlay').hide();
            jQuery('.enviado').css('transition', 'linear 100ms');
            jQuery('.enviado').hide();
        });

    });
</script>