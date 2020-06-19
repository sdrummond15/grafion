<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
JPluginHelper::importPlugin('content.joomplu');

class ClientsViewClients extends JViewLegacy {

    protected $clients;

    function display($tpl = null) {

        $this->clients = $this->get('Clients');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_clients/css/styleclients.css');
        parent::display($tpl);
    }
}
