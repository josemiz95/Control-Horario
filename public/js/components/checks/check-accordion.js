class CheckAccordion extends HTMLElement {
    constructor(){
        super();
        this._title = null;
        this._header = null;
        this._list = null;
    }

    connectedCallback(){
        this.classList.add('z-accordion');

        this._title = this.getAttribute('title');
        this._build();
        this._header = this.querySelector('.z-accordion-header');
        this._list = this.querySelector('ul');

        this._header.addEventListener('click', this.toggle.bind(this));
        this.setChecks();
    }

    
    static get observedAttributes() {
        return ['title'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if(oldValue === newValue){ return; }

        switch(name){
            case 'title':
                if(typeof this._header != 'undefined' && this._header != null){
                    this._header.innerHTML = newValue;
                }
        }
    }

    _build() {
        this.innerHTML =    
            `<a class="z-accordion-header">${this._title}</a>
            <div class="z-accordion-body">
                <div>
                    <ul class="z-time-line">
                    </ul>
                </div>
            </div>`;
    }

    setChecks(){
        this.checks.map( check => {
            const checkElement = this._getCheckElement(check);
            const listElement = document.createElement('li');
            listElement.append(checkElement);
            this._list.prepend(listElement);
        });
    }

    _getCheckElement(check){
        const date = new Date(check.check_time);
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

        const checkType = document.createElement('div');
              checkType.classList.add('z-badge', check.type=='in'?'success':'danger');
              checkType.innerHTML = check.type=='in'?'Entrar':'Salir';

        const checkTime = document.createElement('div');
              checkTime.classList.add('time');
              checkTime.innerHTML = `${h}:${m}:${s}`;

        const checkContainer = document.createElement('div');
              checkContainer.classList.add('checkContainer');
              checkContainer.append(checkTime);
              checkContainer.append(checkType);

        return checkContainer;
    }

    toggle(){
        this.classList.toggle('z-active');
    }
}

customElements.define('z-accordion',CheckAccordion);