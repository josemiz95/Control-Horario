class UserFrom extends HTMLElement {
    constructor(){
        super();
        this.date = null;
        this.month = null;
        this.year = null;
        this._calendarBody = null;
    }

    connectedCallback(){
        this._buildCalendar();
        this._calendarBody = this.querySelector('.z-calendar-body');

        try {
            this.date = new Date(this.getAttribute('date'));
            this.month = parseInt(this.getAttribute('month'))-1;
            this.year = parseInt(this.getAttribute('year'));
            this._buildBody();
        } catch (e) {
            this.date = null;
            this.month = null;
            this.year = null;
        }

        
    }

    static get observedAttributes() {
        return ['date', 'month', 'year'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if(oldValue === newValue){ return; }

        switch(name){
            case 'date':
            case 'month':
            case 'year':
                try {
                    this.date = new Date(this.getAttribute('date'));
                    this.month = parseInt(this.getAttribute('month'))-1;
                    this.year = parseInt(this.getAttribute('year'));
                    this._buildBody();
                } catch (e) {
                    this.date = null;
                    this.month = null;
                    this.year = null;
                }
                break;
        }
    }


    validate(){
        if(this._inputs.password.value === this._inputs.password2.value){
            return true;
        } else {
            return "Las contraseñas no coinciden";
        }
    }

    _buildCalendar() {
        this.innerHTML =  
        `<div class="z-card">
            <div class="z-card-body p-0">
                <div class="z-calendar">
                    <div class="z-calendar-header">
                        <div>Lun</div>
                        <div>Mar</div>
                        <div>Mie</div>
                        <div>Jue</div>
                        <div>Vie</div>
                        <div>Sab</div>
                        <div>Dom</div>
                    </div>
                    <div class="z-calendar-body">
                        
                    </div>
                </div>
            </div>
        </div>`;
    }

    _buildBody(){
        if(this._calendarBody === null)
            return;
        const today = new Date();
        const firstDay = new Date(this.year, this.month, 1);
        const lastDay = new Date(this.year, this.month+1, 0);
        this._calendarBody.innerHTML = '';
        
        // Fill blank days
        for (let i = 0; i < firstDay.getDay()-1; i++) {
            const element = document.createElement('div');
                this._calendarBody.append(element);
        }

        // Fill days
        for (let i = 1; i < lastDay.getDate()+1; i++) {
            const date = new Date(this.year, this.month, i);

            const element = document.createElement('div');
            element.innerHTML = i;

            if(date.getDay() === 6 || date.getDay() === 0)
                element.classList.add('z-calendar-weekend');
            if(today.toDateString() === date.toDateString())
                element.classList.add('z-calendar-today');
                    
            this._calendarBody.append(element);
        }
    }
}

customElements.define('z-calendar',UserFrom);