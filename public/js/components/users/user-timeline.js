class UserTimeLine extends HTMLElement {
    constructor(){
        super();
        this._user = null;

        // components
        this._closeModalBtn = null;
        this._modal = null;
        this._modalTitle = null;
        this._list = null;
    }

    connectedCallback(){
        this.innerHTML = this._buildCard();

        // get elements 
        this._closeModalBtn = this.querySelector('.z-modal-close');
        this._modal = this.querySelector('.z-modal');
        this._modalTitle = this.querySelector('.z-modal-header h2');
        this._list = this.querySelector('ul');

        this._user = this.getAttribute('user');

        this._closeModalBtn.addEventListener('click', this.close.bind(this));
    }

    static get observedAttributes() {
        return ['user', 'title'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if(oldValue === newValue){ return; }

        switch(name){
            case 'user':
                this._user = newValue;
                if(this._user !== null)
                    this._fillModal();
                break;
            case 'title':
                if(typeof this._modalTitle != "undefined" && this._modalTitle)
                    this._modalTitle.innerHTML = "Fichajes de "+newValue+" para hoy";
                break;
        }
    }

    close(){
        this._modal.classList.remove('active');
    }

    open(){
        this._modal.classList.add('active');
    }

    _buildCard() {
        return `<div class="z-modal z-modal-lg">
                    <div class="z-modal-contentainer">
                        <div class="z-modal-header">
                            <h2></h2>
                            <button class="z-modal-close"><ion-icon name="close-outline"></ion-icon></button>
                        </div>
                        <div class="z-modal-body">
                            <div>
                                <ul class="z-time-line">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>`;
    }

    _fillModal(){
        z.fetch({
            url: app.url+"/api/users/"+this._user+"/checks/today",
            method: 'GET',
            success: (response) => {
                response.map( check => {
                    const checkElement = this._getCheckElement(check);
                    const listElement = document.createElement('li');
                    listElement.append(checkElement);
                    this._list.append(listElement);
                });
            }
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
}

customElements.define('z-user-timeline',UserTimeLine);