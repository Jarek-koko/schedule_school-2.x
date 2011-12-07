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
        if (task == 'class.cancel' || document.formvalidator.isValid(document.id('class-form'))) {
            Joomla.submitform(task, document.getElementById('class-form'));
        }
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_sschedule&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="class-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_SSCHEDULE_CLASS_DETAILS'); ?></legend>
            <ul class="adminformlist">
                <li><?php echo $this->form->getLabel('name'); ?>
                    <?php echo $this->form->getInput('name'); ?></li>

                <li><?php echo $this->form->getLabel('published'); ?>
                    <?php echo $this->form->getInput('published'); ?></li>

                <li><?php echo $this->form->getLabel('modified'); ?>
                    <?php echo $this->form->getInput('modified'); ?></li>

                <li><?php echo $this->form->getLabel('id'); ?>
                    <?php echo $this->form->getInput('id'); ?></li>
            </ul>

            <div>
                <?php echo $this->form->getLabel('description'); ?>
                <div class="clr"></div>
                <?php echo $this->form->getInput('description'); ?>
            </div>
       </fieldset>
    </div>
    <div>
        <input type="hidden" name="task" value="class.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
