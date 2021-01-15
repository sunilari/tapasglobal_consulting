/* <!--------------------------- Function:  Header Navigation -----------------------------------------> */

$(document).ready(function() {
  $("#site-nav-toggler").click(function(e) {
    $("#site-nav").toggle("slow", "linear");
    $("#site-nav").animate({
      left: '250px',
      opacity: '.9',
      padding: '2vw',
    }, 'slow');
    e.preventDefault();
  })
});

$(document).ready(function() {
  //$("#site-nav-toggler").click(function(e){
  //$( "#photo-nav" ).toggle( "slow", "linear" );
  $("#photo-nav").animate({
    right: '20px',
    opacity: '.9',
    padding: '2vw',
  }, 'slow');
  //})
});

$(function() {
    var a = window.location.href;
    $(".sidebar nav a").each(function() {
      a == this.href && $(this).closest("li").addClass("selected")
    })
  })

    /* !-- -- -- -- -- -- -- -- -- -- -- -- -- - Function: Slide Show-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - > */

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 4 seconds
}
