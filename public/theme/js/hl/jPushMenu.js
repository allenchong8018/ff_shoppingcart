/*!
 * jPushMenu.js
 * 1.1.1
 * @author: takien
 * http://takien.com
 * Original version (pure JS) is created by Mary Lou http://tympanus.net/
 */
(function(a){a.fn.jPushMenu = function(b){var d = a.extend({}, a.fn.jPushMenu.defaultOptions, b); a("body").addClass(d.bodyClass); a(this).addClass("jPushMenuBtn"); a(this).click(function(){var f = "", e = ""; if (a(this).is("." + d.showLeftClass)){f = ".cbp-spmenu-left"; e = "toright"} else{if (a(this).is("." + d.showRightClass)){f = ".cbp-spmenu-right"; e = "toleft"} else{if (a(this).is("." + d.showTopClass)){f = ".cbp-spmenu-top"} else{if (a(this).is("." + d.showBottomClass)){f = ".cbp-spmenu-bottom"}}}}a(this).toggleClass(d.activeClass); a(f).toggleClass(d.menuOpenClass); if (a(this).is("." + d.pushBodyClass)){a("body").toggleClass("cbp-spmenu-push-" + e)}a(".jPushMenuBtn").not(a(this)).toggleClass("disabled"); return false}); var c = {close:function(e){a(".jPushMenuBtn,body,.cbp-spmenu").removeClass("disabled active cbp-spmenu-open cbp-spmenu-push-toleft cbp-spmenu-push-toright")}}; if (d.closeOnClickOutside){a(document).click(function(){c.close()}); a(document).on("click touchstart", function(){c.close()}); a(".cbp-spmenu,.toggle-menu").click(function(f){f.stopPropagation()}); a(".cbp-spmenu,.toggle-menu").on("click touchstart", function(f){f.stopPropagation()})}if (d.closeOnClickLink){a(".cbp-spmenu a").on("click", function(){c.close()})}}; a.fn.jPushMenu.defaultOptions = {bodyClass:"cbp-spmenu-push", activeClass:"menu-active", showLeftClass:"menu-left", showRightClass:"menu-right", showTopClass:"menu-top", showBottomClass:"menu-bottom", menuOpenClass:"cbp-spmenu-open", pushBodyClass:"push-body", closeOnClickOutside:true, closeOnClickInside:true, closeOnClickLink:true}})(jQuery);