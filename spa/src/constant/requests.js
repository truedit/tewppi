import axios from 'axios';
import { API_URL, DEBUG } from './settings';
import { API_URL_ARGIFY } from './helpers';

// Request
axios.interceptors.request.use(function (config) {
    return config;
}, function (error) {
    return Promise.reject(error);
});

// Response
axios.interceptors.response.use((res) => {

    // It hits the plugin and it fatals
    if (!(res && res.data && typeof res.data === 'object')) {
        throw Error('Invalid / No Server response.');
    }
    // It hit the plugin but TruEdit isn't responding with anything.
    else if (res && res.data && res.data.message === null) {
        throw Error('Invalid / No Server response.');
    }

    return res;
}, function (res) {
    if (DEBUG) console.error(res);
    let err;
    if (res.response && res.response.data && res.response.data.message) {
        err = res.response.data;
    } else {
        err = { 
            message: 'Invalid / No Server response.',
            warnings: []
        };
    }

    return Promise.reject(err);
});

// GET
export const GET_DASHBOARD          = () => axios.get(API_URL + 'dashboard');
export const GET_AUTOMATIONS        = () => axios.get(API_URL + 'automation');
export const GET_AUTOMATION         = (id) => axios.get(API_URL + 'automation/' + id);
export const GET_ACTIONS            = () => axios.get(API_URL + 'automation/action');
export const GET_PROFILES           = () => axios.get(API_URL + 'profile');
export const GET_OPTIONS            = () => axios.get(API_URL + 'option');
export const GET_LOGS               = (page, count) => axios.get(API_URL + 'log/' + API_URL_ARGIFY({ page: page, count: count }));
export const GET_REGIONS            = () => axios.get(API_URL + 'region');
export const GET_PREREQUISITES      = () => axios.get(API_URL + 'prerequisites');
export const GET_USER_SESSION_INFO  = () => axios.get(API_URL + 'user/sessionInfo');

// UPDATE
export const UPDATE_AUTOMATION      = (id, data) => axios.post(API_URL + 'automation/' + id, data);
export const UPDATE_OPTIONS         = (form) => axios.post(API_URL + 'option', form);

// CREATE
export const CREATE_AUTOMATION      = (automation) => axios.post(API_URL + 'automation', automation);
export const PUBLISH                = (form) => axios.post(API_URL + 'publish', form);

// DELETE
export const DELETE_AUTOMATION      = (id) => axios.delete(API_URL + 'automation/' + id);

// MISC
export const TEST_API_KEY           = () => axios.post(API_URL + 'option/test', {});
export const VERIFY_IFRAME          = (token) => axios.post(API_URL + 'verify', { token: token });
