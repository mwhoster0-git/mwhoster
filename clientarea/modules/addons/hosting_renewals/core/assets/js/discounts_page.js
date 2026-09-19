
if (jQuery("select.select2").length > 0) {
    jQuery("select.select2").each(function() {
        jQuery(this).select2();
    });
}


var rule = {};

jQuery('#ruletype').on("change", function(e) {

    var $this = jQuery(this);

    var type = e.val;

    if (type === '-')
        return;

    rule.itemstype = type;

    jQuery('#ruleproduct').val('');
    jQuery('#s2id_ruleproduct > ul.select2-choices > li.select2-search-choice').remove();

    jQuery('select#ruleproduct option').each(function() {
        jQuery(this).remove();
    });

    jQuery.post('addonmodules.php?module=hosting_renewals&modpage=discounts&majax=1', {
        'do': 'loadproducts',
        'type': type
    }, function(data) {
        if (data) {
            var obj = JSON.parse(data);
            if (obj) {
                var select = '';
                jQuery.each(obj, function(k, v) {
                    select += '<option value="' + v.id + '">' + v.name + '</option>';
                });

                jQuery(select).appendTo(jQuery('#ruleproduct'));
                jQuery('#ruleproduct').attr('placeholder', selectLang + ' ' + (type === 'product' ? productLang : groupLang));
                jQuery(jQuery('#ruleproduct').parent('td')).css({"visibility" :"visible"});
            }
        }
    });
});

jQuery('div.inner').on('change', '#ruleproduct', function(e) {

    var $this = jQuery(this);

    var items = $this.val();

    if (items === '-')
        return;

    rule.items = items;

    jQuery("#rulefromcycle").parent('td').css({"visibility" :"visible"});
});

jQuery('div.inner').on('change', '#rulefromcycle', function(e) {

    var $this = jQuery(this);

    var cycle = $this.val();

    if (cycle === '-')
        return;

    rule.cyclefrom = cycle;

    jQuery("#ruletocycle").parent('td').css({"visibility" :"visible"});
});

jQuery('div.inner').on('change', '#ruletocycle', function(e) {

    var $this = jQuery(this);

    var cycle = $this.val();

    if (cycle === '-')
        return;

    rule.cycleto = cycle;

    jQuery("#rulerectype").parent('td').css({"visibility" :"visible"});
});

jQuery('div.inner').on('change', '#rulerectype', function(e) {

    var $this = jQuery(this);

    var rectype = $this.val();

    if (rectype === '-')
        return;

    rule.rectype = rectype;

    jQuery("#rulevaltype").parent('td').css({"visibility" :"visible"});
});

jQuery('div.inner').on('change', '#rulevaltype', function(e) {

    var $this = jQuery(this);

    var valtype = $this.val();

    if (valtype === '-')
        return;

    rule.valtype = valtype;

    jQuery("#rulediscount").parent('td').css({"visibility" :"visible"});
    jQuery("#ruleadd").parent('td').css({"visibility" :"visible"});
});

jQuery('div.inner').on('change', '#rulediscount', function(e) {

    var $this = jQuery(this);
    var val = $this.val();

    if (val === '')
        return;


    val = (val.toString()).replace(/\,/g, '.');
    
    if (rule.valtype == 'percentage') {
        if (!checkPercentage(val)) {
            rule.discount = 0;
            return;
        }
    } else if (rule.valtype == 'fixed') {
        if (!checkAmount(val)) {
            rule.discount = 0;
            return;
        }
    }
    rule.discount = val;
});

jQuery('div.inner').on('click', '#ruleadd', function(e) {
    e.preventDefault();

    if (rule.discount !== 0 && rule.discount !== '') {
        jQuery.post('addonmodules.php?module=hosting_renewals&modpage=discounts&majax=1', {
            'do': 'saverule',
            'rule': rule
        }, function(data) {
            if (data !== 'error') {

                if (jQuery('#norows').length > 0) {
                    jQuery('#norows').remove();
                }
                jQuery("#rulestable > tbody").append(data);

                jQuery('.alert').switchClass('alert-error', 'alert-success').css({visibility: 'visible'}).delay(5000).queue(function(next) {
                    jQuery(this).css('visibility', 'hidden');
                    next();
                });
                jQuery('.alert').text(ruleAddedConfirmationLang);
            } else {
                jQuery('.alert').switchClass('alert-success', 'alert-error').css({visibility: 'visible'}).delay(5000).queue(function(next) {
                    jQuery(this).css('visibility', 'hidden');
                    next();
                });
                jQuery('.alert').text(errorLang);
            }
            rule = {};

            jQuery('#ruletype').val('');
            jQuery('#ruleproduct').val('');
            jQuery('#s2id_ruleproduct > ul.select2-choices > li.select2-search-choice').remove();
            jQuery("#rulefromcycle").val('');
            jQuery('#s2id_rulefromcycle > ul.select2-choices > li.select2-search-choice').remove();
            jQuery("#ruletocycle").val('');
            jQuery("#rulerectype").val('');
            jQuery("#rulevaltype").val('');
            jQuery("#rulediscount").val('');
            jQuery("#ruleadd").val('');

            jQuery('#ruleproduct').parent().css({visibility: 'collapse'});
            jQuery("#rulefromcycle").parent().css({visibility: 'collapse'});
            jQuery("#ruletocycle").parent().css({visibility: 'collapse'});
            jQuery("#rulerectype").parent().css({visibility: 'collapse'});
            jQuery("#rulevaltype").parent().css({visibility: 'collapse'});
            jQuery("#rulediscount").parent().css({visibility: 'collapse'});
            jQuery("#ruleadd").parent().css({visibility: 'collapse'});
        });
    } else {
        jQuery('.alert').switchClass('alert-success', 'alert-error').css({visibility: 'visible'}).delay(5000).queue(function(next) {
            jQuery(this).css('visibility', 'hidden');
            next();
        });
        jQuery('.alert').text(discountValidationLang);
    }
});

jQuery('div.inner').on('click', '.ruledelete', function(e) {
    e.preventDefault();

    var $this = jQuery(this);
    var row = $this.parents('tr');

    var ruleid = jQuery(row.find(".ruleid")).val();

    if (confirm(deleteDiscountConfirmationLang)) {

        jQuery.post('addonmodules.php?module=hosting_renewals&modpage=discounts&majax=1', {
            'do': 'delrule',
            'ruleid': ruleid
        }, function(data) {

            jQuery(row).remove();

            if (jQuery("#rulestable > tbody > tr").length < 1) {
                jQuery("#rulestable > tbody").append('<tr><td id="norows" colspan="6"><p style="text-align: center;">' + noRuleFoundLang + '</p></td></tr>');
            }

            jQuery('.alert').switchClass('alert-error', 'alert-success').css({visibility: 'visible'}).delay(5000).queue(function(next) {
                jQuery(this).css('visibility', 'hidden');
                next();
            });
            jQuery('.alert').text(RuleDeletedConfirmationLang);
        });
    }
});


function checkPercentage(val) {


    if (!val.match(/^[-+]?[0-9]+[.]?[0-9]*([eE][-+]?[0-9]+)?$/))
        return false;

    val = parseFloat(val);
    
    if (val > 100 || val < 0)
        return false;

    return true;
}

function checkAmount(val) {
    if (!val.match(/^[-+]?[0-9]+[.]?[0-9]*([eE][-+]?[0-9]+)?$/))
        return false;

    return true;
}
