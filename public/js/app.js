// CONSTANT APP PARTS
    const colorsCss = document.querySelector('#colors-css');
    const main = document.querySelector('#appContainer');
    // Navigation
    const navigation = document.querySelector('#navContainer');
    const actualNavigation = document.querySelector('#navMenu li.active');
    const navigationMenu = document.querySelector('#navMenu');
    const navigationList = document.querySelectorAll("#navMenu li");
    // Buttons
    const menuToggleBtn = document.querySelector('#menuToggle');
    const colorsModeBtn = document.querySelector('#colorsToggle');

// MENU TOGGLE
const toggleNav = function(){
    navigation.classList.toggle('collapsed');
    main.classList.toggle('collapsed');

}
menuToggleBtn.addEventListener('click', toggleNav);

// NAVIGATION EFFECT
navigationList.forEach((item)=> item.addEventListener('mouseover',function() {
    navigationList.forEach(item => item.classList.remove('active'));
    this.classList.add('active');
}));

if(actualNavigation !== null){
    navigationMenu.addEventListener('mouseleave', function(){
        navigationList.forEach(item => item.classList.remove('active'));
        actualNavigation.classList.add('active');
    });
}

// OTHER EFECTS
colorsModeBtn.addEventListener('click', function(){
    let actual = colorsCss.getAttribute('data-type');
    if(actual == "ligth"){
        // Dark
        colorsCss.setAttribute('data-type','dark');
        colorsCss.setAttribute('href',app.url+'/css/dark.css');
        colorsModeBtn.querySelector('ion-icon').setAttribute('name','sunny-outline');
    } else {
        // Ligth
        colorsCss.setAttribute('data-type','ligth');
        colorsCss.setAttribute('href',app.url+'/css/colors.css');
        colorsModeBtn.querySelector('ion-icon').setAttribute('name','moon-outline');
    }
});

const z = new ZFunctions();
const globalData = {};
