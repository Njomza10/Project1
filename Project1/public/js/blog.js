
$('.btn').click(function(){
    $('this').toggleClass("click");
    $('sidebar').toggleClass("show");
});
$('.cat-btn').click(function () {
    $('nav ul .cat-show').toggleClass("show");
    $('nav ul .first').toggleClass('rotate');
});
