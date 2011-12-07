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
jimport('joomla.application.component.modelform');

class SscheduleModelSot extends JModelForm {
    
     
    public function getForm($data = array(), $loadData = true) {
        // Get the form.
        $form = $this->loadForm('com_sschedule.sot', 'sot', array('control' => 'jform', 'load_data' => true));
        if (empty($form)) {
            return false;
        }
        return $form;
    }

}