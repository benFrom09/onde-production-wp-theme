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
        this.sidebarInitListener();
    }
    setState(key = null,value = null) {
            if(key in this.state) {
                this.state[key] = value;
                return;
            } else {
                throw new Error(`Undefined key ${key} in state property of ${this.constructor.name} object`);
            }      
    }

    sidebarInitListener() {
        const { onde_open_sidebar_btn,onde_sticky_sidebar_trigger, onde_sidebar,onde_sidebar_close_btn } = this.ui;
        
       if(onde_open_sidebar_btn && onde_sticky_sidebar_trigger && onde_sidebar && onde_sidebar_close_btn) {
        onde_open_sidebar_btn.addEventListener('click', () => {
            let {sidebar_opened} = this.state;
                onde_sticky_sidebar_trigger.classList.add('triggered');
                this.setState('sidebar_opened',!sidebar_opened);
                if(this.state.sidebar_opened) {
                    onde_sidebar.classList.add('sidebar-opened');
                }
        });

        onde_sidebar_close_btn.addEventListener('click',() => {
            let {sidebar_opened} = this.state;
            this.setState('sidebar_opened',!sidebar_opened);
            if(this.state.sidebar_opened === false) {
                onde_sidebar.classList.remove('sidebar-opened');
            }
            onde_sticky_sidebar_trigger.classList.remove('triggered');

        });
       }
       
    }



}
