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
// no direct access
defined('_JEXEC') or die;
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
require_once JPATH_COMPONENT.'/helpers/day.php';
echo  $this->state->get('filter.published');
?>
<form action="<?php echo JRoute::_('index.php?option=com_sschedule&view=schedules'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-select fltrt">
            <select name="filter_published" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions', array('archived' => false, 'trash' => false)), 'value', 'text', $this->state->get('filter.published'), true); ?>
            </select>       
            <select name="filter_day_id" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_SELECT_SSDAY');?></option>
                <?php echo JHtml::_('select.options', SscheduleHelperDay::getDaySelect(), 'value', 'text', $this->state->get('filter.day_id'));?>
	  </select>
            <select name="filter_class_id" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_SELECT_SSCLASS');?></option>
                <?php echo JHtml::_('select.options', $this->classes , 'value', 'text', $this->state->get('filter.class_id'));?>
	  </select>
          <select name="filter_classroom_id" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_SELECT_SSCLASSROOM');?></option>
                <?php echo JHtml::_('select.options', $this->classrooms , 'value', 'text', $this->state->get('filter.classroom_id'));?>
	  </select>
            <select name="filter_teacher_id" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_SELECT_SSTEACHER');?></option>
                <?php echo JHtml::_('select.options',  $this->teachers , 'value', 'text', $this->state->get('filter.teacher_id'));?>
	  </select>
            <select name="filter_lesson_id" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_SELECT_SSLESSON');?></option>
                <?php echo JHtml::_('select.options', $this->lessons , 'value', 'text', $this->state->get('filter.lesson_id'));?>
	  </select>
        </div>
    </fieldset>
    <div class="clr"> </div>
    
    <table class="adminlist">
        <thead>
            <tr>
                <th style="width: 20px;">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                </th>
                <th style="width: 20px;"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_ID', 'l.id', $listDirn , $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_TIME', 'time', $listDirn, $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_DAY', 'l.day', $listDirn, $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_CLASSROOM', 'classroom', $listDirn, $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_TEACHER', 'teacher', $listDirn, $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_LESSON', 'lesson', $listDirn, $listOrder); ?></th>
                <th class="title"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_SCHEDULES_CLASS', 'class', $listDirn, $listOrder); ?></th>
                <th style="width: 50px;"><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_PUBLISHED') ?></th>
                <th><?php echo JText::_('COM_SSCHEDULE_SCHEDULES_MODIFIED') ?> </th>
            </tr>
        </thead>       
        <tfoot>
            <tr>
                <td colspan="10"><?php echo $this->pagination->getListFooter(); ?></td>
            </tr>
        </tfoot>       
        <tbody>
            <?php
            foreach ($this->items as $i => $item) :
                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td class="center">
                        <?php if ($item->checked_out) : ?>
                            <?php echo JHtml::_('jgrid.checkedout', $i, $item->name, $item->checked_out_time, 'schedules.'); ?>
		        <?php endif; ?>
                       <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                    </td>
                    <td class="center"><?php echo $item->id; ?></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=time.edit&id=' . (int) $item->id); ?>"><?php echo $this->escape($item->time); ?></a></td>
                    <td class="center"><?php echo SscheduleHelperDay::getDayText($item->day); ?></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=classroom.edit&id=' . (int) $item->classroomid); ?>"><?php echo $this->escape($item->classroom); ?></a></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=teacher.edit&id=' . (int) $item->teacherid); ?>"><?php echo $this->escape($item->teacher); ?></a></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=lesson.edit&id=' . (int) $item->lessonid); ?>"><?php echo $this->escape($item->lesson); ?></a></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=class.edit&id=' . (int) $item->classid); ?>"><?php echo $this->escape($item->class); ?></a></td>
                    <td class="center"><?php echo JHtml::_('jgrid.published', $item->published, $i, 'schedules.'); ?></td>
                    <td class="center"><?php echo $item->modified; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    
    
    <div>
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
