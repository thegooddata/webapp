jQuery(document).ready(function ($) { 
  // MODAL FOR NON CHROME BROWSER
  var isChromium = window.chrome,
  vendorName = window.navigator.vendor;

  $('.install a, .modal-trigger').click(function(e){
    e.preventDefault();
    if(isChromium !== null && vendorName === "Google Inc.") {
      // is Google chrome
      var win = window.open($(this).attr('href'), '_blank');

    } else {
      var options = {
          keyboard : true,
          remote : window.signInUrl
      };
     $('#chromeModal').modal(options); 
    }

  });

})