const usersContainer = document.getElementById('users-container');

getAndSetUsers();

async function getAndSetUsers(){
    z.fetch({
        url: app.url+"/api/users",
        method: 'GET',
        success: (response) => {
            globalData.users = response;
            setUsers();
        }
    });
}

async function setUsers(){
    usersContainer.innerHTML = '';
    
    globalData.users.forEach(u => {
        usersContainer.innerHTML +=
            `<div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="z-card">
                    <div class="z-card-body user-card">
                        <div class="role d-flex justify-content-center">
                            <div class="z-badge ${u.role.color}">${u.role.name}</div>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mb-2">
                            <div class="mb-3">
                                <span class="avatar-user size-xl circle" style="color:${u.color}; background-color:${u.color}25">${u.siglas}</span>
                            </div>
                            <div class="col d-flex justify-content-center flex-column user-details">
                                <h3 class="z-text-center">${u.name}</h3>
                                <p class="z-text-center">${u.email}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center col user-links pt-2">
                            <a href=""><ion-icon class="z-color-primary z-font-size-24 mx-2" name="eye-outline"></ion-icon></a>
                            <a href=""><ion-icon class="z-color-secondary z-font-size-24 mx-2"  name="stopwatch-outline"></ion-icon></a>
                            <a href=""><ion-icon class="z-color-success z-font-size-24 mx-2" name="checkmark-circle-outline"></ion-icon></a>
                            <!--<ion-icon class="z-color-warning z-font-size-24" name="close-circle-outline"></ion-icon>--!>
                        </div>
                    </div>
                </div>
            </div>`
    });
    
}