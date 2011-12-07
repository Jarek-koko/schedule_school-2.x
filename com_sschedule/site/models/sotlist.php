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

class SscheduleModelSotlist extends JModelList {

    public function getListQuery() {

        $query = parent::getListQuery();

        // Select some fields
        $query->select('l.id, l.teacherid, l.lessonid, l.classid, l.day, ' .
                'l.timeid, l.published, l.modified , l.classroomid ,l.checked_out_time, l.checked_out'
        );
        
        $query->from('#__sschedule AS l');

        // Join over the class
        $query->select('c.name AS class');
        $query->join('LEFT', '`#__sschedule_classes` AS c ON c.id = l.classid');

        // Join over the teacher
        $query->select("CONCAT(t.name,' ',t.first_name) AS teacher");
        $query->join('LEFT', '`#__sschedule_teachers` AS t ON t.id = l.teacherid');

        // Join over the lesson
        $query->select('le.name AS lesson');
        $query->join('LEFT', '`#__sschedule_lessons` AS le ON le.id = l.lessonid');

        // Join over the time
        $query->select('b.name AS time');
        $query->join('LEFT', '`#__sschedule_times` AS b ON b.id = l.timeid');

        // Join over the classroom
        $query->select('cl.name AS classroom');
        $query->join('LEFT', '`#__sschedule_classrooms` AS cl ON cl.id = l.classroomid');

        $teacherid = $this->getState('sschedule.teacherid');
        $dayid = $this->getState('sschedule.dayid');
        $params = $this->getState('params');
               
        if($params->get('order_num', 0)){
           $query->order('b.name');
        } else {
           $query->order('b.ordering');
        }
       
        if (is_numeric($teacherid)) {
            $query->where('l.teacherid = ' . (int) $teacherid);
        }

        if (is_numeric($dayid)) {
            $query->where('l.day = ' . (int) $dayid);
        }        
        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {

        $app = JFactory::getApplication();
        $params = $app->getParams();
        
        $teacherid = (int) JRequest::getVar('teacherid', 0, '', 'int');
        $dayid = (int) JRequest::getVar('dayid', 0, '', 'int');
        $scr = (int) JRequest::getVar('scr', 0, '', 'int');
        $scl = (int) JRequest::getVar('scl', 0, '', 'int');
        
        $this->setState('sschedule.teacherid', $teacherid);
        $this->setState('sschedule.dayid', $dayid);
        $this->setState('sschedule.scr', $scr);
        $this->setState('sschedule.scl', $scl);
        $this->setState('params', $params);
    }

}