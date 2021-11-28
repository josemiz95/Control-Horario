const newUserBtn = document.getElementById('new-user-btn');
const usersContainer = document.getElementById('users-container');
const usersForm = document.querySelector('z-user-form#form-user-modal');

newUserBtn.addEventListener('click', function(){
    usersForm.setAttribute('user', '');
    usersForm.setAttribute('title', 'Crear usuario');
    usersForm.setAttribute('action', 'create');
    usersForm.open();
});

usersForm.addEventListener('submitForm', function(e){
    let form = e.target;
    if(usersForm.validate() !== true){
        alert(usersForm.validate());
    } else {
        if(usersForm.action == 'update'){

        } else {
            z.fetch({
                url: app.url+"/api/users",
                method: 'POST',
                data: new FormData(form),
                success: (response) => {
                    createUserCard(response);
                    globalData.users.push(response);
                    usersForm.close();
                },
                fail: (response) => {
                    console.log("ERROR");
                    console.log(response);
                }
            });
        }
    }
});

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
        createUserCard(u);
    });
}

function createUserCard(user){
    let userCard = document.createElement('z-user-card');
        userCard.setAttribute('user', JSON.stringify(user));
        userCard.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-xl-3');

        userCard.addEventListener('viewUser', function(e){
            usersForm.setAttribute('user', JSON.stringify(this.user));
            usersForm.setAttribute('title', 'Modificar '+this.user.name);
            usersForm.setAttribute('action', 'update');
            usersForm.open();
        });
        
        usersContainer.append(userCard);
}