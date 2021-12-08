class UserCard extends HTMLElement {
    constructor(){
        super();
        this.user = {};
        this._viewBtn = null;
        this._viewCheckBtn = null;
        this._statusBtn = null;
    }

    connectedCallback(){
        if(this.hasAttribute('user')){
            this.user = JSON.parse(this.getAttribute('user'));
            this.innerHTML = this._buildCard();

            this._viewBtn = this.querySelector('a.view-btn');
            this._viewCheckBtn = this.querySelector('a.clock-btn');
            this._statusBtn = this.querySelector('a.status-btn');

            this._viewBtn.addEventListener('click', this._view.bind(this));
            this._viewCheckBtn.addEventListener('click', this._viewChecks.bind(this));
        }
    }

    _buildCard() {
        return `<div class="z-card">
                    <div class="z-card-body user-card">
                        <div class="role d-flex justify-content-center">
                            <div class="z-badge ${this.user.role.color}">${this.user.role.name}</div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mb-2">
                            <div class="mb-3">
                                <span class="avatar-user size-xl circle" style="color:${this.user.color}; background-color:${this.user.color}25">${this.user.siglas}</span>
                            </div>
                            <div class="col d-flex justify-content-center flex-column user-details">
                                <h3 class="z-text-center">${this.user.name}</h3>
                                <a class="z-text-center" href="mailto:${this.user.email}">${this.user.email}</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center col user-links pt-2">
                            <a class="view-btn" title="Ver datos"><ion-icon class="z-color-primary z-font-size-24 mx-2" name="eye-outline" title="Ver datos"></ion-icon></a>
                            <a class="clock-btn" title="Ver fichajes de hoy"><ion-icon class="z-color-secondary z-font-size-24 mx-2"  name="stopwatch-outline" title="Ver fichajes de hoy"></ion-icon></a>
                        </div>
                    </div>
                </div>`;
    }

    _view(e){
        const viewEvent = new Event('viewUser', {bubbles: true, composed: true});
        e.target.dispatchEvent(viewEvent);
    }

    _viewChecks(e){
        const viewEvent = new Event('viewUserChecks', {bubbles: true, composed: true});
        e.target.dispatchEvent(viewEvent);
    }
}

customElements.define('z-user-card',UserCard);