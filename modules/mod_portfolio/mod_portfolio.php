<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_representadas
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_portfolio/assets/css/style_portfolio.css');

$titulo = $params->get('titulo');

$portfolio = modPortfolioHelper::getPortfolio();
$menuPortfolio = modPortfolioHelper::getMenuPortfolio();

require JModuleHelper::getLayoutPath('mod_portfolio', $params->get('layout', 'default'));