// title name changer
"use strict";
   var i = 1;

   function titleChanger() {
   var fullStackTitleElement = document.getElementById('full_stack_title');
     if(i & 1){

        fullStackTitleElement.innerHTML = "The Experienced Web Developer";
         i++;

     } else {
        fullStackTitleElement.innerHTML = "The Experienced Web Designer";
         i++;
     }
  }

  setInterval(function(i){ 
        titleChanger();
  }, 1000);