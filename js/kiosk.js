/**
 * Kiosk enable cookie
 * @param: $ and config
 * @author: Mihai Diaconita
 * @description: Create kiosk cookie if query string ?kiosk_enable=true is available and hide elements from users
 */
var kioskEnable = (function kioskEnable($, config) {
    var cookieName = config.nameCookie,
        $elementSelector = $(config.selectElement),
        className = config.nameClass,
        expireCookie = config.exp;

    /**
     * Get Query String Value
     * */
    var getQueryStringValue = function getQueryStringValue(value) {
        return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(value).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
    };

    /**
     * Get Cookie function
     * */
    var getCookie = function getCookie(cname) {
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
    };

    /**
     * Prevent href
     * */
    var preventDefault = function preventDefault(){
        $(document).on('click','.kiosk_enable .tna_brand > a, .kiosk_enable .content-columns > p > a, .kiosk_enable .tna-brand-page > a', function(e){
            e.preventDefault();
        });
    };

    /**
     * Create the cookie if does not exists
     * */
    var bakeCookie = function bakeCookie(cookie, expire) {
        if (getQueryStringValue('kiosk_enable') === "true") {
            if(!getCookie(cookie)) {
                Cookies.set(cookie, true, {expires: expire});
                console.log("%c Kiosk JS loaded." + "%c kioskEnable cookie initialised", "color:red", "color:blue");
            }
        }
    };

    /**
     * Change the DOM as long as the cookie is set and valid
     * Add class to the body so we can have a new namespace
     * Prevent click for external pages
     * */
    var domStuff = function addClassToBody(cookie, elem, elemClass) {
        if (getCookie(cookie) === "true" && getCookie(cookie) !== undefined && typeof (getCookie(cookie)) === "string") {
            // Add kiosk_enable class to the body of HTML
            elem.addClass(elemClass);
            // Prevent click to eternal pages
            preventDefault();
        }
    };

    /**
     * Init functions
     * */
    var init = function init() {
        bakeCookie(cookieName, expireCookie);
        domStuff(cookieName, $elementSelector, className);
    };

    /**
     * Call init
     * */
    init();

    /**
     * Keep everything encapsulated
     * */
    return {/* Silence is gold! @(^-^)@ */};
})(jQuery, {nameCookie: 'kioskEnable', selectElement: 'body', nameClass: 'kiosk_enable', exp: 365});
