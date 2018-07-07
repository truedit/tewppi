import { API_URL, URL, WP_GENERAL_SETTINGS } from './settings';
import moment from 'moment'

/**
 * Checks the url to see what type, then applies & or ?.
 * Some rest api url uses query param to define the route.
 * @param {object} args 
 */
export const API_URL_ARGIFY = (args) => {
    console.log(API_URL);
    return (API_URL.match(/rest_route/) ? '&' : '?') + Object.keys(args)
        .map((key) => [key, args[key]])
        .map((item) => item.join('='))
        .join('&');
};

export const URL_ARGIFY = (args) => {
    return (URL.match(/admin.php\?page=TruEdit/) ? '&' : '?') + Object.keys(args)
        .map((key) => [key, args[key]])
        .map((item) => item.join('='))
        .join('&');
};

export const GET_URL_PARAMS = () => {
    return window.location.search.substr(1).split('&').reduce(function (q, query) {
        let chunks = query.split('=');
        let key = chunks[0];
        let value = chunks[1];
        return (q[key] = value, q);
    }, {});
};

export const GUID = () => {
    var S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
};

export const FORMAT_DATE = (input) => {

    // left is WP, right is moment
    let mapper = {
        // Day of Month
        'd': 'DD',
        'j': 'D',
        'S': 'Do',
        // Weekday
        'l': 'dddd',
        'D': 'ddd',
        // Month
        'm': 'MM',
        'n': 'M',
        'F': 'MMMM',
        'M': 'MMM',
        // Year
        'Y': 'Y',
        'y': 'YY',
        // Time
        'a': 'a',
        'A': 'A',
        'g': 'h',
        'h': 'hh',
        'G': 'H',
        'H': 'HH',
        'i': 'mm',
        's': 'ss',
        'T': 'z'
    };

    let date_format = WP_GENERAL_SETTINGS.date_format.split('').map((char) => {
        return mapper[char] ? mapper[char] : char;  
    }).join('');

    let time_format = WP_GENERAL_SETTINGS.time_format.split('').map((char) => {
        return mapper[char] ? mapper[char] : char;  
    }).join('');

    return moment(input).format(date_format + ' ' + time_format);
}