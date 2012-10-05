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
abstract class SscheduleHelper
{

    public static function getActions()
    {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_sschedule';
     
        $actions = JAccess::getActionsFromFile( JPATH_ADMINISTRATOR.'/components/com_sschedule/access.xml',"/access/section[@name='component']/");
        
        foreach ($actions as $action) {
            $result->set($action->name, $user->authorise($action->name, $assetName));
        }

        return $result;
        
    }

    public static function addSubmenu($view = null)
    {
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_INFO'), 'index.php?option=com_sschedule', ("info" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_CLASSES'), 'index.php?option=com_sschedule&view=classes', ("classes" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_CLASSROOMS'), 'index.php?option=com_sschedule&view=classrooms', ("classrooms" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_LESSONS'), 'index.php?option=com_sschedule&view=lessons', ("lessons" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_TEACHERS'), 'index.php?option=com_sschedule&view=teachers', ("teachers" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_TIMES'), 'index.php?option=com_sschedule&view=times', ("times" === $view));
        JSubMenuHelper::addEntry(JText::_('COM_SSCHEDULE_SCHEDULES'), 'index.php?option=com_sschedule&view=schedules', ("schedules" === $view));
    }

}
