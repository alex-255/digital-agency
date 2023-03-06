window.addEventListener("load", () => {
    var menuBar = document.getElementsByClassName("menu-bar");
    // for mobile menu 
    var menuHamburger = document.getElementsByClassName("menu-bar-hamburger");
    menuHamburger[0].onclick  = function(){
        menuHamburger[0].classList.toggle("menu-opened");
        menuBar[0].classList.toggle("menu-opened");
    };

    let searchIcon = document.getElementsByClassName("bi-search");
    let searchForm = document.getElementById("searchform");
    searchIcon[0].onclick = function() {
        searchForm.style.display = "block";
        searchIcon[0].style.display = "none";
    };
});