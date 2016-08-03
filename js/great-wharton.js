/* ---------------------------------------------------------------
 * Great Wharton interaction scripts
 * ---------------------------------------------------------------
 * */

// Draggable JS start here

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
 * ImageMagic
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






/* ---------------------------------------------------------------
 * Reposition background based on last user story
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

    TweenLite.to("#wrapper", 2, {x: -1500, y: -1600, ease: Circ.easeOut, onUpdate:function()
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

/* ---------------------------------------------------------------
 * Display learn more
 * ---------------------------------------------------------------
 * */

// Display learn more asset on the right hand side bottom corner
$(".learn_more_close .fa-times").click(function (e) {
    e.preventDefault();
    $(".learn_more").toggle("slide", {direction: "right"}).css('height', '101px').css('width', "176.32px");
    $(".learn_more_close").find('i').toggleClass('fa-angle-left fa-times')
});


/* ---------------------------------------------------------------
 * Replace ENTER button URL with #
 * ---------------------------------------------------------------
 * */

// This is a JS fallback
$("#enter-click").attr("href", "#");
$("#next-click").attr("href", "#");

/* ---------------------------------------------------------------
 * 1. Show/hide assets
 * ---------------------------------------------------------------
 * */

// Show overlay and intro when page loads for the first time
$('.overlay').show();
$('.intro').fadeIn(600);
$('.enter-box').hide();

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

// Next button shows instructions and Enter button, Return takes user back to intro

$("#next-click").click(function () {
    $('.next-box').hide();
    $('.enter-box').fadeIn(600);
});

$("#return-click").click(function () {
    $('.next-box').fadeIn(600);
    $('.enter-box').hide();
});

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

$(".about").click(function () {
    $('.overlay').fadeIn(600);
    $('.intro').fadeIn(600);
    $('.about').fadeOut(600);
    $('.tna_brand').fadeOut(600);

    $('.map-zoom').fadeOut(600);
    $('.learn_more_wrap').fadeOut(600);
});


/* ---------------------------------------------------------------
 * Create cookie
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


/*
 * ----------------------------------------------------------------
 * Add Cookies to Zoom IN and OUT
 * ----------------------------------------------------------------
 * */

/*
 * Store an empty variable for the zoom level
 * */
var zoomLev;

/*
 * Default zoom level
 * */
TweenLite.to("#wrapper", 0.5,
    {
        scale: (function () {
            return getCookie('zoomCookie');
        })(),
        onUpdate: function () {
            Draggable.get("#wrapper").applyBounds();
        }
    });

/*
 * Global function to retrieve cookie's value
 * */
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
/*
 * If click on +/- the zoom will change
 * ZoomCookie is created
 * */
$(document).ready( function() {
    $('#zoom_minus').css({'opacity':'1'});
    $('#zoom_plus').css({'opacity':'.3'});

    $(".map-zoom .fa-search-minus, .map-zoom .fa-search-plus").on('click', function () {

        if (this.id == 'zoom_minus') {
            zoomLev = .5;
            $('.marker').css({'font-size':'35px','padding':'10px 12px'});
            $('#zoom_minus').css({'opacity':'.3'});
            $('#zoom_plus').css({'opacity':'1'})
        }
        else if (this.id == 'zoom_plus') {
            zoomLev = 1;
            $('.marker').css({'font-size':'2em', 'padding':'6px'});
            $('#zoom_minus').css({'opacity':'1'});
            $('#zoom_plus').css({'opacity':'.3'})
        }

        Cookies.set('zoomCookie', zoomLev, {expires: 7});

        TweenLite.to("#wrapper", 0.5,
            {
                scale: zoomLev,
                onUpdate: function () {
                    Draggable.get("#wrapper").applyBounds();
                }
            });

    });

    // Resize the font size on marker when zoom out
    if (getCookie('zoomCookie') == .5){
        $('#zoom_minus').css({'opacity':'.3'});
        $('#zoom_plus').css({'opacity':'1'});
        $('.marker').css({'font-size':'35px','padding':'10px 12px'})
    }
});






