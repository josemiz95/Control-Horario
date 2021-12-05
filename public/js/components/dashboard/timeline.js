class TimeLine extends HTMLElement {
    constructor(){
        super();
        this.z = new ZFunctions();
        this._list = null;
    }

    connectedCallback(){
        this._buildButton();

        this._list = this.querySelector('ul');

        z.fetch({
            url: app.url+"/api/session/checks/today",
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

    _buildButton() {
        this.innerHTML =  
        `<div>
            <ul class="z-time-line">
            </ul>
        </div>`;
    }

    appendCheck(check){
        const checkElement = this._getCheckElement(check);
        const listElement = document.createElement('li');
        listElement.append(checkElement);
        this._list.prepend(listElement);
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

customElements.define('z-time-line',TimeLine);