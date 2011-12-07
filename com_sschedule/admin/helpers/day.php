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
defined('_JEXEC') or die('Restricted access');

abstract class SscheduleHelperDay {

    public static function getDaySelect() {

        $day = array(
            '0' => array('value' => '1', 'text' => JText::_('COM_SSCHEDULE_MON')),
            '1' => array('value' => '2', 'text' => JText::_('COM_SSCHEDULE_TUES')),
            '2' => array('value' => '3', 'text' => JText::_('COM_SSCHEDULE_WEN')),
            '3' => array('value' => '4', 'text' => JText::_('COM_SSCHEDULE_THURS')),
            '4' => array('value' => '5', 'text' => JText::_('COM_SSCHEDULE_FRI')),
            '5' => array('value' => '6', 'text' => JText::_('COM_SSCHEDULE_SAT')),
            '6' => array('value' => '7', 'text' => JText::_('COM_SSCHEDULE_SUN'))
        );
        return $day;
    }

    public static function getDayText($day) {

        switch ($day) {
            case 1:
                $tmp = JText::_('COM_SSCHEDULE_MON');
                break;
            case 2:
                $tmp = JText::_('COM_SSCHEDULE_TUES');
                break;
            case 3:
                $tmp = JText::_('COM_SSCHEDULE_WEN');
                break;
            case 4:
                $tmp = JText::_('COM_SSCHEDULE_THURS');
                break;
            case 5:
                $tmp = JText::_('COM_SSCHEDULE_FRI');
                break;
            case 6:
                $tmp = JText::_('COM_SSCHEDULE_SAT');
                break;
            case 7:
                $tmp = JText::_('COM_SSCHEDULE_SUN');
                break;
            default:
                $tmp = '';
        }
        return $tmp;
    }

}

?>
