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
jimport('joomla.application.component.view');

class SscheduleViewSchedule extends JView {

    protected $form;
    protected $item;
    protected $state;

    public function display($tpl = null) {
        // Initialise variables.
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->state = $this->get('State');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode("\n", $errors));
            return false;
        }

        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar() {
        
        JRequest::setVar('hidemainmenu', true);
        $user = JFactory::getUser();
        $isNew = ($this->item->id == 0);
        $canDo = SscheduleHelper::getActions();

        JToolBarHelper::title($isNew ? JText::_('COM_SSCHEDULE_SCHEDULE_NEW') : JText::_('COM_SSCHEDULE_SCHEDULE_EDIT'), 'logo.png');

        // If not checked out, can save the item.
        if (($canDo->get('core.edit') || $canDo->get('core.create'))) {
            JToolBarHelper::apply('schedule.apply');
            JToolBarHelper::save('schedule.save');
        }
        if ($canDo->get('core.create')) {
            JToolBarHelper::save2new('schedule.save2new');
        }

        if (empty($this->item->id)) {
            JToolBarHelper::cancel('schedule.cancel');
        } else {
            JToolBarHelper::cancel('schedule.cancel', 'JTOOLBAR_CLOSE');
        }
    }

}
