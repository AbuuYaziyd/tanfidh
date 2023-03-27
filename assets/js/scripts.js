(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */
  
    if("serviceWorker" in navigator) {
        navigator.serviceWorker.register("sw.js").then(registration =>{
            console.log("SW Registered!");
            console.log(registration);
        }).catch(error => {
            console.log("SW Registration Failed!");
            console.log(error);
        })
    }

})(window);