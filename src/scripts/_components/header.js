class Header {
    constructor() {
        this.components = document.querySelectorAll('.c-header');

        if (this.components == null) return;

        this.components.forEach((component) => {
            this.init(component);
        });
    }

    init(component) {
        const self = this;

        this.navTrigger = component.querySelector('.c-header__nav-trigger');
        this.nav = component.querySelector('.c-header__nav');

        self.navTrigger.addEventListener('click', function () {
            self.toggle();
        });

        window.addEventListener('resize', function () {
            self.close();
        });
    }

    close() {
        const self = this;

        self.navTrigger.setAttribute('aria-expanded', false);
        self.nav.hidden = true;
    }

    toggle() {
        const self = this;
        let state = JSON.parse(self.navTrigger.getAttribute('aria-expanded'));

        self.navTrigger.setAttribute('aria-expanded', !state);
        self.nav.hidden = !self.nav.hidden;
    }
}

export default Header;
