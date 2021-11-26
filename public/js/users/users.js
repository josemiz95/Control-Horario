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
            `<z-user-card user='${JSON.stringify(u)}' class="col-12 col-md-6 col-lg-4 col-xl-3"><z-user-card/>`;
    });
    
}