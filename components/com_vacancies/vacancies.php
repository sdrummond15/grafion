<?php

defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Vacancies');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
