jQuery(document).ready(function() {
     jQuery("#jform_classid").val(jQuery("#classid").text());
     jQuery("#jform_day").val(jQuery("#dayid").text());
     jQuery.ajax({
            url: "../index.php?option=com_sschedule&view=soclist&tmpl=component",
            cache: false,
            data: {classid : jQuery("#classid").text() , dayid: jQuery("#dayid").text(), sc : jQuery("#sc").text() , st: jQuery("#st").text()},
            success: function(html){
                jQuery("#soc_content").hide();
                jQuery("#soc_content").html(html);
                jQuery("#soc_content").fadeIn("slow");
            }
        });
    
    jQuery("#submit").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            url: "../index.php?option=com_sschedule&view=soclist&tmpl=component",
            cache: false,
            data: {classid : jQuery("#jform_classid").val(), dayid: jQuery("#jform_day").val() , sc : jQuery("#sc").text() , st: jQuery("#st").text()},
            success: function(html){
                jQuery("#soc_content").hide();
                jQuery("#soc_content").html(html);
                jQuery("#soc_content").fadeIn("slow");
            }
        });
        return false;
    });
});