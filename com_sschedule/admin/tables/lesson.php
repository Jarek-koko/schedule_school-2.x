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

class SscheduleTableLesson extends JTable {

    function __construct(&$db) {
        parent::__construct('#__sschedule_lessons', 'id', $db);
    }

    public function store($updateNulls = false) {
       
        $date = JFactory::getDate();
         // Existing item
         $this->modified = $date->toMySQL();
    
        // Attempt to store the user data.
	return parent::store($updateNulls);
    }
    
    public function delete($pk = null) {
        $k = $this->_tbl_key;
        $pk = (is_null($pk)) ? $this->$k : $pk;
        if (!is_null($pk)) {
            $query = $this->_db->getQuery(true);
            $query->from(' #__sschedule ');
            $query->select(' lessonid ');
            $query->where(' lessonid=' . (int) $pk );
            $this->_db->setQuery($query);
            $results = $this->_db->loadResult();
            
            if (count($results)) {
                $this->setError(JText::_('COM_SSCHEDULE_LESSON_ERROR_CANNOT_DELETE_ITEM'));
                return false;
            }
        }
        return parent::delete($pk);
    }    
}
