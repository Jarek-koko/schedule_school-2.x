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

// import Joomla view library
jimport('joomla.application.component.view');

class SscheduleViewSchedules extends JView {

    function display($tpl = null) {
        // Get data from the model
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        
        $this->teachers	= $this->get('Teachers');
        $this->classes	= $this->get('Classes');
        $this->classrooms = $this->get('Classrooms');
        $this->lessons	= $this->get('Lessons');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }

        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
        // Set the document
        $this->setDocument();
    }

    protected function addToolBar() {

        $canDo = SscheduleHelper::getActions();
        JToolBarHelper::title(JText::_('COM_SSCHEDULE_SCHEDULES'), 'logo.png');
        if ($canDo->get('core.edit.state')) {
            JToolBarHelper::publish('schedules.publish', 'JTOOLBAR_PUBLISH', true);
            JToolBarHelper::unpublish('schedules.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            JToolBarHelper::divider();
        }

        if ($canDo->get('core.create')) {
            JToolBarHelper::addNew('schedule.add', 'JTOOLBAR_NEW');
        }
        if ($canDo->get('core.edit')) {
            JToolBarHelper::editList('schedule.edit', 'JTOOLBAR_EDIT');
        }
        if ($canDo->get('core.delete')) {
            JToolBarHelper::deleteList('', 'schedules.delete', 'JTOOLBAR_DELETE');
        }
    }

    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_SSCHEDULE_SCHEDULES'));
    }

}
