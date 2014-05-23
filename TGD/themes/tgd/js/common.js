jQuery(document).ready(function ($) { 
  // MODAL FOR NON CHROME BROWSER
  var isChromium = window.chrome,
  vendorName = window.navigator.vendor;

  $('.install a, .modal-trigger').click( function(e){

    if( isChromium !== null && vendorName === "Google Inc." ) {
      // is Google chrome

      $('#earlyAccessModal').modal({'keyboard': true});

    } else {

      var options = {
          keyboard : true,
          remote : window.signInUrl
      };

      $('#chromeModal').modal(options); 

    }

  });

})