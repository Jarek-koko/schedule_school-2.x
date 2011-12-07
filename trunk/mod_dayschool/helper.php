<?php

/*
 * @package Joomla 1.7
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @module dayschool
 * @copyright Copyright (C) Klich Jarosław
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die;

class modDayschoolHelper {

    static function getList($params) {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('DISTINCT s.classid AS value');
        $query->from('#__sschedule AS s');
        $query->select('c.name AS text');
        $query->join('INNER', '`#__sschedule_classes` AS c ON c.id = s.classid');
        $query->where('s.published=1');
        $query->order('c.name');
        $db->setQuery($query, 0, 0);
        $list = $db->loadObjectList();

        return (array) $list;
    }

    static function getDay($params) {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('DISTINCT s.day AS value, s.day AS text');
        $query->order('s.day');
        $query->from('#__sschedule AS s');
        $query->where('s.published=1');
        $db->setQuery($query, 0, 0);
        $list = $db->loadObjectList();

        if (count($list)) {
            foreach ($list as $item) {
                $item->text = SscheduleHelperDay::getDayText((int)$item->text); 
            }
            return (array) $list;
        }
        return null;
    }

}
