<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class ClientsModelClients extends JModelLegacy
{
    public function getClients()
    {

        $db = JFactory::getDBO();
        $query = "SELECT c.id AS id, 
                 c.name AS name,
                 c.logo AS logo
                 FROM #__clients AS c
                 ORDER BY c.ordering, c.created ASC ";

        $db->setQuery($query);

        $item = $db->loadObjectList();
        //echo $query;
        return $item;
    }
}