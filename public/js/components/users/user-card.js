class UserCard extends HTMLElement {
    constructor(){
        super();
        this.user = {};
        this._viewBtn = null;
        this._clockBtn = null;
        this._statusBtn = null;
    }

    connectedCallback(){
        if(this.hasAttribute('user')){
            this.user = JSON.parse(this.getAttribute('user'));
            this.innerHTML = this._buildCard();

            this._viewBtn = this.querySelector('a.view-btn');
            this._clockBtn = this.querySelector('a.clock-btn');
            this._statusBtn = this.querySelector('a.status-btn');

            this._viewBtn.addEventListener('click', this._view.bind(this));
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
                            <a class="view-btn"><ion-icon class="z-color-primary z-font-size-24 mx-2" name="eye-outline"></ion-icon></a>
                            <a class="clock-btn"><ion-icon class="z-color-secondary z-font-size-24 mx-2"  name="stopwatch-outline"></ion-icon></a>
                            <a class="status-btn"><ion-icon class="z-color-success z-font-size-24 mx-2" name="checkmark-circle-outline"></ion-icon></a>
                            <!--<ion-icon class="z-color-warning z-font-size-24" name="close-circle-outline"></ion-icon>--!>
                        </div>
                    </div>
                </div>`;
    }

    _view(e){
        const viewEvent = new Event('viewUser', {bubbles: true, composed: true});
        e.target.dispatchEvent(viewEvent);
    }
}

customElements.define('z-user-card',UserCard);