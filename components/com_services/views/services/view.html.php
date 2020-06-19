<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
JPluginHelper::importPlugin('content.joomplu');

class ServicesViewServices extends JViewLegacy {

    protected $services;

    function display($tpl = null) {

        $this->services = $this->get('Services');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_services/css/styleservices.css');
        parent::display($tpl);
    }
}
