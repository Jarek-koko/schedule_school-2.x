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

class SscheduleViewTeacher extends JView {

    protected $item;

    public function display($tpl = null) {
        $this->item = $this->get('Item');

        if (!$this->item) {
            throw new Exception(JText::_('COM_SSCHEDULE_404'), 404);
        }

        parent::display($tpl);
    }

}
