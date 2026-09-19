(function(jQuery) {

    jQuery(document).delegate("#add_template", "click", function(e) {
        e.preventDefault();
        jQuery("#add_template_div").toggle();
    });

    jQuery(document).delegate("#cancel_add_template", "click", function(e) {
        e.preventDefault();
        jQuery("#add_template_div").hide();
    });

    jQuery(document).delegate("#add_template_btn", "click", function(e) {
        e.preventDefault();

        var template = jQuery("#new_template_select").val();
        var template_name = jQuery("#new_template_select").find(":selected").text();

        if (template !== '' && template != null) {

            jQuery.post("addonmodules.php?module=hosting_renewals&modpage=templates_mange", {
                'do': 'add_template',
                'template': template
            }, function(data) {
                if (data === 'success') {
                    jQuery("#new_template_select").find("option[value='" + template + "']").remove();

                    var append_str = '<div style="margin: 10px; padding: 10px 20px;" class="emailtplstandard">' +
                            '<input type="hidden" id="template_id" value="' + template + '" />' +
                            '<a id="template_name" href="configemailtemplates.php?action=edit&id=' + template + '"><img border="0" align="absmiddle" alt="Edit" src="images/icons/massmail.png"> ' +
                            template_name +
                            '</a><a style="float: right; margin:  0 0 5px 0;" id="delete_template" href="#"><img border="0" alt="Delete" src="images/delete.gif">' +
                            '</a></div>';
                    jQuery("#templates_holder").append(append_str);
                }
            });
        } else {
            alert(emptyTemplateErrorLang);
        }
    });

    jQuery(document).delegate("#delete_template", "click", function(e) {
        e.preventDefault();

        var div = jQuery(this).parent('div');
        var template = div.find("#template_id").val();
        var template_name = div.find("a#template_name").text();

        if (confirm(deleteConfirmationLang + " '" + template_name + "' " + templateLang + "?"))
            jQuery.post("addonmodules.php?module=hosting_renewals&modpage=templates_mange", {
                'do': 'remov_template',
                'template': template
            }, function(data) {
                if (data !== '') {
                    div.remove();
                    if(!jQuery("#new_template_select").is("visible")){
                        jQuery("#new_template_select").show();
                        jQuery("#add_template_btn").show();
                    }
                    jQuery("#new_template_select").append('<option value="' + template + '">' + template_name + '</option>');
                }
            });
    });
//    
//    jQuery(document).delegate("#create_new_template", "click", function(e){
//        e.preventDefault();
//        
//        var token = jQuery("input[name='token']").val();
//        
//        window.location = "configemailtemplates.php?action=new&tocken=" + token;
//    });

})(jQuery);
