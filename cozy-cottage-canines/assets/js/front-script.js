let lastScrollY = 0;
let currentScrollY;
let eleHeader = null;
let ThemeScript = {};

const classes = {
    showed: 'header--show',
    hid: 'header--hidden',
    top: 'header--top',
};

jQuery(function ($) {

    ThemeScript = {
        construct: function () {
            ThemeScript.menuEvents();
            ThemeScript.bodyEvents();
            ThemeScript.linkExpand();
            ThemeScript.headerClass();

            document.addEventListener('scroll', ThemeScript.onScroll, false);
            ThemeScript.scrollReveal();
            ThemeScript.smallScreens();
            ThemeScript.swiperExtras();
            ThemeScript.filterSelection('all');
            ThemeScript.filterAction();
            ThemeScript.filterFixed();
        },
        smallScreens() {
            if (screen.width <= 600) {
                ThemeScript.copyDiv();
                ThemeScript.toCollapse();
                ThemeScript.swiperMobile();
                ThemeScript.filterPuppy();
            }
        },
        copyDiv: () => {
            const bio = $('#bioClone');
            const bioD = $('#bio');
            if (bioD.length && bio.length) {
                bioD.html(bio.innerHTML);
            }

        },
        toCollapse: () => {
            const card = $('.detail__bio--v2');
            card.removeClass('active');
            if (card.length) {
                card.removeClass('tab-pane', 'fade', 'show', 'active');
                card.addClass('collapse');
            }
        },
        swiperExtras: () => {
            new Swiper('.swiper-extras', {
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
        },
        swiperMobile: () => {

            new Swiper('.swiper-only-mobile', {
                slidesPerView: 'auto',
                centeredSlides: false,
                spaceBetween: 12,
            });
        },
        headerClass: () => {
            const eleHeader = $('#petHeader');

            if (eleHeader.length) {
                if (window.pageYOffset === 0) {
                    eleHeader.addClass(classes.top);
                }
            }
        },
        menuEvents: () => {

            $('.menu-item-has-children > a').on('click', (event) => {
                event.preventDefault();
                $(this).parent().toggleClass('expand');
            });
        },
        bodyEvents: () => {
            const collapse = $('.collapse--dropdown');
            const btnDrop = $('.btn--dropdown');
            const filterList = $('.puppies .filters__actions');

            $('body').on('click', (e) => {

                if (!collapse.is(e.target)
                    && collapse.has(e.target).length === 0
                    && $('.open').has(e.target).length === 0
                    && !btnDrop.is(e.target)
                    && btnDrop.has(e.target).length === 0
                ) {
                    collapse.collapse('hide');
                    filterList.removeClass('filters__actions--show');
                }
            });
        },
        linkExpand: () => {

            $.each($('.mainNav__sub'), (index, item) => {
                $(item).parent().find('> a').on('click', (event) => {
                    const element = $(event.currentTarget);
                    element.parent().toggleClass('expand');
                });
            });
        },
        scrollReveal: () => {

            /**
             * initial Scroll Reveal
             */
            window.sr = ScrollReveal({duration: 600, viewFactor: 0.7, delay: 200});

            // from bottom to top expand
            sr.reveal('.sr-expandB--group', {
                origin: 'bottom',
                distance: '0px',
                easing: 'ease-in',
                scale: 0.1,
            }, 80);

            sr.reveal('.sr-expandB', {
                origin: 'bottom',
                distance: '0px',
                easing: 'ease-in',
                scale: 0.1,
            });

            // from LEFT to RIGHT SHOW
            sr.reveal('.sr-translateL', {
                origin: 'left',
                distance: '300px',
                easing: 'ease-in',
                scale: 0,
            });

            // from right to lefttranslate
            sr.reveal('.sr-translateR', {
                origin: 'right',
                distance: '300px',
                easing: 'ease-in',
                scale: 0,
            });
        },
        onScroll: () => {
            eleHeader = document.getElementById('petHeader');
            const el = document.scrollingElement || document.documentElement;
            currentScrollY = el.scrollTop;


            if (currentScrollY === 0) {
                eleHeader.classList.add(classes.top);
                eleHeader.classList.remove(classes.showed);
            } else {
                if (currentScrollY > 30 && currentScrollY > lastScrollY) {
                    ThemeScript.hide();
                }

                if (currentScrollY < lastScrollY) {
                    ThemeScript.show();
                }
            }

            lastScrollY = currentScrollY;
        },
        show: () => {
            eleHeader = document.getElementById('petHeader');
            eleHeader.classList.remove(classes.hid);
            eleHeader.classList.add(classes.showed);
        },
        hide: () => {
            eleHeader = document.getElementById('petHeader');
            eleHeader.classList.remove(classes.showed);
            eleHeader.classList.add(classes.hid);
            eleHeader.classList.remove(classes.top);
        },
        filterSelection: (dataGroup) => {
            let block;
            block = document.getElementsByClassName("filter__element");

            Array.prototype.forEach.call(block, i => {
                let dataItem = i.dataset.group;
                if (dataGroup !== 'all') {
                    i.classList.add('hide');
                    if (dataItem === dataGroup) {
                        i.classList.remove('hide');
                    }
                } else {
                    i.classList.remove('hide');
                }
            })

        },
        filterAction: () => {
            let filterBtns, btns;

            filterBtns = document.getElementById("filterBtnGroup");
            if (filterBtns) {
                btns = filterBtns.getElementsByClassName("btn--filter");

                Array.prototype.forEach.call(btns, i => {
                    i.classList.remove('active');
                    i.addEventListener("click", function () {
                        i.classList.add('active');
                        let data = i.dataset.click;
                        ThemeScript.filterSelection(data);
                    })
                });
            }

        },
        filterPuppy () {
            $('.puppies .filters__actions > .btn').on('click', function () {
                document.getElementsByClassName('puppies__image')[0]
                    .scrollIntoView({ block: 'start',  behavior: 'smooth' });
                const parent = $(this).parent();

                if (parent.hasClass('filters__actions--show')){
                    parent.removeClass('filters__actions--show');
                    return;
                }
                $('.puppies .filters__actions').removeClass('filters__actions--show');
                parent.addClass('filters__actions--show');
            });
        },
        filterFixed() {
            const elementPosition = $('#filter_bar').offset();

           if (elementPosition){
               $(window).scroll(function(){
                   $('#filter_bar')
                       .toggleClass('filters__bar--fixed',$(window).scrollTop() > elementPosition.top + 45);
               });
           }
        }
    };

    ThemeScript.construct();

});