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
<div id="class">
    <h1><?php echo $this->item->name ?></h1>
<div class="class_box">
    <div class="dsc">
    <?php echo JHTML::_('content.prepare', $this->item->description ); ?>
    </div>
    <div class="clr"></div>
</div>
</div>

