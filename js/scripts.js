/**
 *
 *  Great Wharton global scripts
 *  --------------------------------
 *  1. Show/hide assets
 *  2. Create cookie
 *  3. Display Learn more
 *  4. Replace ENTER button URL with #
 *  5. Add draggable effect to the town
 *
 */


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
    }

    // If Enter button is clicked then fade-in/fade-out assets
    // Create the cookie gw-hide-intro
    $("#enter-click").click(function () {
        $('.intro').fadeOut(600);
        $('.overlay').fadeOut(1000);
        $('.about').fadeIn(600);
        $('.tna_brand').fadeIn(600);
        $('.learn_more_wrap').fadeIn(600);
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
        $('.learn_more_wrap').fadeIn(600);
        createCookie('gw-hide-intro', true, 1)
    });

    /* ---------------------------------------------------------------
     * 2. Create cookie
     * ---------------------------------------------------------------
     * */

    // Generic cookie logic
    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }
    // Read cookie
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    // Erase cookie
    function eraseCookie(name) {
        createCookie(name,"",-1);
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


TweenLite.set("#wrapper",{x:-750,y:-750});

    var gridWidth = 100;
    var gridHeight = 100;
    Draggable.create("#wrapper", {
        type: "x,y",
        edgeResistance: 0.99,
        bounds: "html",
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
     * 6. Share this button
     * ---------------------------------------------------------------
     * */

    // Share this
    stLight.options({
        publisher: "e1514b1f-8114-4751-a7dc-7af051944bf6",
        doNotHash: false,
        doNotCopy: false,
        hashAddressBar: false,
        onhover: false
    });

    $(".st_sharethis_large").show("slow");

