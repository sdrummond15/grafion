<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
JPluginHelper::importPlugin('content.joomplu');

class VacanciesViewVacancies extends JViewLegacy {

    function display($tpl = null) {
        
        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_vacancies/css/stylevacancies.css');
        parent::display($tpl);
    }
}
