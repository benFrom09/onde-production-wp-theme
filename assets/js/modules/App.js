/**
 * Tracking application state
 */


export default class App {
    constructor(userInterfaceObject) {

        this.state = {

            nav_opened: false,
            sub_menu_opened: false,
            navbar_rect_pos: null,
            site_branding_rect_pos: null,
            sidebar_opened: false,
            app_window_size: {
                width: null,
                height: null
            },
            scrollY: 0,
            is_mobile: false,

            front_page_content_size: 0,
            parallax_slide: {}

        }
        this.ui = userInterfaceObject;
        this.toggleHandleClick = this.toggleHandleClick.bind(this);
        this.handleClickSubMenuBtn = this.handleClickSubMenuBtn.bind(this);
        this.wcCommerceQtyBtnHandleClick = this.wcCommerceQtyBtnHandleClick.bind(this);
        this.addqty = this.addqty.bind(this);
        this.soustracQty = this.soustracQty.bind(this);
    }
    init() {
        this.setState('app_window_size', { width: window.innerWidth, height: window.innerHeight });
        this.setState('scrollY', window.scrollY);
        this.getClientRect();
        this.is_mobile();
        this.stickyNavbar();
        this.toggleNavigation();
        this.handleClickSubMenuBtn();
        this.wcCommerceQtyBtnHandleClick();
    }
    update() {
        this.setState('app_window_size', { width: window.innerWidth, height: window.innerHeight });
        this.setState('scrollY', window.scrollY);
        this.getClientRect();
        this.is_mobile();
        this.stickyNavbar();
        this.toggleNavigation();

    }
    setState(key = null, value = null) {
        if (key in this.state) {
            this.state[key] = value;
            return this.state[key];
        } else {
            throw new Error(`Undefined key ${key} in state property of ${this.constructor.name} object`);
        }
    }

    is_mobile() {
        return this.state.app_window_size.width < 1200 ? this.setState('is_mobile', true) : this.setState('is_mobile', false);
    }

    toggleNavigation() {
        if (this.state.is_mobile) {
            this.ui.onde_menu_container.style.transition = "all 0.4s ease-in-out";
            this.ui.onde_menu_toggle_btn.addEventListener('click', this.toggleHandleClick);
        } else {
            this.ui.onde_menu_container.style.transition = "none";
            this.ui.onde_menu_toggle_btn.removeEventListener('click', this.toggleHandleClick);
            this.toggleNavigationDefault();
        }
    }
    toggleNavigationDefault() {
        this.ui.onde_navbar.classList.remove('toggled');
        document.body.classList.remove('nav-opened');
        this.ui.onde_menu_container.setAttribute('aria-expanded', 'false');
    }
    toggleHandleClick() {
        this.ui.onde_navbar.classList.toggle('toggled');
        document.body.classList.toggle('nav-opened');
        if (this.ui.onde_menu_container.getAttribute('aria-expanded') === 'true') {
            this.ui.onde_menu_container.setAttribute('aria-expanded', 'false');

        } else {

            this.ui.onde_menu_container.setAttribute('aria-expanded', 'true');

        }
        if (this.state.sub_menu_opened) {
            const el = document.querySelector('#primary-menu .sub-menu');
            if (el.classList.contains('sub-menu-opened')) {
                el.classList.remove('sub-menu-opened');
                let opened = !this.state.sub_menu_opened
                this.setState('sub_menu_opened', opened);
            }

        }
    }

    handleClickSubMenuBtn() {
        const btns = this.ui.onde_sub_menu_arrow_btn;
        if (btns) {
            let el = null;
            btns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    let opened = !this.state.sub_menu_opened
                    this.setState('sub_menu_opened', opened);
                    el = e.target.nextElementSibling;
                    if (opened) {
                        el.classList.add('sub-menu-opened');
                    } else {
                        el.classList.remove('sub-menu-opened');
                    }
    
                });
            })
            
        }

    }

    stickyNavbar() {
        const {
            onde_navbar, onde_site_branding, onde_header_image,
            onde_breakpoint_medium
        } = this.ui;

        const { navbar_rect_pos, site_branding_rect_pos } = this.state;

        onde_header_image.style.transition = 'height 0.6s ease';

        if (window.innerWidth > onde_breakpoint_medium) {

            if (navbar_rect_pos.top < 0) {
                onde_navbar.style.position = 'fixed';
                onde_navbar.style.top = window.scrollY;
                onde_header_image.style.transition = 'none';
            }
            if (site_branding_rect_pos.bottom > 0) {
                onde_navbar.style.position = 'static';
            }
        }
    }

    getClientRect() {
        this.state.navbar_rect_pos = this.ui.onde_navbar.getBoundingClientRect();
        this.state.site_branding_rect_pos = this.ui.onde_site_branding.getBoundingClientRect();
    }


    wcCommerceQtyBtnHandleClick() {
        /*
        const buttons = this.ui.onde_wc_qty_btn;
        if (buttons.length > 0) {
            buttons.forEach(button => {
                this.addPlusAndMinusToQtyBtn(button).then(()=> {
                    const plus_btns = document.querySelectorAll('.plus_btn');
                    plus_btns.forEach(btn => {
                        btn.addEventListener('click',this.addqty);
                    })
                    const minus_btns = document.querySelectorAll('.minus_btn');
                    minus_btns.forEach(btn => {
                        btn.addEventListener('click',this.soustracQty);
                    });
                });     
            });


        }
        */
    }

    addPlusAndMinusToQtyBtn(btn) {
        return new Promise((resolve, reject) => {
            const minus = document.createElement('div');
            const plus = document.createElement('div');
            minus.textContent = '-';
            minus.classList.add('minus_btn');
            plus.textContent = '+';
            plus.classList.add('plus_btn');
            btn.parentNode.insertBefore(minus, btn);
            btn.parentNode.insertBefore(plus, btn.nextSibling);
            resolve();
        })

    }

    addqty(e) {
        e.target.previousElementSibling.value++;
        this.enableUpdateCartBtn();
    }
    soustracQty(e) {
        if (Number(e.target.nextElementSibling.value >= 1)) {
            e.target.nextElementSibling.value--
            this.enableUpdateCartBtn();
        } else {
            return;
        }
    }
    addListeners(elts, evt, callback) {
        elts.addEventListener(evt, callback);
    }

    enableUpdateCartBtn() {
        if (this.ui.onde_wc_cart_update_btn.disabled) {
            this.ui.onde_wc_cart_update_btn.disabled = false
        }
    }

}
