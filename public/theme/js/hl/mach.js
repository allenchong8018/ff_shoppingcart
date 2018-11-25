$(function () {


    $(".contactUsInput").on("focus blur", function () {
        var gotValue = $(this).val();
        var next = $(this).next();
        if (gotValue == "") {
            if (next.is(":visible")) {
                next.hide();
            } else {
                next.show();
            }
        } else {
            next.hide();
        }
    });

    $(".placeholder").on("click", function () {
        if (!$(this).prev().is(":focus")) {
            $(this).prev().focus();
        }
    });

    $(".input").on("click", function () {
        if (!$(this).children().first().is(":focus")) {
            $(this).children().first().focus();
        }
    });


    $(".list-type-disclosure li:not('.active'), .list-type-disclosure li").click(function () {
        var tab = $(this).data("tab");
        $(".list-type-disclosure li.active, span[data-tab].active").removeClass("active");
        $("span[data-tab='" + tab + "']").addClass("active");

        $(this).addClass("active");
    });

});