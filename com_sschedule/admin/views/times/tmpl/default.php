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
$saveOrder	= $listOrder == 'l.ordering';
?>
<form action="<?php echo JRoute::_('index.php?option=com_sschedule&view=times'); ?>" method="post" name="adminForm" id="adminForm">
    <fieldset id="filter-bar">
        <div class="filter-search fltlft">
            <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_SSCHEDULE_SEARCH_IN_TITLE'); ?>" />
            <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
            <button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
        </div>
        <div class="filter-select fltrt">
            <select name="filter_state" class="inputbox" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions', array('archived' => false, 'trash' => false)), 'value', 'text', $this->state->get('filter.state'), true); ?>
            </select>
        </div>
    </fieldset>
    <div class="clr"> </div>
    <table class="adminlist">
        <thead>
            <tr>
                <th></th>
                <th style="width: 20px;">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                </th>
                <th style="width: 20px;"><?php echo JHtml::_('grid.sort',  'COM_SSCHEDULE_TIMES_ID', 'l.id', $listDirn , $listOrder); ?></th>
                <th style="width: 200px;" class="title"><?php echo JHtml::_('grid.sort', 'COM_SSCHEDULE_TIMES_NAME', 'l.name', $listDirn, $listOrder); ?></th>
                <th style="width: 200px;">
                <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'l.ordering', $listDirn, $listOrder); ?>
                <?php if ($saveOrder) :?>
                        <?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'times.saveorder'); ?>
                <?php endif; ?>
                </th>
                <th style="width: 50px;"><?php echo JText::_('COM_SSCHEDULE_TIMES_PUBLISHED') ?></th>
                <th style="width: 200px;"><?php echo JText::_('COM_SSCHEDULE_TIMES_MODIFIED') ?> </th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="8"><?php echo $this->pagination->getListFooter(); ?></td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            foreach ($this->items as $i => $item) :
                $ordering	= ($listOrder == 'l.ordering');
                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td></td>
                    <td class="center"><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
                    <td class="center"><?php echo $item->id; ?></td>
                    <td class="center"><a href="<?php echo JRoute::_('index.php?option=com_sschedule&task=time.edit&id=' . (int) $item->id); ?>"><?php echo $this->escape($item->name); ?></a></td>
                    <td class="order">
                    <?php if ($saveOrder) :?>
                        <?php if ($listDirn == 'asc') : ?>
                                <span><?php echo $this->pagination->orderUpIcon($i, true, 'times.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'times.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                        <?php elseif ($listDirn == 'desc') : ?>
                                <span><?php echo $this->pagination->orderUpIcon($i, true, 'times.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
                                <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'times.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
                    <input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
		    </td>
                    <td class="center"><?php echo JHtml::_('jgrid.published', $item->published, $i, 'times.'); ?></td>
                    <td class="center"><?php echo $item->modified; ?></td>
                    <td></td>
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
