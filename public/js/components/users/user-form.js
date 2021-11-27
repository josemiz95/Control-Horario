class UserFrom extends HTMLElement {
    constructor(){
        super();
        this._user = {};

        // components
        this._closeModalBtn = null;
    }

    connectedCallback(){
        this.innerHTML = this._buildCard();

        // get elements 
        this._closeModalBtn = this.querySelector('.z-modal-close');
        this._modal = this.querySelector('.z-modal');

        this._closeModalBtn.addEventListener('click', this._hideModal.bind(this));
    }

    _hideModal(){
        this._modal.classList.remove('active');
    }

    _buildCard() {
        return `<div class="z-modal z-modal-lg active">
                    <div class="z-modal-contentainer">
                        <div class="z-modal-header">
                            <h2>Usuario</h2>
                            <button class="z-modal-close"><ion-icon name="close-outline"></ion-icon></button>
                        </div>
                        <div class="z-modal-body">
                            <form action="">
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
                                    <button class="z-button primary hover mx-2">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`;
    }
}

customElements.define('z-user-form',UserFrom);