class CheckAccordion extends HTMLElement {
    constructor(){
        super();
        this._title = null;
        this._header = null;
        this._body = null;
    }

    connectedCallback(){
        this._title = this.getAttribute('title');

        this._build();
        this._header = this.querySelector('.z-accordion-header');
        this._body = this.querySelector('.z-accordion-body');

        this._header.addEventListener('click', this.toggle.bind(this));
    }

    _build() {
        this.innerHTML =    
            `<a class="z-accordion-header">${this._title}</a>
            <div class="z-accordion-body">
                <div>
                    <ul class="z-time-line"><li><div class="checkContainer"><div class="time">15:09:53</div><div class="z-badge success">Entrar</div></div></li><li><div class="checkContainer"><div class="time">15:09:51</div><div class="z-badge danger">Salir</div></div></li><li><div class="checkContainer"><div class="time">15:08:23</div><div class="z-badge success">Entrar</div></div></li>
                    </ul>
                </div>
            </div>`;
    }

    toggle(){
        this.classList.toggle('z-active');
    }
}

customElements.define('z-accordion',CheckAccordion);