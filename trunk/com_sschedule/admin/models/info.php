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

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

class SscheduleModelInfo extends JModel {

    
    public function getComponentInfo() {

        $info = array();   
        $file = JPATH_COMPONENT . DS . 'sschedule.xml';
        $xml = simplexml_load_file($file);
        
        $info['author'] = $xml->author;
        $info['version'] = $xml->version;
        $info['copyright'] = $xml->copyright;
        $info['authorurl'] = $xml->authorUrl;
        $info['creationdate'] = $xml->creationDate;
        $tmp = $xml->license;
        list($link, $gpl) = explode(' ', $tmp);
        $info['gpl'] = $gpl;
        $info['gpllink'] = $link;
        return $info;  
    }
}
