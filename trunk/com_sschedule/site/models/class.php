<?php

/*
 * @package Joomla 1.7
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Sschedule
 * @copyright Copyright (C) Klich Jarosław
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.model');

class SscheduleModelClass extends JModel {

    public function getItem() {
        $id = JRequest::getInt('id');

        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('c.*');
        $query->from('#__sschedule_classes AS c');
        $query->where("c.id = '{$id}'");

        $db->setQuery($query);
        $row = $db->loadObject();
        return $row;
    }

}