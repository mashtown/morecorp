/* ###--------------------------------------- Utility Functions -------------------------------------------### */

/**
 * Makes Bootstrap menu work on hover ( animated )
 */
$(document).ready(function () {
    // enableBootstrapMenuHover();
});
function enableBootstrapMenuHover() {
    var duration = 300;
    /* Dropdown animation duration */
    var nav = $('ul.nav'), items = nav.children('li.dropdown');
    loopMenuItems(items, duration);
    var subnav = $('ul.dropdown-menu'), subitems = subnav.children('li.dropdown-submenu');
    loopMenuItems(subitems, duration);
}
function loopMenuItems(items, duration) {
    if (!items.length || !duration) {
        return false;
    }
    items.each(function () {
        var item = $(this);
        var anchor = item.children('a');
        anchor.click(function () {
            return false;
        });
        item.hover(function () {
            var li = $(this);
            if (!li.hasClass('open')) {
                li.addClass('open');
            }
            li.children('ul.dropdown-menu').removeAttr('style').show().hide().stop(1, 0).slideToggle(duration);
        }, function () {
            var li = $(this);
            li.children('ul.dropdown-menu').removeAttr('style').hide().show().stop(1, 0).slideToggle(duration, function () {
                if (li.hasClass('open')) {
                    li.removeClass('open');
                }
            });
        });
    });
}

/**
 * Collapse Mobi menu on mobi exit ( larger than mobi ) and on nav link click
 */
$(document).ready(function () {
    if ($('div.navbar-collapse').length) {
        if (matchMedia('(min-width: 768px)').matches) {
            collapseMobiMenu();
        }
    }
});
$(window).resize(function () {
    if ($('div.navbar-collapse').length) {
        if (matchMedia('(min-width: 768px)').matches) {
            collapseMobiMenu();
        }
    }
});
$(document).ready(function () {
    collapseMobiMenuOnNavClick();
});
function collapseMobiMenu() {
    var navbar_collapse = $('div.navbar-collapse');
    var button_toggle = $('button.navbar-toggle');
    if (navbar_collapse.hasClass('in')) {
        navbar_collapse.removeClass('in').removeAttr('style');
        if (!navbar_collapse.hasClass('collapse')) {
            navbar_collapse.addClass('collapse');
        }
        if (!button_toggle.hasClass('collapsed')) {
            button_toggle.addClass('collapsed');
        }
    }
}
function collapseMobiMenuOnNavClick() {
    $('.nav a').on('click', function () {
        if (!$(this).hasClass('dropdown-toggle')) {
            if ($('.navbar-toggle').css('display') != 'none') {
                collapseMobiMenu();
            }
        }
    });
}

/* ###----------------------------------------------------------------------------------### */

/**
 * Custom Bootstrap File Selector
 * */
$(document).on("change", ".btn-file :file", function () {
    var e = $(this), t = e.get(0).files ? e.get(0).files.length : 1, n = e.val().replace(/\\/g, "/").replace(/\.*\//, "");
    e.trigger("fileselect", [t, n])
}), $(document).ready(function () {
    $("form").each(function () {
        var e = $(this), t = e.find('[data-toggle="buttons"] .btn input');
        t.each(function () {
            var e = $(this);
            e.data("initialState", e.prop("checked"))
        }), e.on("reset", function () {
            t.each(function () {
                var e = $(this), t = e.data("initialState");
                e.prop("checked", t).parent().toggleClass("active", t)
            })
        })
    }), $(".btn-file :file").on("fileselect", function (e, t, n) {
        n = "" != n ? n : "Browse...";
        var i = $(".btn-file").find(".result-text"), a = t > 1 ? t + " Files Selected" : n;
        i.length > 0 ? i.html(a) : a && alert(a)
    })
});

/* ###----------------------------------------------------------------------------------### */

/**
 * Number Fields
 * */
$(document).ready(function () {
    $('input[type="number"]').on('keyup keydown change focus blur', function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});