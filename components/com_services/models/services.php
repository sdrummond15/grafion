<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class ServicesModelServices extends JModelLegacy
{
    public static function getServices()
    {
        $input = new JInput;
        $db = JFactory::getDBO();
        $query = "SELECT s.id AS id, 
                 s.name AS name,
                 s.alias AS alias,
                 s.image AS image,
                 s.description AS description,
                 s.keywords AS keywords
                 FROM #__services AS s
                 WHERE s.id = ".$input->get('servico')."
                 ORDER BY s.ordering, s.created ASC ";

        $db->setQuery($query);

        $item = $db->loadObjectList();
        //echo $query;
        return $item;
    }
}