<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("form").parsley();





        function checkForInputFooter(element) {
            // element is passed to the function ^

            const $label = $(element).siblings(".animation-form label");

            var $element = $(element);
            if ($element.val().length > 0) {
                $label.parents(".form-group").addClass("input-has-value");
                $element.closest(".animation-form form").addClass("input-has-value");
            } else {
                $label.parents(".form-group").removeClass("input-has-value");
                $element.closest(".animation-form form").removeClass("input-has-value");
            }
        }

        // The lines below are executed on page load
        $(".animation-form input.form-control, .animation-form textarea").each(
            function() {
                checkForInputFooter(this);
            }
        );

        // The lines below (inside) are executed on change & keyup
        $(".animation-form input.form-control, .animation-form textarea").on(
            "change keyup",
            function() {
                checkForInputFooter(this);
            }
        );


        $(function() {
            $('body').find('.popup_input').parents('.mfp-content').addClass('popup-input-section');
        });



    });
</script>
