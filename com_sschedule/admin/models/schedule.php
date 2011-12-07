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

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

class SscheduleModelSchedule extends JModelAdmin {

 
    public function getTable($type = 'Schedule', $prefix = 'SscheduleTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    
    public function getForm($data = array(), $loadData = true) {
        // Get the form.
        $form = $this->loadForm('com_sschedule.schedule', 'schedule', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) {
            return false;
        }
        return $form;
    }

    protected function loadFormData() {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_sschedule.edit.schedule.data', array());
        if (empty($data)) {
            $data = $this->getItem();
        }
        return $data;
    }

}
