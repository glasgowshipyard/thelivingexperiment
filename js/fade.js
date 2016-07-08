/**
 * Fade the thing
 *
 * Learn more: http://codepen.io/nickcil/pen/sfutl/
 */
 
 jQuery(document).ready(function($){
   $(window).scroll(function(){
    $(".glass-promontory").css("opacity", 1 - $(window).scrollTop() / 500);
 });
});