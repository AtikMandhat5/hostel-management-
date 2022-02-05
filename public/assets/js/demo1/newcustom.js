jQuery(document).ready(function () {
    var url = window.location.pathname.split("/");
    var questions = url[2];
    var segment = url.length;

    if (segment > 3) {
        questions = url[2];
    }
$('.kt-aside-menu li ul li').removeClass('kt-menu__item--active');
$('.kt-aside-menu li ul li').removeClass('kt-menu__item--open');
$('.c_class').each(function () {

    var datamenu = $(this).attr('data-menu');
    if (datamenu == questions) {
        $(this).parents('li').addClass('kt-menu__item--active');
        $(this).parents('li').addClass('kt-menu__item--open');

    } else {
        var n = datamenu.indexOf('-');           
        datamenu = datamenu.substring(0, n != -1 ? n : datamenu.length);
           //console.log("datamenu  " + datamenu);
           //console.log("question  " + questions);
           if (datamenu == questions) {
            $(this).parents('li').addClass('kt-menu__item--active');
            $(this).parents('li').addClass('kt-menu__item--open');                
        }
    }

});
});