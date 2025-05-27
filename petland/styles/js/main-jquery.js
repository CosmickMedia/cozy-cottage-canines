$(document).ready(function(){

    var collapse = $('.collapse--dropdown');
    var btnDrop = $('.btn--dropdown');

    $('body').click(function (e) {

        if (!collapse.is(e.target)
            && collapse.has(e.target).length === 0
            && $('.open').has(e.target).length === 0
            && !btnDrop.is(e.target)
            && btnDrop.has(e.target).length === 0
        ) {
             collapse.collapse('hide')
        }
    });
});