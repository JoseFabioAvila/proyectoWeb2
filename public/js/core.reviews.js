jQuery(document).ready(function() {
    BESTDEALS_GLOBALS.reviews_user_accepted = false;
    bestdeals_add_hidden_elements_handler("init_reviews", bestdeals_init_reviews);
    bestdeals_init_reviews(jQuery("body"))
});

function bestdeals_init_reviews(a) {
    a.find(".reviews_editable .reviews_slider:not(.inited)").each(function() {
        if (typeof(BESTDEALS_GLOBALS.reviews_allow_user_marks) == "undefined" || !BESTDEALS_GLOBALS.reviews_allow_user_marks) {
            return
        }
        if (jQuery(this).parents("div:hidden,article:hidden").length > 0) {
            return
        }
        jQuery(this).addClass("inited");
        var j = jQuery(this).parents(".reviews_item");
        var d = jQuery(this).parents(".reviews_stars_wrap");
        var c = 0;
        var h = parseInt(j.data("max-level"));
        var g = parseFloat(j.data("step"));
        var e = Math.pow(10, g.toString().indexOf(".") < 0 ? 0 : g.toString().length - g.toString().indexOf(".") - 1);
        var b = Math.max(1, (d.width() - jQuery(this).width()) / (h - c) / e);
        var f = parseFloat(j.find('input[type="hidden"]').val());
        var i = Math.round((f - c) * (d.width() - jQuery(this).width()) / (h - c));
        bestdeals_reviews_set_current_mark(j, f, i, false);
        jQuery(this).draggable({
            axis: "x",
            grid: [b, b],
            containment: ".reviews_stars_wrap",
            scroll: false,
            drag: function(l, k) {
                var n = k.position.left >= 0 ? k.position.left : k.originalPosition.left + k.offset.left;
                var m = Math.min(h, Math.max(c, Math.round(n * e * (h - c) / (d.width() - jQuery(this).width())) / e + c));
                bestdeals_reviews_set_current_mark(j, m)
            }
        })
    });
    a.find(".reviews_editor .reviews_editable .reviews_stars_wrap:not(.inited),.reviews_editor .reviews_max_level_100 .reviews_criteria:not(.inited)").each(function() {
        if (jQuery(this).parents("div:hidden,article:hidden").length > 0) {
            return
        }
        jQuery(this).addClass("inited");
        jQuery(this).on('click', function(k) {
            if (typeof(BESTDEALS_GLOBALS.reviews_allow_user_marks) == "undefined" || !BESTDEALS_GLOBALS.reviews_allow_user_marks) {
                return
            }
            if (jQuery(this).hasClass("reviews_criteria") && !jQuery(this).next().hasClass("reviews_editable")) {
                return
            }
            var d = jQuery(this).hasClass("reviews_criteria") ? jQuery(this).next() : jQuery(this);
            var m = d.parents(".reviews_item");
            var l = d.width() - d.find(".reviews_slider").width();
            var c = 0;
            var j = parseInt(m.data("max-level"));
            var i = parseFloat(m.data("step"));
            var f = Math.pow(10, i.toString().indexOf(".") < 0 ? 0 : i.toString().length - i.toString().indexOf(".") - 1);
            var b = l / (j - c + 1) / i;
            var h = k.pageX - d.offset().left;
            if (h <= 1) {
                h = 0
            }
            if (h > l) {
                h = l
            }
            var g = Math.min(j, Math.max(c, Math.round(h * f * (j - c) / l) / f + c));
            bestdeals_reviews_set_current_mark(m, g, h)
        })
    });
    a.find(".reviews_accept:not(.inited)").each(function() {
        if (jQuery(this).parents("div:hidden,article:hidden").length > 0) {
            return
        }
        jQuery(this).addClass("inited");
        jQuery(this).find("a").on('click', function(d) {
            if (typeof(BESTDEALS_GLOBALS.reviews_allow_user_marks) == "undefined" || !BESTDEALS_GLOBALS.reviews_allow_user_marks) {
                return
            }
            var f = 0;
            var g = 0;
            var c = jQuery(this).parents(".reviews_accept");
            var b = c.siblings(".reviews_editor");
            b.find('input[type="hidden"]').each(function(e) {
                var j = jQuery(this).parents(".reviews_item");
                var i = parseFloat(j.data("step"));
                var h = Math.pow(10, i.toString().indexOf(".") < 0 ? 0 : i.toString().length - i.toString().indexOf(".") - 1);
                var k = parseFloat(jQuery(this).val());
                if (isNaN(k)) {
                    k = 0
                }
                BESTDEALS_GLOBALS.reviews_marks[e] = Math.round(((BESTDEALS_GLOBALS.reviews_marks.length > e && BESTDEALS_GLOBALS.reviews_marks[e] != "" ? parseFloat(BESTDEALS_GLOBALS.reviews_marks[e]) * BESTDEALS_GLOBALS.reviews_users : 0) + k) / (BESTDEALS_GLOBALS.reviews_users + 1) * h) / h;
                jQuery(this).val(BESTDEALS_GLOBALS.reviews_marks[e]);
                f++;
                g += k
            });
            if (g > 0) {
                if (BESTDEALS_GLOBALS.reviews_marks.length > f) {
                    BESTDEALS_GLOBALS.reviews_marks = BESTDEALS_GLOBALS.reviews_marks.splice(f, BESTDEALS_GLOBALS.reviews_marks.length - f)
                }
                BESTDEALS_GLOBALS.reviews_users++;
                c.fadeOut();
                jQuery.post(BESTDEALS_GLOBALS.ajax_url, {
                    action: "reviews_users_accept",
                    nonce: BESTDEALS_GLOBALS.ajax_nonce,
                    post_id: BESTDEALS_GLOBALS.post_id,
                    marks: BESTDEALS_GLOBALS.reviews_marks.join(","),
                    users: BESTDEALS_GLOBALS.reviews_users
                }).done(function(e) {
                    var h = JSON.parse(e);
                    if (h.error === "") {
                        BESTDEALS_GLOBALS.reviews_allow_user_marks = false;
                        bestdeals_set_cookie("bestdeals_votes", BESTDEALS_GLOBALS.reviews_vote + (BESTDEALS_GLOBALS.reviews_vote.substr(-1) != "," ? "," : "") + BESTDEALS_GLOBALS.post_id + ",", 365);
                        b.find(".reviews_item").each(function(i) {
                            jQuery(this).data("mark", BESTDEALS_GLOBALS.reviews_marks[i]).find('input[type="hidden"]').val(BESTDEALS_GLOBALS.reviews_marks[i]).end().find(".reviews_value").html(BESTDEALS_GLOBALS.reviews_marks[i]).end().find(".reviews_stars_hover").css("width", Math.round(BESTDEALS_GLOBALS.reviews_marks[i] / BESTDEALS_GLOBALS.reviews_max_level * 100) + "%")
                        });
                        bestdeals_reviews_set_average_mark(b);
                        b.find(".reviews_stars").removeClass("reviews_editable");
                        b.siblings(".reviews_summary").find(".reviews_criteria").html(BESTDEALS_GLOBALS.strings["reviews_vote"])
                    } else {
                        b.siblings(".reviews_summary").find(".reviews_criteria").html(BESTDEALS_GLOBALS.strings["reviews_error"])
                    }
                })
            }
            d.preventDefault();
            return false
        })
    })
}

