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
class modSlide_EquipeHelper
{
    public static function getSlide_Equipe(){
        
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__members As m');
        $query->where('m.published = 1');
        $query->order('m.ordering, m.created ASC');
        
        $db->setQuery($query);
	    $rows = (array) $db->loadObjectList();

        return $rows;
    }
    
}