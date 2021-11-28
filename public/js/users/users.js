const newUserBtn = document.getElementById('new-user-btn');
const usersContainer = document.getElementById('users-container');
const usersForm = document.querySelector('z-user-form#form-user-modal');

newUserBtn.addEventListener('click', function(){
    usersForm.setAttribute('user', '');
    usersForm.openModal();
});

usersForm.addEventListener('submitForm', function(e){
    let form = e.target;
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
    globalData.users.forEach(u => {
        let userCard = document.createElement('z-user-card');
            userCard.setAttribute('user', JSON.stringify(u));
            userCard.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-xl-3');

        userCard.addEventListener('viewUser', function(e){
            usersForm.setAttribute('user', JSON.stringify(this.user));
            usersForm.openModal();
        });
        
        usersContainer.append(userCard);
    });
}