export const DEBUG          = window.location.host.split(':').slice(-1)[0] === '3000' ?  true : false; console.log('DEBUG: ', DEBUG);
export const SITE_URL       = DEBUG ? 'https://localhost' : window.location.origin; console.log(SITE_URL);
export const API_URL        = DEBUG ? 'https://localhost/wp/?rest_route=/truedit/v1/' : document.getElementsByClassName('TruEdit-app')[0].getAttribute('data-rest-route'); console.log(API_URL);
export const URL            = DEBUG ? '' : 'admin.php?page=TruEdit-'; console.log('URL:', URL);

/**
 * WP Settings
 */
export const WP_GENERAL_SETTINGS = JSON.parse(window.WP_GENERAL_SETTINGS); console.log(WP_GENERAL_SETTINGS);