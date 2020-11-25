/*jslint regexp: true, nomen: true, undef: true, sloppy: true, eqeq: true, vars: true, white: true, plusplus: true, maxerr: 50, indent: 4 */

;(function($, window, document, undefined) {
    var gdrts_demo_trend = {
        init: function() {
            wp.gdrts.hooks.addAction("gdrts-thumbs-rating-voted", gdrts_demo_trend.voted, 10);
        },
        voted: function(el) {
            if ($(document.body).hasClass("post-type-archive-product")) {
                $(el).closest("article").addClass("gdrts-demo-thumb-voted");
            }
        }
    };

    gdrts_demo_trend.init();
})(jQuery, window, document);
