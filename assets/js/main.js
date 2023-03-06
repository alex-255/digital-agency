window.addEventListener("load", (event) => {
    var menuBar = document.getElementsByClassName("menu-bar");
    // for mobile menu 
    var menuHamburger = document.getElementsByClassName("menu-bar-hamburger");
    menuHamburger[0].onclick  = function(){
        menuHamburger[0].classList.toggle("menu-opened");
        menuBar[0].classList.toggle("menu-opened");
    };
        
    // for mobile menu closing while click on menu link
    var menuLink = document.getElementsByClassName("menu-area-link");
    menuLinkLength = menuLink.length;

    for (let step = 0; step < menuLinkLength; step++) {
        menuLink[step].onclick  = function(){
            menuHamburger[0].classList.toggle("menu-opened");
            menuBar[0].classList.toggle("menu-opened");
        };
    }
});