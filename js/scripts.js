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

$(document).ready(function() {

    /*Removing style attribute from caption class*/
    $("div.wp-caption").removeAttr("style");

});



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
    bounds:window,
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
    //$("#wrapper").animate({ 'zoom':.5 }, 400);
    //TweenLite.to("#wrapper", 1, {scale:.5});

    TweenLite.to("#wrapper", 0.5 ,
        {
            scale:.5,
            onUpdate:function()
            {
                Draggable.get("#wrapper").applyBounds();
            }
        });



});

$(".map-zoom .fa-plus").click(function() {
    //$("#wrapper").animate({ 'zoom':1 }, 400);
    TweenLite.to("#wrapper", 0.5 ,
        {
            scale:1,
            onUpdate:function()
            {
                Draggable.get("#wrapper").applyBounds();
            }
        });

});

/* ---------------------------------------------------------------
 * 7. Share this button
 * ---------------------------------------------------------------
 * */

// Share this
//var stLight = "";
//stLight.options({
//    publisher: "e1514b1f-8114-4751-a7dc-7af051944bf6",
//    doNotHash: false,
//    doNotCopy: false,
//    hashAddressBar: false,
//    onhover: false
//});

$(".st_sharethis_large").show("slow");



/* ---------------------------------------------------------------
 * 0. Reposition background based on last user story
 * ---------------------------------------------------------------
 * */

var hashTag = window.location.hash;

if (hashTag == "#schools" || hashTag == "") {

    TweenLite.to("#wrapper", 2, {x: -820, y: -1600, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});


}

if (hashTag == "#train") {

    TweenLite.to("#wrapper", 2, {x: -300, y: -2200, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}

if (hashTag == "#railway-gates") {

    TweenLite.to("#wrapper", 2, {x: -10, y: -2200, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#bomb-crater") {

    TweenLite.to("#wrapper", 2, {x: -2000, y: -900, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}

if (hashTag == "#grocery-shop") {

    TweenLite.to("#wrapper", 2, {x: -1170, y: -1400, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#strike") {

    TweenLite.to("#wrapper", 2, {x: -1800, y: -1660, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}

if (hashTag == "#women-drinking") {

    TweenLite.to("#wrapper", 2, {x: -1600, y: -1320, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#factory") {

    TweenLite.to("#wrapper", 2, {x: -1900, y: -1350, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#field") {

    TweenLite.to("#wrapper", 2, {x: -1700, y: -650, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#hunt") {

    TweenLite.to("#wrapper", 2, {x: -1920, y: -60, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}
if (hashTag == "#postman") {

    TweenLite.to("#wrapper", 2, {x: -480, y: -1150, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}


if (hashTag == "#police-station") {

    TweenLite.to("#wrapper", 2, {x: -500, y: -1900, ease: Circ.easeOut, onUpdate:function()
    {
        Draggable.get("#wrapper").applyBounds();
    }});
}

