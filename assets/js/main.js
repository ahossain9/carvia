/**
 * Pestro Theme — Main JavaScript
 * Author: Omexer
 * Version: 1.0
 */

( function ( $ ) {

    'use strict';
  
    $( function () {
        Pestro.init();
    } );

    var Pestro = {
        init: function () {
            this.mobileNav();
        },

        /* ── Mobile Navigation ──────────────────────────── */
        mobileNav: function () {
            $('.main-navigation-mobile .menu-item-has-children > a').each(function() {
                $(this).prepend('<span><i class="hgi hgi-stroke hgi-rounded hgi-arrow-right-01"></i></span>');
            });
            $('.main-navigation-mobile .menu-item-has-children a > span').on('click', function(e) {
                e.preventDefault();
                var parentLi = $(this).parent();
                parentLi.toggleClass('open');
                var subMenu = parentLi.parent().children('.sub-menu');
                subMenu.slideToggle();
            });

            $(".header-menu-bar").on("click", function () {
                $(".offcanvas-inner-wrap").addClass("opened");
                $("body").addClass("body-overlay");
            });
            $(".close-btn").on("click", function () {
                $(".offcanvas-inner-wrap").removeClass("opened");
                $(".body-overlay").removeClass("apply");
            });
        },

    };

    //* ─── Preloader ─────────────────────────────── */
    $(window).on('load', function() {
        $('#pestro-preloader').fadeOut(500);
    });

} ( jQuery ) );
