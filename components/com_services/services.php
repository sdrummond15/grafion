<?php

defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Services');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
