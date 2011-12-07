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
?>
<div id="teacher">
    <h1><?php echo $this->item->name .'  '.$this->item->first_name; ?></h1>
<div class="teacher_box">
    <img src="<?php echo JURI::base() . $this->item->image ?>" />
    <div class="dsc"><?php echo JHTML::_('content.prepare', $this->item->description ); ?></div>
    <div class="clr"></div>
</div>
</div>

