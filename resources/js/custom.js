/** add active class and stay opened when selected */
var url = window.location;
// for sidebar menu entirely but not cover treeview
$("ul.nav-sidebar a")
    .filter(function () {
        return this.href == url;
    })
    .parent()
    .addClass("active");

// for treeview
$("ul.nav-treeview a")
    .filter(function () {
        return this.href == url;
    })
    .parentsUntil(".nav-sidebar > .nav-treeview")
    .addClass("active menu-open");

$("form").parsley();

$(".select2").select2({
    allowClear: true,
});

$(".letters-input").lettersOnly();
$(".numbers-input").numbersOnly();

$('input[type="file"]').on("change", function (e) {
    var fileName = e.target.files[0].name;
    $(this).next(".custom-file-label").html(fileName);
});

$(function () {
    $("#tablecontents").sortable({
        items: "tr",
        cursor: "move",
        opacity: 0.6,
        update: function () {
            sendOrderToServer($(".table-responsive").attr("id"));
        },
    });

    function sendOrderToServer(ajax_url) {
        var order = [];
        var token = $('meta[name="csrf-token"]').attr("content");
        $("tr.row1").each(function (index, element) {
            order.push({
                id: $(this).attr("data-id"),
                position: index + 1,
            });
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "http://127.0.0.1:8000/" + ajax_url,
            data: {
                order: order,
                _token: token,
            },
            success: function (response) {
                if (response.status == "success") {
                    console.log(response);
                } else {
                    console.log(response);
                }
            },
        });
    }
});

$(function () {
    $(".sidebar nav li.has-treeview").on("click", function (a) {
        $(".sidebar nav li").not(this).removeClass("side-menu-open");
        $(".sidebar nav li").parents("body").addClass("custom-width");
        $(this).addClass("side-menu-open");
        a.stopPropagation();
    });
    $(document).on("click", function (a) {
        if ($(a.target).is(".sidebar nav li.has-treeview") === false) {
            $(".sidebar nav li").not(this).removeClass("side-menu-open");
            $(".sidebar nav li").parents("body").removeClass("custom-width");
            $(this).addClass("side-menu-open");
        }
    });
});

$(function () {
    $(".hidecol").on("click", function () {
        var id = this.id;
        var splitid = id.split("_");
        var colno = splitid[1];
        var checked = true;

        // Checking Checkbox state
        if ($(this).is(":checked")) {
            checked = true;
        } else {
            checked = false;
        }
        setTimeout(function () {
            if (checked) {
                $(".column-settings-table td:nth-child(" + colno + ")").show();
                $(".column-settings-table th:nth-child(" + colno + ")").show();
            } else {
                $(".column-settings-table td:nth-child(" + colno + ")").hide();
                $(".column-settings-table th:nth-child(" + colno + ")").hide();
            }
            // Hiding column
        }, 100);
    });
});
$(function () {
    var checked = true;
    // Checkbox click
    $(".selectAll").on("click", function () {
        // Checking Checkbox state
        if ($(this).is(":checked")) {
            checked = true;
        } else {
            checked = false;
        }
        setTimeout(function () {
            if (checked) {
                $("body").find(".column-settings-table .selectClass").show();
                $(".dropdown-menu input[type='checkbox']").prop(
                    "checked",
                    true
                );
            } else {
                $("body").find(".column-settings-table .selectClass").hide();
                $(".dropdown-menu input[type='checkbox']").prop(
                    "checked",
                    false
                );
            }
            // Hiding column
        }, 100);
    });
});

window.Parsley.addValidator("maxFileSize", {
    validateString: function (_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
            alert(
                "You are making all developpers in the world cringe. Upgrade your browser!"
            );
            return true;
        }
        var files = parsleyInstance.$element[0].files;
        return files.length != 1 || files[0].size <= maxSize * 1024;
    },
    requirementType: "integer",
    messages: {
        en: "This file should not be larger than %s Kb",
        fr: "Ce fichier est plus grand que %s Kb.",
    },
});

window.ParsleyValidator.addValidator(
    "fileextension",
    function (value, requirement) {
        var fileExtension = value.split(".").pop();

        return fileExtension === requirement;
    },
    32
).addMessage("en", "fileextension", "Upload only csv file to import");

document
    .querySelectorAll('button[data-type="copy"]')
    .forEach(function (button) {
        button.addEventListener("click", function () {
            let slug = this.parentNode.parentNode.querySelector(
                'span[data-type="slug"]'
            ).innerText;

            let tmp = document.createElement("textarea");
            tmp.value = slug;
            tmp.setAttribute("readonly", "");
            tmp.style.position = "absolute";
            tmp.style.left = "-9999px";
            document.body.appendChild(tmp);
            tmp.select();
            document.execCommand("copy");
            document.body.removeChild(tmp);
            alert(`${slug} copied.`);
        });
    });

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
    function () {
        checkForInputFooter(this);
    }
);

// The lines below (inside) are executed on change & keyup
$(".animation-form input.form-control, .animation-form textarea").on(
    "change keyup",
    function () {
        checkForInputFooter(this);
    }
);

$(".ajax-popup-link").magnificPopup({
    type: "ajax",
    mainClass: "modal-style",
    midClick: true,
    closeOnBgClick: false,
});

import * as Sentry from "@sentry/browser";

Sentry.init({
  dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});
