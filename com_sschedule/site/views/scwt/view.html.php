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

// import Joomla view library
jimport('joomla.application.component.view');

//Schedule week teacher
class SscheduleViewScwt extends JView {

     protected $params;

    // Overwriting JView display method
    function display($tpl = null) {
        
           // Assign data to the view
        $this->items = $this->get('Items');
        $this->params = JFactory::getApplication()->getParams();
    
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
             JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        // Display the view
        parent::display($tpl);
    }
}
