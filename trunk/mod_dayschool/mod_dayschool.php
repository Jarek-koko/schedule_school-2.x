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

require_once dirname(__FILE__).'/helper.php';
require_once JPATH_SITE . '/administrator/components/com_sschedule/helpers/day.php';
require_once JPATH_SITE . '/components/com_sschedule/helpers/jquery.php';

$document = JFactory::getDocument();

if (!ExploreJQuery::already_loaded()) {
	$document->addScript(JURI::base() . 'media/com_sschedule/js/jquery-1.6.1.min.js');
	$document->addScript(JURI::base() . 'media/com_sschedule/js/jquery-noconflict.js');
}

$document->addScript(JURI::base() . 'media/com_sschedule/js/jquery.cookie.js');
$document->addStyleSheet(JURI::base() . 'media/com_sschedule/css/style.css');

$list = modDayschoolHelper::getList($params);
if (!count($list)) {
	return;
}
$listday = modDayschoolHelper::getDay($params);
require JModuleHelper::getLayoutPath('mod_dayschool',$params->get('layout', 'default'));
