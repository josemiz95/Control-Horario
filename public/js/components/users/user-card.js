class UserCard extends HTMLElement {
    constructor(){
        super();
        this._user = {};
    }

    connectedCallback(){
        if(this.hasAttribute('user')){
            this._user = JSON.parse(this.getAttribute('user'));
            this.innerHTML = this._buildCard();
        }
    }

    _buildCard() {
        return `<div class="z-card">
                    <div class="z-card-body user-card">
                        <div class="role d-flex justify-content-center">
                            <div class="z-badge ${this._user.role.color}">${this._user.role.name}</div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mb-2">
                            <div class="mb-3">
                                <span class="avatar-user size-xl circle" style="color:${this._user.color}; background-color:${this._user.color}25">${this._user.siglas}</span>
                            </div>
                            <div class="col d-flex justify-content-center flex-column user-details">
                                <h3 class="z-text-center">${this._user.name}</h3>
                                <p class="z-text-center">${this._user.email}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center col user-links pt-2">
                            <a href=""><ion-icon class="z-color-primary z-font-size-24 mx-2" name="eye-outline"></ion-icon></a>
                            <a href=""><ion-icon class="z-color-secondary z-font-size-24 mx-2"  name="stopwatch-outline"></ion-icon></a>
                            <a href=""><ion-icon class="z-color-success z-font-size-24 mx-2" name="checkmark-circle-outline"></ion-icon></a>
                            <!--<ion-icon class="z-color-warning z-font-size-24" name="close-circle-outline"></ion-icon>--!>
                        </div>
                    </div>
                </div>`;
    }
}

customElements.define('z-user-card',UserCard);