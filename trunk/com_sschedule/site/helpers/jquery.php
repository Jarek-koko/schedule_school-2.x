<?php

/*
 * @package Joomla 1.7
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Sschedule
 * @copyright Copyright (C) Klich Jarosław
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * 
 */
defined('_JEXEC') or die;

class ExploreJQuery {

    function already_loaded() {
        $document = JFactory::getDocument();

        $head_data = $document->getHeadData();

        foreach (array_keys($head_data['scripts']) as $script) {
            if (stristr($script, 'jquery')) {
                return true;
            }
        }
        return false;
    }

}