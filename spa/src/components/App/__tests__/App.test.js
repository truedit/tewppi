import React from 'react';
import ReactDOM from 'react-dom';
import App from '../App';

describe('the app component', () => {

    let mock;
    let xmlHttpRequest;

    beforeEach(function () {

        global.fetch = jest.fn().mockImplementation(() => {
            var p = new Promise((resolve, reject) => {
                resolve({
                    ok: true, 
                    Id: '123', 
                    json: function() { 
                        return {Id: '123'}
                    }
                });
            });
        
            return p;
        });

        

    });

    it('renders without crashing', () => {

        const response = await 

        const div = document.createElement('div');
        ReactDOM.render(<App />, div);
        ReactDOM.unmountComponentAtNode(div);

    });

})


// mock = {
//     open: jest.fn(),
//     send: jest.fn(),
//     readyState: 4,
//     responseText: JSON.stringify({  
//         "prerequisites":{  
//            "hasApiKey":{  
//               "name":"API Key",
//               "boolean":true
//            },
//            "hasHttps":{  
//               "name":"HTTPS",
//               "boolean":true
//            },
//            "hasJson":{  
//               "name":"JSON Extension",
//               "boolean":true
//            },
//            "writableFolder":{  
//               "name":"Uploads Folder Writable",
//               "boolean":true
//            },
//            "hasZipArchive":{  
//               "name":"ZIP Archive Extension",
//               "boolean":true
//            },
//            "hasCorrectWpVersion":{  
//               "name":"Wordpress 4.7+",
//               "boolean":true
//            },
//            "hasCorrectPhpVersion":{  
//               "name":"PHP 5.5+",
//               "boolean":true
//            },
//            "hasverified":{  
//               "name":"API Key Tested",
//               "boolean":false
//            },
//            "hasPassedAllRequirements":{  
//               "name":"Passed All Requirements",
//               "boolean":true
//            },
//            "hasDebugOn":{  
//               "name":"Debug Mode",
//               "boolean":true
//            }
//         },
//         "automations":[  
//            {  
//               "ID":431,
//               "post_author":"0",
//               "post_date":"2018-03-14 07:23:43",
//               "post_date_gmt":"0000-00-00 00:00:00",
//               "post_content":"",
//               "post_title":"",
//               "post_excerpt":"",
//               "post_status":"draft",
//               "comment_status":"closed",
//               "ping_status":"closed",
//               "post_password":"",
//               "post_name":"",
//               "to_ping":"",
//               "pinged":"",
//               "post_modified":"2018-03-14 07:23:43",
//               "post_modified_gmt":"0000-00-00 00:00:00",
//               "post_content_filtered":"",
//               "post_parent":0,
//               "guid":"http:\/\/localhost:8000\/?p=431",
//               "menu_order":0,
//               "post_type":"automation",
//               "post_mime_type":"",
//               "comment_count":"0",
//               "filter":"raw",
//               "post_meta":{  
//                  "json":{  
//                     "action":{  
//                        "id":3,
//                        "name":"Bundle Article"
//                     },
//                     "config":{  
//                        "formUrl":"http:\/\/localhost:8000\/index.php?truedit=true&type=automation&id=431"
//                     },
//                     "id":400,
//                     "lastExecuted":1521432935798,
//                     "name":"test1",
//                     "profiles":[  
//                        {  
//                           "id":10,
//                           "name":"Word Documents"
//                        },
//                        {  
//                           "id":11,
//                           "name":"Images"
//                        },
//                        {  
//                           "id":12,
//                           "name":"Video"
//                        }
//                     ]
//                  },
//                  "automation_id":"400"
//               }
//            }
//         ]
//      })
// };