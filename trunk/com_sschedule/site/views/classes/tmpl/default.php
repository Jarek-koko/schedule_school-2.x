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
<div id="classes">
<div>
 <img src="media/com_sschedule/images/classes.png" alt="classes" />
</div>
<?php foreach ($this->items as $item): ?>
    <div class="classes_box">
        <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=class&id=' . $item->id); ?>"><?php echo $item->name ?></a>
    </div>
<?php endforeach ?>
</div>
<div class="clr"></div>
