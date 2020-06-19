<?php



defined('_JEXEC') or die;



jimport('joomla.application.component.controllerform');



class ClientsControllerClients extends JControllerForm

{

    public function enviarclient()

    {

        // Check for request forgeries.



        // Initialise variables.

        $model = $this->getModel('clients');

        $params = JComponentHelper::getParams('com_clients');

        $nome = JRequest::getVar('nome');

        $empresa = JRequest::getVar('empresa');

        $telefone = JRequest::getVar('tel');

        $email = JRequest::getVar('email');

        $solicitacao = JRequest::getVar('solicitacao');

        PHP_email::email_client($nome, $empresa, $telefone, $email, $solicitacao);

        return true;

    }

}



require_once(JPATH_SITE . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php');

$doc = JFactory::getDocument();

$doc->addStyleSheet('components/com_clients/css/styleclients.css');



class PHP_email extends PHPMailer

{



    function email_client($nome, $empresa, $telefone, $email, $solicitacao)

    {



        $app = JFactory::getApplication();

        $mailfrom = 'olimex@olimex.com.br';

        $fromname = 'Cotação Site OLIMEX';

        $sitename = $app->getCfg('sitename');



        $mail = JFactory::getMailer();

        $mail->addRecipient($mailfrom);

        $mail->addReplyTo(array($email, $nome));

        $mail->setSender(array($mailfrom, $fromname));

        $mail->IsHTML();

        $mail->setSubject("Solicitação");

        $mail->setBody('<html>

                            <body>

                                <table>

                                    <tr>

                                        <th colspan="2">

                                            <font size="4" face="Verdana">

                                                Solicitação

                                                <br /><br />

                                            </font>

                                        </th>

                                    </tr>

                                    <tr>

                                        <td align=left colspan=2>

                                        <font size="2" face="Verdana">

                                            <b>Nome: </b>' . $nome . '

                                        </font>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td align=left colspan=2>

                                        <font size="2" face="Verdana">

                                            <b>Empresa: </b> ' . $empresa . '

                                        </font>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td align=left colspan=2>

                                        <font size="2" face="Verdana">

                                            <b>Telefone: </b>' . $telefone . '

                                        </font>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td align=left colspan=2>

                                        <font size="2" face="Verdana">

                                            <b>E-mail:</b> ' . $email . '

                                        </font>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td align=left colspan=2>

                                        <font size="2" face="Verdana">

                                            <b>Solicitação:</b> ' . $solicitacao . '

                                        </font>

                                        </td>

                                    </tr>

                                </table>

                            </body>

                        </html>');

        $sent = $mail->Send();

        echo '<div class="confirm"><h1>Cota&ccedil;&atilde;o Enviada com Sucesso.</h1><h1>Obrigado!</h1><br /><a href="index.php/contato/cotacao-online" rel="pagina inicial Olimex">Voltar</a></div>';



    }



}