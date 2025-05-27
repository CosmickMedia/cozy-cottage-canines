
let navBar = document.getElementById('navBar');
function toogleMenu() {
    const eleHeader = document.getElementById('petHeader');
    if (navBar.classList.contains('open')) {
        navBar.classList.remove('open');
        eleHeader.classList.remove('header--navOpen');
    } else {
        navBar.classList.add('open');
        eleHeader.classList.add('header--navOpen');
    }
}