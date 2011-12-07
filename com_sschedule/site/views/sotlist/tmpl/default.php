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
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/day.php';
$scr = $this->escape($this->state->get('sschedule.scr'));
$scl = $this->escape($this->state->get('sschedule.scl'));
?>
<?php if (empty($this->items)): ?>
<p><?php echo JText::_('COM_SSCHEDULE_SOT_NOT_DATA'); ?></p>
<?php else: ?> 
<div id="sot">
<?php $n = count($this->items); ?>
<?php $title_tmp = null; ?>
<?php for ($i = 0; $i < $n; $i++): ?>
<?php $item = &$this->items [$i]; ?>
<?php $kow = &$this->items [$i + 1]; ?>
    <?php if ($title_tmp != $item->day): ?>
        <div class="headtab">
            <div><?php echo $item->teacher. ' -- '. SscheduleHelperDay::getDayText($item->day); ?></div>
        </div>
        <table>
        <thead>
        <tr>
            <th class="nobg"  scope="col"><?php echo JText::_('COM_SSCHEDULE_SOT_TIME'); ?></th>
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SOT_LESSON'); ?></th> 
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SOT_CLASSROOM'); ?></th>
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SOT_CLASS'); ?></th>
        </tr>
        </thead>
        <tbody>
   <?php endif; ?>
    <tr>
        <th class="specalt"  abbr="<?php echo $item->time; ?>" scope="row"><?php echo $item->time; ?></th>
         <td><?php echo $item->lesson; ?></td>
         <td>
         <?php if ($scr == 1): ?>
           <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=classroom&id='.(int) $item->classroomid) ?>" ><?php echo $item->classroom ?></a>    
         <?php else: ?>
         <?php echo $item->classroom; ?>
         <?php endif; ?>
         </td>
        <td>
        <?php if ($scl == 1): ?>
            <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=class&id='.(int) $item->classid) ?>" ><?php echo $item->class ?></a>    
        <?php else: ?>
        <?php echo $item->class; ?>
        <?php endif; ?>
        </td>
    </tr>
    <?php if (is_object($kow)): ?>
        <?php if (($kow->day != $item->day)): ?>
            </tbody></table>
        <?php endif; ?>
    <?php else: ?>
        </tbody></table>
    <?php endif; ?>
    <?php $title_tmp = $item->day; ?>
<?php endfor; ?>
</div>
<?php endif; ?>