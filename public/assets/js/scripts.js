$(document).ready(function () {

    /**
     * ================================================
     * Bootstrap Dropdown Animation
     * ================================================
     * */
    $('.dropdown-toggle').dropdown();
    $('.dropdown, .btn-group').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(1, 0).slideToggle();
    }).on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(1, 0).slideToggle('fast');
    });

    /**
     * ================================================
     * Light Gallery
     * ================================================
     * */
     $(document).ready(function () {
         /*$('.light-gallery').lightGallery({
             thumbnail: true, mode: 'lg-tube',
             selector: '.light-gallery-image',
             hash: false
         });*/
     });

     /**
     * ================================================
     * Smooth Scrolling on Page
     * ================================================
     * */
    /*$('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 200
                }, 700);
                return false;
            }
        }
    });*/

    /**
     * ================================================
     * Social Feeds
     * ================================================
     * */

    /*$('.social-feed-instagram').socialfeed({
        // INSTAGRAM
        instagram:{
            accounts: ['@eetrite_homeware'], //Array: Specify a list of accounts from which to pull posts
            limit: 9, //Integer: max number of posts to load
            client_id: 'f7f56455afec43daa82266d3f464bff6', //String: Instagram client id (option if using access token)
            access_token: '3106259113.f7f5645.efc089d5c5664a5b828a535619876741' //String: Instagram access token
            // generate access token: https://instagram.com/oauth/authorize/?client_id={CLIENT_ID}&redirect_uri={REDIRECT_URI}&response_type=token
        },
        // GENERAL SETTINGS
        length: 150,
        show_media: true,
        template: '/assets/plugins/socialfeed/templates/instagram.html',
        // Moderation function - if returns false, template will have class hidden
        moderation: function (content) {
            return (content.text) ? content.text.indexOf('fuck') == -1 : true;
        },
        //update_period: 5000,
        // When all the posts are collected and displayed - this function is evoked
        callback: function () {
            //console.log('all posts are collected');
        }
    });*/

});

/**
 * ================================================
 * To Top Button
 * ================================================
 * */

$(window).scroll(function() {
    if(document.body.scrollTop == 0) {
        $("#to-top").stop(1,0).fadeOut();
    } else {
        $("#to-top").stop(1,0).fadeIn();
    }
});

//$(window).on('load', function () {

    /**
     * ================================================
     * FastClick is a simple, easy-to-use library for eliminating the 300ms delay between a physical tap and the firing of a click event on mobile browsers.
     * The aim is to make your application feel less laggy and more responsive while avoiding any interference with your current logic.
     * ================================================
     * */

    //FastClick.attach(document.body);

//});