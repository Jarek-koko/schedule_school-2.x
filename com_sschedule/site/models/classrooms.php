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

jimport('joomla.application.component.modellist');

class SscheduleModelClassrooms extends JModelList {

    public function getListQuery() {
        $query = parent::getListQuery();

        $query->select('*');
        $query->from('#__sschedule_classrooms');
        $query->where('published = 1');
        $query->order('name');
        return $query;
    }

}