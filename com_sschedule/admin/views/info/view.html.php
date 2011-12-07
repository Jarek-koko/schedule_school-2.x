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

// sscheduleViewSschedules
class SscheduleViewInfo extends JView {

    function display($tpl = null) {
        
        $this->info = $this->get('ComponentInfo');
        // Set the toolbar
        $this->addToolBar();
        // Display the template
        parent::display($tpl);
        // Set the document
        $this->setDocument();
    }

    protected function addToolBar() {
        $canDo = SscheduleHelper::getActions();
        JToolBarHelper::title(JText::_('COM_SSCHEDULE_INFO'), 'logo.png');
        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_sschedule');
        }
    }

    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_SSCHEDULE_INFO'));
    }

}
