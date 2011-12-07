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
<div id="teachers">
<div>
 <img src="media/com_sschedule/images/teachers.png" alt="teachers" />
</div>
<?php if ($this->params->get('show_links') == '0'): ?>
<?php foreach ($this->items as $item): ?>
    <?php $url = JRoute::_('index.php?option=com_sschedule&view=teacher&id=' . $item->id); ?>
    <div class="teachers_box">
        <a href="<?php echo $url; ?>">
            <img src="<?php echo JURI::base() . $item->image ?>" />
        </a>
        <p><?php echo $item->name .'  '.$item->first_name; ?></p>
    </div>
<?php endforeach ?>
<?php else: ?>
 <?php foreach ($this->items as $item): ?>
    <div class="teachers_box">   
      <img src="<?php echo JURI::base() . $item->image ?>" />
      <p><?php echo $item->name .'  '.$item->first_name; ?></p>
    </div>
<?php endforeach ?>
 <?php endif;?>
</div>
<div class="clr"></div>
