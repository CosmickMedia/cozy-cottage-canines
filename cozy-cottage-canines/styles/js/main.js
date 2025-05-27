let lastScrollY = 0;
let currentScrollY = 0;
let eleHeader = null;
const classes = {
    showed: 'header--show',
    hid: 'header--hidden',
    top: 'header--top',
};
function onScroll() {
    currentScrollY = window.pageYOffset;
    if (currentScrollY === 0) {
        eleHeader.classList.add(classes.top);
    }
    if (currentScrollY < lastScrollY) {
        show();
    } else if (currentScrollY > lastScrollY) {
        hide();
    }
    lastScrollY = currentScrollY;
}
function show() {
    if (eleHeader.classList.contains(classes.hid)) {
        eleHeader.classList.remove(classes.hid);
        eleHeader.classList.add(classes.showed);
    }
}
function hide() {
    if (eleHeader.classList.contains(classes.showed) || !eleHeader.classList.contains(classes.hid)) {
        eleHeader.classList.remove(classes.showed);
        eleHeader.classList.add(classes.hid);
        eleHeader.classList.remove(classes.top);
    }
}

/**
 * Mobile toggle menu
 * @type {HTMLElement}
 */

let navBar = document.getElementById('navBar');
function toogleMenu() {
    if (navBar.classList.contains('open')) {
        navBar.classList.remove('open');
        eleHeader.classList.remove('header--navOpen');
    } else {
        navBar.classList.add('open');
        eleHeader.classList.add('header--navOpen');
    }
}

let linkExpand = document.getElementById('mainNav__expand');

linkExpand.onclick =  () => {
    let subNav = linkExpand.parentElement;
    if (subNav.classList.contains('expand')) {
        subNav.classList.remove('expand')
    } else {
        subNav.classList.add('expand')
    }
};


/**
 * duplicate info
 */
function copyDiv() {
    const bio = document.getElementById('bioClone');
    const bioD = document.getElementById('bio');
    if (bioD){
        bioD.innerHTML = bio.innerHTML;
    }

}
function toCollapse () {
    let card = document.getElementsByClassName('detail__bio--v2');

    for (i = 0; i < card.length; i++) {
        card[i].classList.remove('tab-pane', 'fade', 'show', 'active');
        card[i].classList.add('collapse');
    }

}

function scrollReveal () {
    /**
     * initial Scroll Reveal
     */
    window.sr = ScrollReveal({ duration: 600, viewFactor: 0.7, delay: 200});


// from bottom to top expand

    sr.reveal('.sr-expandB--group',{
        origin: 'bottom',
        distance: '0px',
        easing : 'ease-in',
        scale: 0.1,
    },80);

    sr.reveal('.sr-expandB',{
        origin: 'bottom',
        distance: '0px',
        easing : 'ease-in',
        scale: 0.1,
    });


// from LEFT to RIGHT SHOW
    sr.reveal('.sr-translateL',{
        origin: 'left',
        distance: '300px',
        easing: 'ease-in',
        scale: 0,
    });

// from right to lefttranslate
    sr.reveal('.sr-translateR',{
        origin: 'right',
        distance: '300px',
        easing: 'ease-in',
        scale: 0,
    });
}

/**
 *
 * @type {Swiper}
 */
function swiperMobile () {
    let swiper = new Swiper('.swiper-only-mobile', {
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 12,
    });
}
function swiperCard () {
    let swiper = new Swiper('.swiper-extras', {
        spaceBetween: 5,
        breakpoint: {
            slidesPerView: 'auto',
            centeredSlides: false,
        },
        navigation: {
            nextEl: '.btn--swiper-next',
            prevEl: '.btn--swiper-prev',
        },
    });
}


/**
 * window onload
 */
window.onload = function() {
    eleHeader = document.getElementById('petHeader');
    if (window.pageYOffset === 0) {
        eleHeader.classList.add(classes.top);
    }
    document.addEventListener('scroll', onScroll, false);

    if (screen.width <= 600) {
        copyDiv();
        toCollapse();
        swiperMobile();
    }

    scrollReveal();
    swiperCard();
};


