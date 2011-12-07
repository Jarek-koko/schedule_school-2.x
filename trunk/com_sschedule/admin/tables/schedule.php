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
// no direct access
defined('_JEXEC') or die;

// import Joomla table library
jimport('joomla.database.table');

class SscheduleTableSchedule extends JTable {

    function __construct(&$db) {
        parent::__construct('#__sschedule', 'id', $db);
    }

    public function store($updateNulls = false) {
       
        $date = JFactory::getDate();
         // Existing item
         $this->modified = $date->toMySQL();
    
        // Attempt to store the user data.
	return parent::store($updateNulls);
    }
}
