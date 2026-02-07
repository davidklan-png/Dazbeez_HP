/**
 * Splash Page Scripts
 *
 * Progressive enhancement only.
 * Page must remain usable with JavaScript disabled.
 *
 * @package Blueprint_Child
 */

(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        const splashPage = document.querySelector('.splash-page');

        if (!splashPage) {
            return;
        }

        // Add progressive enhancement features here
        console.log('Splash page loaded');
    });

})();
