//Get the button
var mybutton = document.getElementById("myBtn");
      
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};



function scrollFunction(){
  if((screen.width <= 768) && (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20)){
    mybutton.style.display = "none";
  }else{
    mybutton.style.display = "block";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}