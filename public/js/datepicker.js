$(function () {
  $(".datepicker").datepicker({
    changeMonth: true,
    changeYear: false,
    showButtonPanel: true,
    dateFormat: "M-dd",
    todayBtn: false,
    todayHighlight: true,
    beforeShow: function (inst, elem) {
      setCalsClearButton(null, null, elem);
    },
    onChangeMonthYear: setCalsClearButton,
  });

  $(".dateyear").datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "M-dd-yy",
    todayBtn: false,
    todayHighlight: true,
    beforeShow: function (inst, elem) {
      setCalsClearButton(null, null, elem);
    },
    onChangeMonthYear: setCalsClearButton,
  });

  $("#yeardatepicker").datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: "M-dd-yy",
    todayBtn: false,
    todayHighlight: true,
    beforeShow: function (inst, elem) {
      setCalsClearButton(null, null, elem);
    },
    onChangeMonthYear: setCalsClearButton,
  });

  $(".date").datepicker({
    dateFormat: "mm-dd-yy",
  });

  var setCalsClearButton = function (year, month, elem) {
    var afterShow = (function () {
      var d = new $.Deferred();
      var cnt = 0;
      setTimeout(function () {
        if (elem.dpDiv[0].style.display === "block") {
          d.resolve();
        }
        if (cnt >= 500) {
          d.reject("datepicker show timeout");
        }
        cnt++;
      }, 10);
      return d.promise();
    })();
    afterShow.done(function () {
      $(".ui-datepicker").css("z-index", 2000);
      var buttonPane = $(elem)
        .datepicker("widget")
        .find(".ui-datepicker-buttonpane");
      var btn = $(
        '<button class="ui-datepicker-current ui-state-default ui-priority-primary ui-corner-all" type="button">Clear</button>'
      );
      btn.off("click").on("click", function () {
        $.datepicker._clearDate(elem.input[0]);
      });
      btn.appendTo(buttonPane);
    });
  };
});

// I think not use this datepicker madam please check and delete it

// // var dateFormat = "mm/dd/yy",
// //     from = $(".event_start_date")
// //         .datepicker({
// //             minDate: 0,
// //             changeMonth: true,
// //             numberOfMonths: 1,
// //             showButtonPanel: true,
// //             beforeShow: function (inst, elem) {
// //                 setCalsClearButton(null, null, elem);
// //             },
// //             onChangeMonthYear: setCalsClearButton,
// //         })
// //         .on("change", function () {
// //             to.datepicker("option", "minDate", getDate(this));
// //         }),
// //     to = $(".event_end_date")
// //         .datepicker({
// //             minDate: 0,
// //             changeMonth: true,
// //             numberOfMonths: 1,
// //         })
// //         .on("change", function () {
// //             from.datepicker("option", "maxDate", getDate(this));
// //         });

// var dateFormat = "mm/dd/yy",
//     from = $(".reg_start_date")
//         .datepicker({
//             minDate: 0,
//             changeMonth: true,
//             numberOfMonths: 1,
//             showButtonPanel: true,
//             beforeShow: function (inst, elem) {
//                 setCalsClearButton(null, null, elem);
//             },
//             onChangeMonthYear: setCalsClearButton,
//         })
//         .on("change", function () {
//             to.datepicker("option", "minDate", getDate(this));
//         }),
//     to = $(".reg_end_date")
//         .datepicker({
//             minDate: 0,
//             changeMonth: true,
//             numberOfMonths: 1,
//         })
//         .on("change", function () {
//             from.datepicker("option", "maxDate", getDate(this));
//         });

// function getDate(element) {
//     var date;
//     try {
//         date = $.datepicker.parseDate(dateFormat, element.value);
//     } catch (error) {
//         date = null;
//     }

//     return date;
// }
// });
