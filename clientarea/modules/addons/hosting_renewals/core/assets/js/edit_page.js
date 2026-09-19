jQuery(function() {
    jQuery("#get_module_description").change(function() {
        val = $(this).val();
        jQuery.post(window.location.href, "ajax=1&submodule=" + val, function(data) {
            $("#module_description").html(data);
        });
    });

    jQuery("#bill_per_month_check").change(function() {
        if (jQuery(this).is(":checked"))
        {
            jQuery("#bill_per_days_value").attr("disabled", "disabled");
        }
        else
        {
            jQuery("#bill_per_days_value").removeAttr("disabled");

        }
    });

    jQuery(document).delegate("#check_all_cycles", 'change', function(e) {
        var that = jQuery(this);
        var cell = that.parents("td");

        if (jQuery(this).prop('checked')) {
            jQuery(cell).find("input").each(function() {
                jQuery(this).prop('checked', true);
            });
        } else {
            jQuery(cell).find("input").each(function() {
                jQuery(this).prop('checked', false);
            });
        }
    });

    jQuery(document).delegate('#all_to_off', 'click', function(e) {
        e.preventDefault();
        
        jQuery.post(window.location.href, {
            'do': 'change_all_status',
            'change_to': 'off'
        }, function(data) {
            if(data && data == 'success') {
                
                jQuery('.alert').css({visibility: 'visible'}).delay(5000).queue(function(next) {
                    $(this).css('visibility', 'hidden');
                    next();
                });
                jQuery('.alert').text(autoRenewalOFF);
            } else {
                showAlert(autoRenewalError, 'error', 5000);
            }
        });
    });

    jQuery(document).delegate('#all_to_on', 'click', function(e) {
        e.preventDefault();

        jQuery.post(window.location.href, {
            'do': 'change_all_status',
            'change_to': 'on'
        }, function(data) {
            if(data && data == 'success') {
                jQuery('.alert').css({visibility: 'visible'}).delay(5000).queue(function(next) {
                    $(this).css('visibility', 'hidden');
                    next();
                });
                jQuery('.alert').text(autoRenewalON);
            }else {
                showAlert(autoRenewalError, 'error', 5000);
            }
        });
    });

    function showAlert(msg, type, duration) {
        jQuery('.alert').switchClass('alert-success' ,'alert-' + type, 0).css({visibility: 'visible'}).delay(duration).queue(function(next) {
            jQuery(this).css('visibility', 'hidden').switchClass('alert-' + type, 'alert-success' , 0);
            next();
        });
        jQuery('.alert').text(msg);
    }

});

jQuery(function() {

    var message = jQuery('.alert');
    var messageOriginalY = message.offset().top;
    var isFixed = false;
    var $w = jQuery(window);
    $w.scroll(function() {
        var scrollTop = $w.scrollTop();
        var shouldBeFixed = scrollTop > messageOriginalY + 10;
        if (shouldBeFixed && !isFixed) {
            message.css({
                position: 'fixed',
                top: '10px',
                left: message.offset().left,
                width: message.width()
            });
            isFixed = true;
        }
        else if (!shouldBeFixed && isFixed)
        {
            message.css({
                position: 'static'
            });
            isFixed = false;
        }
    });
});