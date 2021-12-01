class UserFrom extends HTMLElement {
    constructor(){
        super();
        this.user = null;

        // components
        this._form = null;
        this._closeModalBtn = null;
        this._modal = null;
        this._modalTitle = null;
        this._errors = null;
        this._inputs = null;
        this.action = "create";
        this.onSubmit = ()=>{};
    }

    connectedCallback(){
        this.innerHTML = this._buildCard();

        // get elements 
        this._closeModalBtn = this.querySelector('.z-modal-close');
        this._form = this.querySelector('form');
        this._modal = this.querySelector('.z-modal');
        this._modalTitle = this.querySelector('.z-modal-header h2');
        this._errors = this.querySelector('.z-modal-body .errors');

        this.user = JSON.parse(this.getAttribute('user'));

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
        this._form.addEventListener('submit', this.submit.bind(this));

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
                    this.user = JSON.parse(newValue);
                } catch (e) {
                    this.user = null;
                }
                this._fillModal();
                break;
            case 'title':
                if(typeof this._modalTitle != "undefined" && this._modalTitle)
                    this._modalTitle.innerHTML = newValue;
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
        this._errors.classList.add('d-none');
        this._modal.classList.add('active');
    }

    submit(e){
        e.preventDefault();

        if(this.validate() !== true){
            alert(this.validate());
        } else {
            let data = new FormData(e.target);
            let url = app.url+"/api/users";

            if(this.action == 'update'){
                data.append('_method','PUT');
                url = app.url+"/api/users/"+this.user.id
            }

            z.fetch({
                url,
                method: 'POST',
                data,
                success: (response) => {
                    if(typeof this.onSubmit == 'function')
                        this.onSubmit(response);
                },
                fail: (response) => {
                    let mainList = '';
                    if(response.errors){
                        let fields = response.errors;
                        mainList = document.createElement('ul');

                        this._setError(fields['name'], 'Nombre', mainList);
                        this._setError(fields['surname'], 'Apellidos', mainList);
                        this._setError(fields['email'], 'Correo Electrónico', mainList);
                        this._setError(fields['password'], 'Contraseña', mainList);
                        this._setError(fields['nif'], 'NIF', mainList);
                        this._setError(fields['leave_days'], 'Vacaciones', mainList);
                        this._setError(fields['role_id'], 'Rol', mainList);

                        this._errors.classList.remove('d-none');
                    }
                    this._errors.innerHTML = "";
                    this._errors.append(mainList);
                }
            });
        }

        const submitEvent = new Event('submitedForm', {bubbles: true, composed: true});
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
                            <div class="errors z-alert danger d-none">
                            </div>
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
                                        <label for="user_leaves">Vacaciones</label>
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
            if(this.user != null){
                this._inputs.id.value = this.user.id ?? null;
                this._inputs.name.value = this.user.name ?? null;
                this._inputs.surname.value = this.user.surname ?? null;
                this._inputs.email.value = this.user.email ?? null;
                this._inputs.leave_days.value = this.user.leave_days ?? null;
                this._inputs.nif.value = this.user.nif ?? null;
                this._inputs.role_id.value = this.user.role_id ?? 2;
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

    _setError(array, errorName, mainList){
        if(Array.isArray(array) && array.length > 0){
            var error = document.createElement('li');
            var errorTitle = document.createElement('strong');
                errorTitle.innerHTML = errorName;
                error.append(errorTitle);

            var errorList = document.createElement('ul');
                array.forEach(e => {
                    var element = document.createElement('li');
                        element.innerHTML = e;
                    
                    errorList.append(element);
                });

            error.append(errorList);
            mainList.append(error);
        }
    }
}

customElements.define('z-user-form',UserFrom);