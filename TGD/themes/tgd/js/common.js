jQuery(document).ready(function ($) { 
    // MODAL FOR NON CHROME BROWSER
    var isChromium = window.chrome,
    vendorName = window.navigator.vendor;
    if(isChromium !== null && vendorName === "Google Inc.") {
      // is Google chrome 
    } else {
      $('.install a').click(function(e){
          e.preventDefault();
          var options = {
              keyboard : true,
              remote : window.signInUrl
          };
         $('#chromeModal').modal(options); 
      });
    }
})