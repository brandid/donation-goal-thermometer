(function($) {
    $(function() {

        /* Set vars. */
        var the_el = $('.donation-goal-thermometer');
        var the_meter = $('.donation-goal-thermometer .meter');

        /* Get data vars */
        var donated = $(the_meter).data('donated');
        var goal = $(the_meter).data('goal');

        /* Create thermometer. */
        $(the_meter).thermometer();

        function heightResize() {
            var meter_height = $('.donation-goal-thermometer.vertical .thermometer-inner-v').outerHeight();
            var counter_height = $('.donation-goal-thermometer.vertical .vertical-donated-count').outerHeight();
            if ( counter_height !== meter_height ){
                $('.donation-goal-thermometer.vertical .vertical-donated-count').height(meter_height).fadeTo( "fast", 1.0 );;
            }
        }

        /* Add text inside the thermometer. */
        if ( $(the_el).hasClass( "vertical" ) ) {
            $('.donation-goal-thermometer.vertical .meter').append('<div class="vertical-donated-count"><span class="donated">$'+donated+'</span></div>');
            setTimeout(heightResize, 1000);
        } else {
            $('.donation-goal-thermometer .thermometer-inner').prepend('<span class="donated">$'+donated+'</span>');
        }


    });
})(jQuery);
