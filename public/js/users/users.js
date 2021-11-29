const newUserBtn = document.getElementById('new-user-btn');
const usersContainer = document.getElementById('users-container');
const usersForm = document.querySelector('z-user-form#form-user-modal');
const searchInput = document.getElementById('search-input');

getAndSetUsers();

/****  EVENTS ****/
newUserBtn.addEventListener('click', function(){
    usersForm.setAttribute('user', '');
    usersForm.setAttribute('title', 'Crear usuario');
    usersForm.setAttribute('action', 'create');
    usersForm.open();
});

searchInput.addEventListener('keyup', setUsers);

usersForm.onSubmit = (response)=>{
    if(usersForm.action == 'update'){
        globalData.users = globalData.users.map((u)=> u.id == response.id?response:u);
        setUsers();
        usersForm.close();
    } else {
        createUserCard(response);
        globalData.users.push(response);
        usersForm.close();
    }
}

/****  FUNCTIONS ****/
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
    globalData.users.map(u => 
        u.name.toUpperCase().includes(searchInput.value.toUpperCase()) ||
        u.email.toUpperCase().includes(searchInput.value.toUpperCase()) ? 
        createUserCard(u): null
    );
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