const loginForm = document.getElementById('login-form');
const z = new ZFunctions();

z.deleteCookie('bearerToken');

loginForm.addEventListener('submit', async function(e){
    e.preventDefault();
    const data = new FormData(this);
            
    z.fetch({
        url: app.url+"/api/login",
        method: 'POST',
        data: data,
        success: (response) => {
            z.setCookie('bearerToken',response.token);
            window.location.href = app.url;
        },
        fail: (response) => {
            console.log("ERROR");
            console.log(response);
        }
    });

});