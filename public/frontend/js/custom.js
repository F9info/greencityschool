$(".mask_number").inputmask({ mask: "999-999-9999" });
$("form").parsley();
$(".letters-input").lettersOnly();
$(".numbers-input").numbersOnly();
function checkForInputFooter(element) {
    // element is passed to the function ^
    const $label = $(element).siblings(".all_forms .card .form-group label");
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
$(
    ".all_forms .card .form-group input.form-control, .all_forms .card .form-group textarea"
).each(function () {
    checkForInputFooter(this);
});
// The lines below (inside) are executed on change & keyup
$(
    ".all_forms .card .form-group input.form-control, .all_forms .card .form-group textarea"
).on("change keyup", function () {
    checkForInputFooter(this);
});
$(".select2").select2({
    allowClear: true,
});
$(".radio-group ul li input").on("click", function () {
    $(".grand-total").addClass("active");
});
$(window).on("load", function () {
    $(".form_fields .form-group input, .form_fields .form-group textarea").blur(
        function () {
            if ($(this).val()) {
                $(this).closest(".form-group").addClass("input-has-value");
            } else {
                $(this).closest(".form-group").removeClass("input-has-value");
            }
        }
    );
});
$(window).on("load", function () {
    var lastScroll = 0;
    var isScrolled = false;
    window.addEventListener("scroll", function () {
        var topHeader = document.querySelector("body");
        var currentScroll =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop ||
            0;
        var scrollDirection = currentScroll < lastScroll;
        var shouldToggle = isScrolled && scrollDirection;
        isScrolled = currentScroll > 100;
        topHeader.classList.toggle("body_sticky", shouldToggle);
        lastScroll = currentScroll;
    });
});
$(".edit_button").on("click", function () {
    $(this).removeClass("active");
    $("#member-profile-tab").removeClass("active");
    $("#edit-profile-tab").addClass("active");
});
$(".edit_button").on("click", function () {
    $(this).removeClass("active");
    $("#member-profile-tab").removeClass("active");
    $("#edit-profile-tab").addClass("active");
});
$(function () {
    $("body")
        .find(".event_lists .buttons .btn.btn-primary.fleft")
        .parents(".event_lists .buttons")
        .addClass("button_active");
});
//     $("body")
//         .find(".event_lists #register")
//         .parents(".event_lists .buttons")
//         .addClass("button_active");
// });
