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
$document = JFactory::getDocument();
$document->addScript(JURI::base() . 'media/com_sschedule/js/jquery-1.6.1.min.js');
$document->addScript(JURI::base() . 'media/com_sschedule/js/jquery-noconflict.js');
$document->addScript(JURI::base() . 'media/com_sschedule/js/sot.js');
?>
<div id="sotselect">
<h1><?php echo $this->params->get('titlehead'); ?></h1>
<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="searchForm">
<fieldset>
<div class="titleselect"><?php echo JText::_('COM_SSCHEDULE_SOT_SELECT_CLASS');?></div>
<table class="changes">
<tbody>
 <tr>
    <td><?php echo $this->form->getLabel('teacherid'); ?><?php echo $this->form->getInput('teacherid'); ?></td>
    <td><?php echo $this->form->getLabel('day'); ?><?php echo $this->form->getInput('day'); ?></td>
    <td>
     <button type="submit" id="submit"><?php echo JText::_('COM_SSCHEDULE_SOT_LABEL_SUBMIT'); ?></button>
    </td>
 </tr>
</tbody>
</table>
</fieldset>
<?php echo JHtml::_( 'form.token' ); ?>
</form>
</div>
<div id="dayid" style="display:none;"><?php echo $this->params->get('dayid'); ?></div>
<div id="teacherid" style="display:none;"><?php echo $this->params->get('teacherid'); ?></div>
<div id="scr" style="display:none;"><?php echo $this->params->get('scr');  ?></div>
<div id="scl" style="display:none;"><?php echo $this->params->get('scl');  ?></div>
<div id="soc_content">
<div>
