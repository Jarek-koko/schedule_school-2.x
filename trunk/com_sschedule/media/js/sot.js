jQuery(document).ready(function() {
     jQuery("#jform_teacherid").val(jQuery("#teacherid").text());
     jQuery("#jform_day").val(jQuery("#dayid").text());
     jQuery.ajax({
            url: "../index.php?option=com_sschedule&view=sotlist&tmpl=component",
            cache: false,
            data: {teacherid : jQuery("#teacherid").text() , dayid: jQuery("#dayid").text(), scr : jQuery("#scr").text() , scl: jQuery("#scl").text()},
            success: function(html){
                jQuery("#soc_content").hide();
                jQuery("#soc_content").html(html);
                jQuery("#soc_content").fadeIn("slow");
            }
        });
    
    jQuery("#submit").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            url: "../index.php?option=com_sschedule&view=sotlist&tmpl=component",
            cache: false,
            data: {teacherid : jQuery("#jform_teacherid").val(), dayid: jQuery("#jform_day").val() , scr : jQuery("#scr").text() , scl: jQuery("#scl").text()},
            success: function(html){
                jQuery("#soc_content").hide();
                jQuery("#soc_content").html(html);
                jQuery("#soc_content").fadeIn("slow");
            }
        });
        return false;
    });
});