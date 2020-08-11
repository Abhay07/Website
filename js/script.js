$(document).ready(
    function() {
        $('li:first-child').click(
            function() {
                $("html, body").animate({ scrollTop: 0 }, 1000);
            });

        $('li:not(:nth-child(1)').click(
            function() {
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            });
    });