$(document).ready(function(){
    $('.btn-list').addClass("btn-primary");
    $('.btn-list').removeClass("btn-secondary");
    $('.btn-images').removeClass("btn-primary");
    $('.btn-images').addClass("btn-secondary");

    $('.image-view').addClass("d-none");
    $('.list-view').addClass("d-block");
    $('.list-view').removeClass("d-none");

    //$('.search-holder').addClass("d-block");
});