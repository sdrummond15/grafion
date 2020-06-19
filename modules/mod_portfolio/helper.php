<?php
/**
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Site
 * @subpackage	mod_qualification
 * @since		1.5
 */
class modPortfolioHelper
{
    public static function getPortfolio(){
        
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__spsimpleportfolio_items As p');
        $query->where('p.enabled = 1 AND p.featured = 1 AND p.ordering > 0');
        $query->order('p.ordering ASC');
        $query->setLimit(6);
        
        $db->setQuery($query);
	    $rows = (array) $db->loadObjectList();

        return $rows;
    }

    public static function getMenuPortfolio(){

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__menu As m');
        $query->where('link = "index.php?option=com_spsimpleportfolio&view=items"');

        $db->setQuery($query);
        $rows = (array) $db->loadObjectList();

        return $rows;
    }
    
}