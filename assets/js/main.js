window.addEventListener("load", () => {
    const menuBar = document.getElementById("navigation-bar");
    const menuHamburger = document.getElementById("navigation-bar-hamburger");
    
    
    menuHamburger.onclick  = function(){
        menuHamburger.classList.toggle("menu-opened");
        menuBar.classList.toggle("menu-opened");
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

    // COUNTER NUMBERS FEATURE

    const statisticSection = document.getElementById("statistic");
    const windowHeight = window.innerHeight;

    const happyClients = document.getElementById("happy-clients");
    const maxHappyClients = happyClients.dataset.max;

    const projectsCompleted = document.getElementById("projects-completed");
    const maxProjectsCompleted = projectsCompleted.dataset.max;

    const members = document.getElementById("members");
    const maxMembers = members.dataset.max;
    const awards = document.getElementById("awards");
    const maxAwards = awards.dataset.max;

    const countNumbers = (element, max) => {
        let counter = 0;
        setInterval( () => {
            if (counter <= max) {
                element.innerHTML = counter;
                counter++;
            }
        }, 5);
    }

    let ran = false; // becomes true when numbers counted.
    
    window.onscroll = () => {
        if( window.scrollY > statisticSection.offsetTop - windowHeight / 2 && ran == false) {
            
            countNumbers(happyClients, maxHappyClients);
            countNumbers(projectsCompleted, maxProjectsCompleted);
            countNumbers(members, maxMembers);
            countNumbers(awards, maxAwards);
            ran = true;
        }
    }

});

( function( $ ) {
    
    $(document).ready(function(){
        $('.about-us-section__slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 900,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                  }
                }
            ]
        });

        $('#our-works-carousel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                  breakpoint: 900,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                  }
                }
            ]
        });
      });

} )( jQuery );
