const vacacionesElement = document.querySelector('z-widget-leavedays');

getAndSetUserData();

async function getAndSetUserData(){
    z.fetch({
        url: app.url+"/api/session/data",
        method: 'GET',
        success: (response) => {
            globalData.user = response;
            vacacionesElement.setAttribute('amount', globalData.user.leave_days ?? 0);
        }
    });
}