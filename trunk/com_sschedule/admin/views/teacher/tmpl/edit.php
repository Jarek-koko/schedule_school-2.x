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
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'teacher.cancel' || document.formvalidator.isValid(document.id('teacher-form'))) {
            Joomla.submitform(task, document.getElementById('teacher-form'));
        }
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_sschedule&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="teacher-form" class="form-validate">
<div class="width-60 fltlft">
    <fieldset class="adminform">
        <legend><?php echo JText::_('COM_SSCHEDULE_TEACHER_DETAILS'); ?></legend>
        <ul class="adminformlist">
        <?php foreach ($this->form->getFieldset('details') as $field): ?>
            <li><?php echo $field->label;echo $field->input; ?></li>
        <?php endforeach; ?>
        </ul>
        <div class="clr"></div>
        <?php echo $this->form->getLabel('description'); ?>
        <div class="clr"></div>
        <?php echo $this->form->getInput('description'); ?>
    </fieldset>
</div>
<div class="width-40 fltrt">
   <fieldset class="adminform">
     <legend><?php echo JText::_('COM_SSCHEDULE_TEACHER_OPTIONAL'); ?></legend>
    <ul class="adminformlist">
        <?php foreach ($this->form->getFieldset('optional') as $field): ?>
        <li><?php echo $field->label; echo $field->input; ?></li>
        <?php endforeach ?>
    </ul>
  </fieldset>
</div>
<div>
    <input type="hidden" name="task" value="teacher.edit" />
    <?php echo JHtml::_('form.token'); ?>
</div>
</form>
