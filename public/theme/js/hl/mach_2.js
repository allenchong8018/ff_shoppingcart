
$("#productMenu").hover(function () {
    $(this).find("#s_dropmenu").stop().slideDown(300);
}, function () {
    $(this).find("#s_dropmenu").stop().slideUp(300);
});

$("#productMenu2").hover(function () {
    $(this).find("#s_dropmenu2").stop().slideDown(300);
}, function () {
    $(this).find("#s_dropmenu2").stop().slideUp(300);
});

$("#applynowMenu").hover(function () {
    $(this).find("a").addClass("activeApplyMenuBorder");
    $(this).find("#s_dropmenu2").stop().slideDown(300);
}, function () {
    $(this).find("a").removeClass("activeApplyMenuBorder");
    $(this).find("#s_dropmenu2").stop().slideUp(300);
});

$(".otherMenu").hover(function () {
    $(this).find("a").addClass("activeProductMenuBorder");
}, function () {
    $(this).find("a").removeClass("activeProductMenuBorder");
});

function clickProductMenu() {
    if (!$("#s_dropmenu").is(":visible")) {
        $("#s_dropmenu").stop().slideDown(500);
    } else {
        $("#s_dropmenu").stop().slideUp(500);
    }
}

function clickProductMenu2() {
    if (!$("#s_dropmenu2").is(":visible")) {
        $("#s_dropmenu2").stop().slideDown(500);
    } else {
        $("#s_dropmenu2").stop().slideUp(500);
    }
}

function clickApplyOnlineMenu() {
    if (!$("#s_dropmenu2").is(":visible")) {
        $("#s_dropmenu2").stop().slideDown(500);
    } else {
        $("#s_dropmenu2").stop().slideUp(500);
    }
}

function clickSlideProductMenu() {
    if (!$("#productSlideMenu").hasClass("open")) {
        $("#productSlideMenu").addClass("open").css({
            "border-width": "1px"
        });
    } else {
        $("#productSlideMenu").removeClass("open").css({
            "border-width": "0px"
        });
    }
}

function clickSlideApplyMenu() {
    if (!$("#applySlideMenu").hasClass("open")) {
        $("#applySlideMenu").addClass("open").css({
            "border-width": "1px"
        });
    } else {
        $("#applySlideMenu").removeClass("open").css({
            "border-width": "0px"
        });
    }
}

function toggleChatAllPage(mode, pIsWorkingHours) {
    var screenWidth = $(window).width();
    //s_toggle("#s_chatheaderid");
    $("#s_chatinnerdash").toggle();
    if (mode == "activateofflineleads") {
        if (!$("#s_headerdivagentinner").hasClass("s_chatfadeface")) {
            $("#s_headerdivagentinner").addClass("s_chatfadeface");
            $("#s_chatinnerdash").hide();
        }
    } else {
        //s_toggle("#s_chatcontainerid");
        s_toggle2("#s_chatcontainerid");
        $(".s_chatmessagecount").hide();
        if (pIsWorkingHours == true) {
            $("#s_headerdivagentinner").toggleClass("s_chatfadeface");
        }


        if (screenWidth < 767) {
            var s_chatheaderid = $("#s_chatheaderid");
            var s_chatheaderagentid = $("#s_chatheaderagentid");
//            s_chatheaderid.toggle();
            s_chatheaderagentid.toggle();


            // ---------------- FIX IOS
            var s_pagebody = $(".container");
            s_pagebody.toggle();
            var s_footercontainer = $("#s_footercontainer");
            s_footercontainer.toggle();


        }


    }
    $("#s_chatinitid").hide();

}

function browserNewPage(nextUrl) {
    window.location.assign(nextUrl);
}
function isNull(str) {
    if (str === undefined) {
        return true;
    } else {
        str = str.toString().trim();
        return (!str || 0 === str.length);
    }
}
function setUndefined(input) {
    if (input === undefined || input == null) {
        input = "";
    }
    return input;
}
function browserNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
}
function browserBack() {
    window.history.back();
}
function isInt(value) {
    return !isNaN(value) &&
            parseInt(Number(value)) == value &&
            !isNaN(parseInt(value, 10));
}
function isValidEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function s_toggle(toggleID) {
    $(toggleID).slideToggle(500, 'linear');
}

function s_toggle2(toggleID) {
    $(toggleID).fadeToggle(300);
}

function withLineBreak(input) {
    input.replace(/(?:\r\n|\r|\n)/g, '<br />');
    return input;
}

function isFound(input, searched) {
    var output = false;
    if (input.toString().indexOf(searched) != -1) {
        output = true;
    }
    return output;
}

function getContentAndSetTarget(theUrl) {
    var htmlOutput = "";
    $.ajax({
        url: theUrl, //machchat/getDisplayDateTime
        type: 'GET',
        contentType: false,
        cache: false,
        processData: false,
        success: function (output) {
            htmlOutput = output;
            $("#s_chattheme").html(htmlOutput);
        }
    });
}