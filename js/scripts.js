/**
 *
 *  Great Wharton global scripts
 *  --------------------------------
 *  0. Reposition background based on last user story
 *  1. Show/hide assets
 *  2. Create cookie
 *  3. Display Learn more
 *  4. Replace ENTER button URL with #
 *  5. Add draggable effect to the town
 *  6. ImageMagic
 *  7. ShareThis button
 */



    /* ---------------------------------------------------------------
     * 0. Reposition background based on last user story
     * ---------------------------------------------------------------
     * */

    var hashTag = window.location.hash;

    if (hashTag == "#schools" || hashTag == "") {


        TweenLite.to("#wrapper", 2, {x: -820, y: -1600, ease: Circ.easeOut});
    }

    if (hashTag == "#food-shortages" || hashTag == "#railway-gates") {

        TweenLite.to("#wrapper", 2, {x: -300, y: -2200, ease: Circ.easeOut});
    }
    if (hashTag == "#zeppellin-raids") {

        TweenLite.to("#wrapper", 2, {x: -2000, y: -900, ease: Circ.easeOut});
    }

    if (hashTag == "#shop") {

        TweenLite.to("#wrapper", 2, {x: -600, y: +200, ease: Circ.easeOut});
    }
    if (hashTag == "#strike") {

        TweenLite.to("#wrapper", 2, {x: -600, y: 400, ease: Circ.easeOut});
}

if (hashTag == "#road") {

    TweenLite.to("#wrapper", 2, {x: -600, y: 720, ease: Circ.easeOut});
}
if (hashTag == "#factory") {

    TweenLite.to("#wrapper", 2, {x: -600, y: 250, ease: Circ.easeOut});
}
if (hashTag == "#field") {

    TweenLite.to("#wrapper", 2, {x: -520, y: 620, ease: Circ.easeOut});
}
if (hashTag == "#hunt") {

    TweenLite.to("#wrapper", 2, {x: -720, y: +920, ease: Circ.easeOut});
}
if (hashTag == "#houses") {

    TweenLite.to("#wrapper", 2, {x: -500, y: +330, ease: Circ.easeOut});
}

    /* ---------------------------------------------------------------
     * 1. Show/hide assets
     * ---------------------------------------------------------------
     * */

    // Show overlay and intro when page loads for the first time
    $('.overlay').show();
    $('.intro').fadeIn(600);

    // Check if cookie was created
    // Hide and fade-in assets
    if (readCookie('gw-hide-intro')) {
        $('.intro').hide();
        $('.overlay').hide();
        $('.tna_brand').fadeIn(600);
        $('.learn_more_wrap').fadeIn(600);
        $('.about').fadeIn(600);
        $('.map-zoom').fadeIn(600);

    }

    // If Enter button is clicked then fade-in/fade-out assets
    // Create the cookie gw-hide-intro
    $("#enter-click").click(function () {
        $('.intro').fadeOut(600);
        $('.overlay').fadeOut(1000);
        $('.about').fadeIn(600);
        $('.tna_brand').fadeIn(600);
        $('.learn_more_wrap').fadeIn(600);
        $('.map-zoom').fadeIn(600);
        createCookie('gw-hide-intro', true, 1)
    });

    // If overlay is clicked then fade-in/fade-out assets
    // Create the cookie gw-hide-intro
    $(".overlay").click(function () {
        $('.overlay').fadeOut(600);
        $('.intro').fadeOut(600);
        $('.about').fadeIn(600);
        $('.info').fadeOut(600);
        $('.tna_brand').fadeIn(600);
        $('.map-zoom').fadeIn(600);
        $('.learn_more_wrap').fadeIn(600);
        createCookie('gw-hide-intro', true, 1)
    });


    $(".about").click(function () {
        $('.overlay').fadeIn(600);
        $('.intro').fadeIn(600);
        $('.about').fadeOut(600);
        $('.tna_brand').fadeOut(600);

        $('.map-zoom').fadeOut(600);
        $('.learn_more_wrap').fadeOut(600);
    });


    /* ---------------------------------------------------------------
     * 2. Create cookie
     * ---------------------------------------------------------------
     * */

    // Generic cookie logic
    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    }
    // Read cookie
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    // Erase cookie
    function eraseCookie(name) {
        createCookie(name, "", -1);
    }
    // Cookie end here

    /* ---------------------------------------------------------------
     * 3. Display learn more
     * ---------------------------------------------------------------
     * */

    // Display learn more asset on the right hand side bottom corner
    $(".learn_more_close .fa-times").click(function (e) {
        e.preventDefault();
        $(".learn_more").toggle("slide", {direction: "right"}).css('height', '101px').css('width', "176.32px");
        $(".learn_more_close").find('i').toggleClass('fa-angle-left fa-times')
    });

    /* ---------------------------------------------------------------
     * 4. Replace ENTER button URL with #
     * ---------------------------------------------------------------
     * */

    // This is a JS fallback
    $("#enter-click").attr("href", "#");

    /* ---------------------------------------------------------------
     * 5. Add draggable effect to the town
     * ---------------------------------------------------------------
     * */

    // Draggable JS start here


    //TweenLite.set("#wrapper",{x:-750,y:-750});
    //TweenLite.set("#wrapper", {x:-600, y:-600});

    var gridWidth = 100;
    var gridHeight = 100;
    Draggable.create("#wrapper", {
        type: "x,y",
        edgeResistance: 0.99,
        bounds: ".f-grid",
        throwProps: true,
        snap: {
            x: function (endValue) {
                return Math.round(endValue / gridWidth) * gridWidth;
            },
            y: function (endValue) {
                return Math.round(endValue / gridHeight) * gridHeight;
            }
        }
    });



    // Draggable js end here

    /* ---------------------------------------------------------------
     * 6. ImageMagic
     * ---------------------------------------------------------------
     * */

    $('.main_background').tiles({
        original: {
            width: 4000,
            height: 3000
        },
        basePath: "/wp-content/themes/great-wharton-theme/",
        zoom: 1
    });



/*

Zoom
 */




$(".map-zoom .fa-minus").click(function () {
    $("#wrapper").animate({ 'zoom':.5 }, 400);
    draggable[0].update();

});

$(".map-zoom .fa-plus").click(function() {
    $("#wrapper").animate({ 'zoom':1 }, 400);
    draggable[0].update();

});

/* ---------------------------------------------------------------
 * 7. Share this button
 * ---------------------------------------------------------------
 * */

// Share this
var stLight = "";
stLight.options({
    publisher: "e1514b1f-8114-4751-a7dc-7af051944bf6",
    doNotHash: false,
    doNotCopy: false,
    hashAddressBar: false,
    onhover: false
});

$(".st_sharethis_large").show("slow");






