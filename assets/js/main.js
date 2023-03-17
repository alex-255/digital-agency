window.addEventListener("load", () => {
    var menuBar = document.getElementsByClassName("navigation-bar");
    const menuHamburger = document.querySelector(".navigation-bar-hamburger");
    
    
    menuHamburger.onclick  = function(){
        menuHamburger.classList.toggle("menu-opened");
        menuBar[0].classList.toggle("menu-opened");
        // document.querySelector('.menu-opened .logo-area').style.display = "flex";       
        // menuHamburgerOpened = document.querySelector(".navigation-bar-hamburger.menu-opened");
    };

    

    
    

    let searchIcon = document.getElementById("bi-search");
    let searchForm = document.querySelector('.search-form[aria-label="navigation-search"]');
    let closeButton = document.getElementById("bi-plus-lg");
    searchIcon.onclick = () => {
        console.log(searchForm);
        searchForm.style.display = "block";
        searchIcon.style.display = "none";
        closeButton.style.display = "block";
    };

    closeButton.onclick = () => {
        searchForm.style.display = "none";
        searchIcon.style.display = "block";
        closeButton.style.display = "none";
    };
});