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
$sc = $this->escape($this->params->get('sc',0));
$st = $this->escape($this->params->get('st',0));
?>
<?php if (empty($this->items)): ?>
<p><?php echo JText::_('COM_SSCHEDULE_SCW_NOT_DATA'); ?></p>
<?php else: ?> 
<div id="soc">
 <h1><?php echo $this->params->get('titlehead'); ?></h1>
<?php $n = count($this->items); ?>
<?php $title_tmp = null; ?>
<?php for ($i = 0; $i < $n; $i++): ?>
<?php $item = &$this->items [$i]; ?>
<?php $kow = &$this->items [$i + 1]; ?>
    <?php if ($title_tmp != $item->day): ?>
        <div class="headtab">
            <div><?php echo SscheduleHelperDay::getDayText($item->day); ?></div>
        </div>
        <table>
        <thead>
        <tr>
            <th class="nobg"  scope="col">
               <?php echo JText::_('COM_SSCHEDULE_SCW_TIME'); ?>
            </th>
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SCW_LESSON'); ?></th> 
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SCW_CLASSROOM'); ?></th>
            <th  scope="col"><?php echo JText::_('COM_SSCHEDULE_SCW_TEACHER'); ?></th>
        </tr>
        </thead>
        <tbody>
   <?php endif; ?>
    <tr>
        <th class="specalt"  abbr="<?php echo $item->time; ?>" scope="row"><?php echo $item->time; ?></th>
         <td><?php echo $item->lesson; ?></td>
         <td>
         <?php if ($sc == 1): ?>
           <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=classroom&id='.(int) $item->classroomid) ?>" ><?php echo $item->classroom ?></a>    
         <?php else: ?>
         <?php echo $item->classroom; ?>
         <?php endif; ?>
         </td>
        <td>
        <?php if ($st == 1): ?>
            <a href="<?php echo JRoute::_('index.php?option=com_sschedule&view=teacher&id='.(int) $item->teacherid) ?>" ><?php echo $item->teacher ?></a>    
        <?php else: ?>
        <?php echo $item->teacher; ?>
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