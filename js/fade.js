/**
 * Fade the thing
 *
 * Learn more: http://codepen.io/nickcil/pen/sfutl/
 */
 $(document).ready(function() {
  // put all your jQuery goodness in here.
$('h1').css({'opacity':( 100-$(window).scrollTop() )/100});