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
?>
<div class="width-60 fltlft">
    <fieldset class="adminform">
      <div id="mylogo">&nbsp;</div>
       <div class="clr"></div>
    </fieldset>
</div>
<div class="width-40 fltlft">
    <fieldset class="adminform">        
            <p><span><?php echo JText::_('COM_SSCHEDULE_AUTHOR'); ?>:</span> <?php echo $this->info['author']; ?></p>
            <p><span><?php echo JText::_('COM_SSCHEDULE_VERSION'); ?>:</span> <?php echo $this->info['version']; ?></p>
            <p><span><?php echo JText::_('COM_SSCHEDULE_CREATIONDATE'); ?>:</span> <?php echo $this->info['creationdate']; ?></p>
            <p><span><?php echo JText::_('COM_SSCHEDULE_COPYRIGHT'); ?>:</span> <?php echo $this->info['copyright']; ?></p>
            <p><span><?php echo JText::_('COM_SSCHEDULE_AUTHOR URL'); ?>:</span> <a href="<?php echo $this->info['authorurl']; ?>"><?php echo $this->info['authorurl']; ?></a></p>
            <p><span><?php echo JText::_('COM_SSCHEDULE_GPL'); ?>:</span> <a href="<?php echo $this->info['gpllink']; ?>"><?php echo $this->info['gpl']; ?></a></p> 
    </fieldset>
</div>
