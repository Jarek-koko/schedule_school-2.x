<?php
/*
 * @package Joomla 1.7
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @module dayschool
 * @copyright Copyright (C) Klich Jarosław
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function() {
        
        jQuery.cookie = function(name, value, options) {
            if (typeof value != 'undefined') { // name and value given, set cookie
                options = options || {};
                if (value === null) {
                    value = '';
                    options.expires = -1;
                }
                var expires = '';
                if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                    var date;
                    if (typeof options.expires == 'number') {
                        date = new Date();
                        date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                    } else {
                        date = options.expires;
                    }
                    expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
                }
                // CAUTION: Needed to parenthesize options.path and options.domain
                // in the following expressions, otherwise they evaluate to undefined
                // in the packed version for some reason...
                var path = options.path ? '; path=' + (options.path) : '';
                var domain = options.domain ? '; domain=' + (options.domain) : '';
                var secure = options.secure ? '; secure' : '';
                document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
            } else { // only name given, get cookie
                var cookieValue = null;
                if (document.cookie && document.cookie != '') {
                    var cookies = document.cookie.split(';');
                    for (var i = 0; i < cookies.length; i++) {
                        var cookie = jQuery.trim(cookies[i]);
                        // Does this cookie string begin with the name we want?
                        if (cookie.substring(0, name.length + 1) == (name + '=')) {
                            cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                            break;
                        }
                    }
                }
                return cookieValue;
            }
        };
        
        nrday = new Date().getDay();
        jQuery("#classid").val(jQuery.cookie("selday"));
        getdata(nrday);
        
        jQuery("#mybutton").click(function(e){
            e.preventDefault();
            getdata();
            return false;
        });
        jQuery("#classid").change(function() {
            jQuery.cookie("selday", jQuery(this).val() , { expires: 7 });
        })
    });
    
    function BuildTable(data) {
        var table  = '<table id="tdata"><thead>';
        table += '<th class="nobg"><?php echo JText::_("MOD_MOD_SSCHEDULE_TITLE_I"); ?></th>';
        table += '<th><?php echo JText::_("MOD_MOD_SSCHEDULE_TITLE_TIME"); ?></th>';
        table += '<th><?php echo JText::_("MOD_MOD_SSCHEDULE_TITLE_LESSON"); ?></th>';
        table += '</thead><tbody>';
        var row = '';
        jQuery.each(data, function(i,item){
            row += '<tr><td>'+(i+1)+'</td><td>'+item.time+'</td><td>'+item.lesson+'</td></tr>';       
        });
        table += row;
        table += '</tbody></table>';
        jQuery('#daycontent').html(table);
    }
    
    
    function getdata(nrday){           
        if(typeof(nrday) != 'undefined') {
            jQuery('#dayid').find('option').each(function() {
                if(jQuery(this).val() == nrday){
                    jQuery("#dayid").val(nrday); 
                };
            });
        }
        jQuery("#daycontent").hide();   
        jQuery.getJSON('../index.php', {
            option: "com_sschedule",
            view: "soclist",
            tmpl: "component",
            format: "json",
            classid: jQuery("#classid").val(),
            dayid: jQuery("#dayid").val()
        }, function(data){
            if (data.length === 0) {
                jQuery('#daycontent').html('<div class="emptyd"><?php echo JText::_("MOD_MOD_SSCHEDULE_EMPTY_DATA"); ?></div>');
                jQuery("#daycontent").fadeIn("slow");
                return;
            }
            BuildTable(data);
            jQuery("#daycontent").fadeIn("slow");
        });
    }
    //]]>
</script>
<div id="dayschool"> 
    <div class="d1"><?php echo JHTML::_('select.genericlist', $list, 'classid', '', 'value', 'text'); ?></div>
    <div class="d2"><?php echo JHTML::_('select.genericlist', $listday, 'dayid', '', 'value', 'text'); ?></div>
    <div class="clr"></div>
    <div class="d3"><div id="mybutton"><?php echo JText::_('MOD_MOD_SSCHEDULE_OK_BUTTON'); ?></div></div>
    <div id="daycontent">   
    </div>
</div>
