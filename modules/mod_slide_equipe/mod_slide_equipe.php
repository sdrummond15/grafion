<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_slide_equipe
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_slide_equipe/assets/css/style_slide_equipe.css');

$slide_equipe = modSlide_EquipeHelper::getSlide_Equipe();
$module = JModuleHelper::getModule( 'slide_equipe' );

require JModuleHelper::getLayoutPath('mod_slide_equipe', $params->get('layout', 'default'));
