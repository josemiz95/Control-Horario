class CheckButton extends HTMLElement {
    constructor(){
        super();
        this.z = new ZFunctions();
        this._button = null;
        this._icon = null;
        this._title = null;
    }

    connectedCallback(){
        this._buildButton();

        this._button = this.querySelector('a');
        this._icon =  this.querySelector('ion-icon');
        this._title =  this.querySelector('h3');
        
        this._button.addEventListener('click', this._clickButton.bind(this));

        z.fetch({
            url: app.url+"/api/session/lastcheck",
            method: 'GET',
            success: (response) => {
                if(response.next == 'out'){
                    this._setCheckOut();
                } else {
                    this._setCheckIn();
                }
            },
            fail: () => {
                this._setCheckError();
            }
        });
    }

    _buildButton() {
        this.innerHTML =  
        `<div class="d-flex align-items-center justify-content-center">
            <a class="z-button btn-checkio in"><ion-icon name="play-outline"></ion-icon></a>
        </div>
        <div class="d-flex align-items-center justify-content-center pt-2">
            <h3>Entrar</h3>
        </div>`;
    }

    _setCheckIn(){
        this._button.classList.replace('out', 'in');
        this._icon.setAttribute('name', 'play-outline');
        this._title.innerHTML = "Entrar";
    }

    _setCheckOut(){
        this._button.classList.replace('in', 'out');
        this._icon.setAttribute('name', 'stop-outline');
        this._title.innerHTML = "Salir";
    }

    _setCheckError(){
        this._button.classList.remove('in', 'out');
        this._button.classList.add('error');
        this._icon.setAttribute('name', 'close-outline');
        this._title.innerHTML = "ERROR";
        this._button.replaceWith(this._button.cloneNode(true));
    }

    _clickButton(){

        let check = null;
        let next = ()=>{};

        if (this._button.classList.contains('in')){
            check = 'in';
            next = this._setCheckOut.bind(this);
        } else if(this._button.classList.contains('out')) {
            check = 'out';
            next = this._setCheckIn.bind(this);
        }

        if(['in','out'].includes(check)){
            z.fetch({
                url: app.url+"/api/check/"+check,
                method: 'GET',
                success: (response) => {
                    const checklist = document.querySelector('z-time-line');
                    console.log(response);
                    if(checklist)
                        checklist.appendCheck(response);

                    next();
                },
                fail: () => {
                    this._setCheckError();
                }
            });
        }
        
    }
}

customElements.define('z-check-button',CheckButton);