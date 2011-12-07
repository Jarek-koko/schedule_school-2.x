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
defined('_JEXEC') or die('Restricted access');


// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_sschedule')) {
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// require helper file
JLoader::register('SscheduleHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'sschedule.php');

// load css
$document = & JFactory::getDocument();
$document->addStyleSheet(JURI::root(true) . '/administrator/components/com_sschedule/assets/style.css');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed
$controller = JController::getInstance('Sschedule');

// Set the submenu
$view = (string) JRequest::getVar('view', "info", 'default', 'string');

SscheduleHelper::addSubmenu($view);
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