function bestdeals_reviews_set_current_mark(e, d) {
    var b = arguments[2] != undefined ? arguments[2] : -1;
    var a = arguments[3] != undefined ? arguments[3] : true;
    var f = 0;
    var c = parseInt(e.data("max-level"));
    e.find(".reviews_value").html(d);
    e.find('input[type="hidden"]').val(d).trigger("change");
    e.find(".reviews_stars_hover").css("width", Math.round(e.find(".reviews_stars_bg").width() * d / (c - f)) + "px");
    if (b >= 0) {
        e.find(".reviews_slider").css("left", b + "px")
    }
    if (!BESTDEALS_GLOBALS.admin_mode && !BESTDEALS_GLOBALS.reviews_user_accepted && a) {
        BESTDEALS_GLOBALS.reviews_user_accepted = true;
        e.siblings(".reviews_item").each(function() {
            jQuery(this).find(".reviews_stars_hover").css("width", 0);
            jQuery(this).find(".reviews_value").html("0");
            jQuery(this).find(".reviews_slider").css("left", 0);
            jQuery(this).find('input[type="hidden"]').val("0")
        });
        e.parent().next().fadeIn()
    }
    bestdeals_reviews_set_average_mark(e.parents(".reviews_editor"))
}

function bestdeals_reviews_set_average_mark(g) {
    var f = 0;
    var c = 0;
    var h = 0;
    var e = parseInt(g.find(".reviews_item").eq(0).data("max-level"));
    var d = parseFloat(g.find(".reviews_item").eq(0).data("step"));
    var b = Math.pow(10, d.toString().indexOf(".") < 0 ? 0 : d.toString().length - d.toString().indexOf(".") - 1);
    g.find('input[type="hidden"]').each(function() {
        f += parseFloat(jQuery(this).val());
        c++
    });
    f = c > 0 ? f / c : 0;
    f = Math.min(e, Math.max(h, Math.round(f * b) / b + h));
    var a = g.siblings(".reviews_summary");
    a.find(".reviews_value").html(f);
    a.find('input[type="hidden"]').val(f).trigger("change");
    a.find(".reviews_stars_hover").css("width", Math.round(a.find(".reviews_stars_bg").width() * f / (e - h)) + "px")
}

function bestdeals_reviews_marks_to_display(a) {
    if (BESTDEALS_GLOBALS.reviews_max_level < 100) {
        a = Math.round(a / 100 * BESTDEALS_GLOBALS.reviews_max_level * 10) / 10;
        if (String(a).indexOf(".") < 0) {
            a += ".0"
        }
    }
    return a
}

function bestdeals_reviews_get_word_value(b) {
    var c = BESTDEALS_GLOBALS.reviews_levels.split(",");
    var a = BESTDEALS_GLOBALS.reviews_max_level / c.length;
    b = Math.max(0, Math.min(c.length - 1, Math.floor(b / a)));
    return c[b]
};