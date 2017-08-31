/* ---------------------------------------------------------------
 * Share this button
 * ---------------------------------------------------------------
 * */

$(".st_sharethis_large").show("slow");

/* ---------------------------------------------------------------
 * Increase the font size
 * Create the cookies
 * ---------------------------------------------------------------
 * */
$(document).ready( function()  {

    /*
     * If click on +A/-A change the font size
     * Create the cookies to remember the user's customised font size
     * */

    $("#font_size_big, #font_size_small, #font_size_reset").click(function() {
        // Define the variables
        var pfontSize = parseInt($(".s-grid .inner p").css("font-size")),
            lineHeight = parseInt($(".s-grid .inner p").css("line-height")),
            hfontSize = parseInt($(".s-grid .inner h1").css("font-size"));

        // Define the cookies
        Cookies.set('pfontSizeCookie', pfontSize, {expires: 7});
        Cookies.set('fontLineHeightCookie', lineHeight, {expires: 7});
        Cookies.set('hfontSizeCookie', hfontSize, {expires: 7});

        // If +A is clicked increase the font size and it's line height
        if (this.id == 'font_size_big') {
            pfontSize = pfontSize + 3 + "px";
            lineHeight = lineHeight + 3 + "px";
            hfontSize = hfontSize + 3 + "px";
            $('.s-grid .inner p').css({'font-size':pfontSize,'line-height': lineHeight});
            $('.s-grid .inner h1').css({'font-size':hfontSize,'line-height': lineHeight});

        }
        // If -A is clicked decrease the font size and it's line height
        else if (this.id == 'font_size_small') {
            pfontSize = pfontSize - 3 + "px";
            lineHeight = lineHeight - 3 + "px";
            hfontSize = hfontSize - 3 + "px";
            $('.s-grid .inner p').css({'font-size':pfontSize,'line-height': lineHeight});
            $('.s-grid .inner h1').css({'font-size':hfontSize,'line-height': lineHeight});
        }
        else if(this.id == 'font_size_reset'){
            Cookies.remove('pfontSizeCookie', { path: '/'});
            Cookies.remove('fontLineHeightCookie', { path: '/'});
            Cookies.remove('hfontSizeCookie', { path: '/'});
            location.reload();
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
     * If fontCookie exist apply its value to the font size, line height
     * */
    var pfontSizeCookie = getCookie('pfontSizeCookie') + 'px',
        fontLineHeightCookie = getCookie('fontLineHeightCookie') + 'px',
        hfontSizeCookie = getCookie('hfontSizeCookie') + 'px';

    if(getCookie('pfontSizeCookie') != ''){
        $('.s-grid .inner p').css({'font-size': pfontSizeCookie, 'line-height': fontLineHeightCookie});
        $('.s-grid .inner h1').css({'font-size': hfontSizeCookie, 'line-height': fontLineHeightCookie});
    }
});

