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

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

class SscheduleModelSchedules extends JModelList {

    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'l.id',
                'day', 'l.day',
                'teacher', 'l.teacher',
                'lesson', 'l.lesson',
                'class', 'l.class' ,
                'classroom', 'l.classroom',
                'time', 'l.time'
            );
        }
        parent::__construct($config);
    }

    protected function getListQuery() {
        // Create a new query object.
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);

        // Select some fields
        $query->select($this->getState(
                        'list.select', 'l.id, l.teacherid, l.lessonid, l.classid, l.day, ' .
                        'l.timeid, l.published, l.modified , l.classroomid ,l.checked_out_time, l.checked_out')
        );

        // From the hello table
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

         $query->select('u.name AS name');
         $query->join('LEFT', '#__users AS u ON u.id = l.checked_out');


        // Filter by published 
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where('l.published = ' . (int) $published);
        }
        
        // Filter by day
        $dayid = $this->getState('filter.day_id');
        if (is_numeric($dayid)) {
            $query->where('l.day = ' . (int) $dayid);
        }
        
        // Filter by teacher
        $teacherid = $this->getState('filter.teacher_id');
        if (is_numeric($teacherid)) {
            $query->where('l.teacherid = ' . (int) $teacherid);
        }
        
        // Filter by lesson
        $lessonid = $this->getState('filter.lesson_id');
        if (is_numeric($lessonid)) {
            $query->where('l.lessonid = ' . (int) $lessonid);
        }
        
        // Filter by classroom
        $classroomid = $this->getState('filter.classroom_id');
        if (is_numeric($classroomid)) {
            $query->where('l.classroomid = ' . (int) $classroomid);
        }
        
         // Filter by class
        $classid = $this->getState('filter.class_id');
        if (is_numeric($classid)) {
            $query->where('l.classid = ' . (int) $classid);
        }
        
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        $query->order($db->getEscaped($orderCol . ' ' . $orderDirn));
         
        //echo nl2br(str_replace('#__','jos_',$query));
        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $classId = $this->getUserStateFromRequest($this->context . '.filter.class_id', 'filter_class_id');
        $this->setState('filter.class_id', $classId);
        
        $classroomId = $this->getUserStateFromRequest($this->context . '.filter.classroom_id', 'filter_classroom_id');
        $this->setState('filter.classroom_id', $classroomId);

        $teacherId = $this->getUserStateFromRequest($this->context . '.filter.teacher_id', 'filter_teacher_id');
        $this->setState('filter.teacher_id', $teacherId);

        $lessonId = $this->getUserStateFromRequest($this->context . '.filter.lesson_id', 'filter_lesson_id');
        $this->setState('filter.lesson_id', $lessonId);

        $dayId = $this->getUserStateFromRequest($this->context . '.filter.day_id', 'filter_day_id');
        $this->setState('filter.day_id', $dayId);

        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '');
        $this->setState('filter.published', $published);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_sschedule');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('l.id', 'asc');
    }

    protected function getStoreId($id = '') {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.class_id');
        $id .= ':' . $this->getState('filter.teacher_id');
        $id .= ':' . $this->getState('filter.classroom_id');
        $id .= ':' . $this->getState('filter.lesson_id');
        $id .= ':' . $this->getState('filter.day_id');
        $id .= ':' . $this->getState('filter.published');
    
        return parent::getStoreId($id);
    }

    /**
     * Build a list of Teachers
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    public function getTeachers() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Construct the query
        $query->select('t.id AS value, t.name AS text');
        $query->from('#__sschedule_teachers AS t');
        $query->join('INNER', '#__sschedule AS s ON s.teacherid = t.id');
        $query->group('t.id');
        $query->order('t.name');

        // Setup the query
        $db->setQuery($query->__toString());
        // Return the result
        return $db->loadObjectList();
    }

    /**
     * Build a list of Classes
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    public function getClasses() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Construct the query
        $query->select('c.id AS value, c.name AS text');
        $query->from('#__sschedule_classes AS c');
        $query->join('INNER', '#__sschedule AS s ON s.classid = c.id');
        $query->group('c.id');
        $query->order('c.name');

        // Setup the query
        $db->setQuery($query->__toString());
        // Return the result
        return $db->loadObjectList();
    }
    
    
    /**
     * Build a list of Classroom
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    public function getClassrooms() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Construct the query
        $query->select('c.id AS value, c.name AS text');
        $query->from('#__sschedule_classrooms AS c');
        $query->join('INNER', '#__sschedule AS s ON s.classroomid = c.id');
        $query->group('c.id');
        $query->order('c.name');

        // Setup the query
        $db->setQuery($query->__toString());
        // Return the result
        return $db->loadObjectList();
    }

    /**
     * Build a list of Lessons
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    public function getLessons() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Construct the query
        $query->select('l.id AS value, l.name AS text');
        $query->from('#__sschedule_lessons AS l');
        $query->join('INNER', '#__sschedule AS s ON s.lessonid = l.id');
        $query->group('l.id');
        $query->order('l.name');
        // Setup the query
        $db->setQuery($query->__toString());

        // Return the result
        return $db->loadObjectList();
    }

}
