// CONSTANT APP PARTS
const actualNavigation = document.querySelector('#navMenu li.active');
const navigation = document.querySelector('#navContainer');
const main = document.querySelector('#appContainer');
const navigationMenu = document.querySelector('#navMenu');
const navigationList = document.querySelectorAll("#navMenu li");
const menuToggleBtn = document.querySelector('#menuToggle');

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

