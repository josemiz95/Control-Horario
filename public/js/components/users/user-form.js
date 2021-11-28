class UserFrom extends HTMLElement {
    constructor(){
        super();
        this._user = null;

        // components
        this._form = null;
        this._closeModalBtn = null;
        this._modal = null;
        this._modalTitle = null;
        this._inputs = null;
        this.action = "create";
    }

    connectedCallback(){
        this.innerHTML = this._buildCard();

        // get elements 
        this._closeModalBtn = this.querySelector('.z-modal-close');
        this._form = this.querySelector('form');
        this._modal = this.querySelector('.z-modal');
        this._modalTitle = this.querySelector('.z-modal-header h2');

        this._user = JSON.parse(this.getAttribute('user'));

        this._inputs = {
            id: this.querySelector('#user_id'),
            name: this.querySelector('#user_name'),
            surname: this.querySelector('#user_surname'),
            email: this.querySelector('#user_email'),
            leave_days: this.querySelector('#user_leaves'),
            nif: this.querySelector('#user_nif'),
            role_id:this.querySelector('#user_rol'),
            password:this.querySelector('#user_password'),
            password2:this.querySelector('#user_password2'),
        };

        this._closeModalBtn.addEventListener('click', this.close.bind(this));
        this._form.addEventListener('submit', this.submit);

        this._fillModal();
    }

    static get observedAttributes() {
        return ['user', 'title', 'action'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if(oldValue === newValue){ return; }

        switch(name){
            case 'user':
                try {
                    this._user = JSON.parse(newValue);
                } catch (e) {
                    this._user = null;
                }
                this._fillModal();
                break;
            case 'title':
                if(typeof this._modalTitle != "undefined" && this._modalTitle){
                    this._modalTitle.innerHTML = newValue;
                }
                break;
            case 'action':
                this.action = newValue ?? 'create';
                break;
        }
    }

    close(){
        this._modal.classList.remove('active');
    }

    open(){
        this._modal.classList.add('active');
    }

    submit(e){
        e.preventDefault();
        const submitEvent = new Event('submitForm', {bubbles: true, composed: true});
        e.target.dispatchEvent(submitEvent);
    }

    validate(){
        if(this._inputs.password.value === this._inputs.password2.value){
            return true;
        } else {
            return "Las contraseñas no coinciden";
        }
    }

    _buildCard() {
        return `<div class="z-modal z-modal-lg">
                    <div class="z-modal-contentainer">
                        <div class="z-modal-header">
                            <h2>Usuario</h2>
                            <button class="z-modal-close"><ion-icon name="close-outline"></ion-icon></button>
                        </div>
                        <div class="z-modal-body">
                            <form>
                                <input type="hidden" name="id" id="user_id">
                                <div class="row">
                                    <div class="z-form-group col-6">
                                        <label for="user_name">Nombre</label>
                                        <input type="text" id="user_name" name="name">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_surname">Apellidos</label>
                                        <input type="text" id="user_surname" name="surname">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_email">Correo</label>
                                        <input type="text" id="user_email" name="email">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_leaves">Vacaviones</label>
                                        <input type="number" id="user_leaves" name="leave_days">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_nif">NIF</label>
                                        <input type="text" id="user_nif" name="nif">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_rol">Rol</label>
                                        <select name="role_id" id="user_rol">
                                            <option value="1">Administrador</option>
                                            <option value="2">Usuario</option>
                                        </select>
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_password">Contraseña</label>
                                        <input type="password" id="user_password" name="password">
                                    </div>
                                    <div class="z-form-group col-6">
                                        <label for="user_password2">Repetir contraseña</label>
                                        <input type="password" id="user_password2">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" class="z-button primary hover mx-2">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`;
    }

    _fillModal(){
        if(this._inputs != null){
            if(this._user != null){
                this._inputs.id.value = this._user.id ?? null;
                this._inputs.name.value = this._user.name ?? null;
                this._inputs.surname.value = this._user.surname ?? null;
                this._inputs.email.value = this._user.email ?? null;
                this._inputs.leave_days.value = this._user.leave_days ?? null;
                this._inputs.nif.value = this._user.nif ?? null;
                this._inputs.role_id.value = this._user.role_id ?? 2;
            } else {
                this._inputs.id.value = '';
                this._inputs.name.value = '';
                this._inputs.surname.value = '';
                this._inputs.email.value = '';
                this._inputs.leave_days.value = '';
                this._inputs.nif.value = '';
                this._inputs.role_id.value = 2;
            }
            this._inputs.password.value = '';
            this._inputs.password2.value = '';
        }
    }
}

customElements.define('z-user-form',UserFrom);