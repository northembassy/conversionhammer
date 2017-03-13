
jQuery(document).ready(function ($) {
    console.log('ConversionHammer');
    var callWasSchedueled = false;
    // Select2
    $('select').select2({
        minimumResultsForSearch: Infinity 
    });
    // Sidebar panel show hours schedueler
    $('#igsidebar_content_sub_callme a').on('click', function (e) {
        e.preventDefault();
        $('#igsidebar_content_sub_schedule, #igsidebar_content_welcome').toggle();
        callWasSchedueled = true;
    });
    // Sidebar panel close
    $('#igsidebar_content_close a').on('click', function (e) {
        e.preventDefault();
        $('#igsidebar').css({'right': '0px'}).animate({
            'right': '-310px'
        }, 800);
        // Mobile excluded
        //$('#call_igsidebar a, #call_igsidebar_mobile a').show('slow');
        $('#call_igsidebar a').show('slow');
    });
    // Sidebar panel show and hide button that has been clicked
    // Mobile excluded
    //$('#call_igsidebar a, #call_igsidebar_mobile a').on('click', function(e) {
    $('#call_igsidebar a').on('click', function (e) {
        e.preventDefault();
        $(this).hide('slow');
        $('#igsidebar').css({'right': '-310px'}).animate({
            'right': '0'
        }, 250);
    });
    // Sidebar panel sending the form
    $('#igsidebar_content_sub_callme button').on('click', function (e) {
        e.preventDefault();
        // EmailJS
        var neNumber = $("#igsidebar_content_sub_callme input").val();
        var neDay = $("#igsidebar_content_sub_schedule_block_day select").val();
        var neTimeOfDay = $("#igsidebar_content_sub_schedule_block_time select").val();
        var neCallUp = ("CALL NOW");
        var email = $("#igsidebar_content_sub_mail_email").val();
        var url = window.location.href;

        if ($(email).val()) {
            // section8
        } else {
            if (neNumber.match(/\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}/)) {
                if (callWasSchedueled == true) {
                    $.ajax({
                        type: "POST",
                        url: conversionhammer_ajax.ajax_url,
                        datatype: "html",
                        data: {
                            'action': 'conversionhammer_mail',
                            'number': neNumber,
                            'day': neDay,
                            'time': neTimeOfDay,
                            'url': url
                        },
                        success: function (data) {
                            console.log("ConversionHammer SUCCESS.");
                        }, error: function (data) {
                            console.log("ConversionHammer ERROR.");
                        }
                    });
                } else {

                    var data = {
                        'action': 'conversionhammer_mail',
                        'number': neNumber,
                        'callup': neCallUp,
                        'url': url,
                    };
                    $.post(conversionhammer_ajax.ajax_url, data, function (response) {
                        console.log("ConversionHammer SUCCESS.");
                    });

                }

                $('#igsidebar_content_sub, #igsidebar_content_welcome').hide();
                $('#igsidebar_content_thanks').show();
                $('#igsidebar').css({'right': '0px'}).delay(800).animate({
                    'right': '-310px'
                }, 800);
                // Mobile excluded
                //$('#call_igsidebar a, #call_igsidebar_mobile a').delay( 1500 ).show('slow');
                $('#call_igsidebar a').delay(1500).show('slow');
            } else {
                $("#igsidebar_content_sub_callme input").css({'border': '4px solid #ff4c4c', 'background': '#004ab2'});
            }
        }
    });
});