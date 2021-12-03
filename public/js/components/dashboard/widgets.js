class WidgetCalendar extends HTMLElement {
    constructor(){
        super();
        this.date = new Date();
    }

    connectedCallback(){
        this._buildwidget();
    }

    _buildwidget() {
        this.innerHTML =  
        `<div class="z-card">
            <div class="z-card-body">
                <div class="d-flex align-items-center justify-content-between">
                <h2>${this.date.getDate()}/${this.date.getMonth()+1}/${this.date.getFullYear()}</h2>
                <div class="z-card-icon z-color-danger"><ion-icon name="calendar-clear-outline"></ion-icon></div>
            </div>
            </div>
        </div>`;
    }
}

class WidgetLeaveDays extends HTMLElement {
    constructor(){
        super();
        this.amount = null;
    }

    connectedCallback(){
        this.amount = this.getAttribute('amount');
        this._buildwidget();
    }
    static get observedAttributes() {
        return ['amount'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if(oldValue === newValue){ return; }

        switch(name){
            case 'amount':
                this.amount = newValue;
                this._buildwidget();
                break;
        }
    }

    _buildwidget() {
        this.innerHTML =  
        `<div class="z-card">
            <div class="z-card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2>${this.amount}</h2>
                        <p>Vacaciones</p>
                    </div>
                    <div class="z-card-icon z-color-success"><ion-icon name="sunny-outline"></ion-icon></div>
                </div>
            </div>
        </div>`;
    }
}

class WidgetClock extends HTMLElement {
    constructor(){
        super();
        this._clockElement = null
    }

    connectedCallback(){
        this._buildwidget();
        this._clockElement = this.querySelector('.clock');
        this._startClock();
    }

    _buildwidget() {
        this.innerHTML =  
        `<div class="z-card">
            <div class="z-card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="clock">00:00</h2>
                    <div class="z-card-icon z-color-secondary"><ion-icon name="time-outline"></ion-icon></div>
                </div>
            </div>
        </div>`;
    }

    _startClock(){
        let date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s;

        this._clockElement.innerHTML = time;

        setTimeout(this._startClock.bind(this), 1000);
    }
}

customElements.define('z-widget-calendar',WidgetCalendar);
customElements.define('z-widget-leavedays',WidgetLeaveDays);
customElements.define('z-widget-clock',WidgetClock);