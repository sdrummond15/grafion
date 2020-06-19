<?php

defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Clients');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
