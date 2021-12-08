const formChecks = document.getElementById('form-checks');
const totalTime = document.getElementById('totalTime');
const usersSelect = document.getElementById('users-select');
const fichajesContainer = document.getElementById('checksContainer');

// element = document.createElement('z-accordion');
// element.setAttribute('title', "<div class='z-badge info lg'>04:00:00</div> Tramo #1");
// fichajesContainer.append(element);
z.fetch({
    url: app.url+"/api/users",
    method: 'GET',
    success: (response) => {
        const users = response;
        users.map(user => {
            let option = document.createElement('option');
                option.value = user.id;
                option.innerHTML = user.surname!=null? user.name+' '+user.surname: user.name;

            usersSelect.append(option);
        });
    }
});

formChecks.addEventListener('submit', function(e){
    e.preventDefault();
    fichajesContainer.innerHTML = '';
    z.fetch({
        url: app.url+"/api/checks/date",
        data: new FormData(formChecks),
        method: 'POST',
        success: (response) => {
            totalTime.innerHTML = response.total_time;
            const timeSlots = response.slots;
            timeSlots.map((timeSlot, index) => {
                var title =`<div class='z-badge info lg'>${timeSlot.total_time}</div> Tramo #${index+1}`;
                let timeSlotElement = document.createElement('z-accordion');
                    timeSlotElement.classList.add('d-block');
                    timeSlotElement.setAttribute('title', title);
                    timeSlotElement.checks = timeSlot.time_checks;
                    
                fichajesContainer.append(timeSlotElement);
            });
        }
    });
});