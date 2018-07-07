import { GUID } from '~/constant/helpers';

export default class NoticeModel {

    constructor(type = 'info', message = '', data = null) {

        this.id = GUID();
        this.type = type;
        this.message = message;
        this.data = data;

    }

}