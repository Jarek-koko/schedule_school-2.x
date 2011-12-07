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
// No direct access to this file

// import joomla controller library
jimport('joomla.application.component.controller');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'media/com_sschedule/css/style.css');

// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('Sschedule');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
