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


jimport('joomla.application.component.controllerform');

class SscheduleControllerClassroom extends JControllerForm {

    protected $text_prefix = 'COM_SSCHEDULE_CLASSROOM';
    
    protected $view_list = 'classrooms';

}