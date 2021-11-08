/**
 * Tracking application state
 */


export default class App 
{
    constructor(userInterfaceObject) {

        this.state = {

            nav_opened:false,
            sidebar_opened:false,
            app_window_size: {
                width:null,
                height:null
            },
            scrollY:0,
            is_mobile:false,

            front_page_content_size:0,
            parallax_slide:{}

        }
        this.ui = userInterfaceObject;
    }
    init() {
    }
    setState(key = null,value = null) {
            if(key in this.state) {
                this.state[key] = value;
                return;
            } else {
                throw new Error(`Undefined key ${key} in state property of ${this.constructor.name} object`);
            }      
    }



}
