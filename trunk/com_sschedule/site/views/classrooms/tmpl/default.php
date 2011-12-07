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
<h1><?php echo $this->params->get('titlehead'); ?></h1>
<div id="classrooms">
<div>
 <img src="media/com_sschedule/images/classrooms.png" alt="classrooms" />
</div>
<?php foreach ($this->items as $item): ?>
    <div class="classrooms_box">
        <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=classroom&id=' . $item->id); ?>"><?php echo $item->name ?></a>
    </div>
<?php endforeach ?>
</div>
<div class="clr"></div>
