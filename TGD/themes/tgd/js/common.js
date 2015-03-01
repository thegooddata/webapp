jQuery(document).ready(function ($) { 

  navigator.browserInfo = (function(){
      var userAgent = navigator.userAgent, 
          tem,
          M = userAgent.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];

      if(/trident/i.test(M[1])){
        tem = /\brv[ :]+(\d+)/g.exec(userAgent) || [];
        return 'IE '+(tem[1] || '');
      }

      if(M[1] === 'Chrome'){
        tem = userAgent.match(/\b(OPR|Edge)\/(\d+)/);
        if(tem != null){
          return tem.slice(1).join(' ').replace('OPR', 'Opera');
        }
      }

      M = M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
      if((tem = userAgent.match(/version\/(\d+)/i))!= null){
        M.splice(1, 1, tem[1]);
      } 

      return { 'browser': M[0], 'version': M[1] };
    })();
  
  var $modal = $('#chromeModal'),
      $modalFooter = $('.modal-footer'), 
      $modalDescription= $('#modal-description'),

      validateEmail = function (email) { 
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
      },

      disableFormControls = function(disabled){
        $modalFooter.removeClass('loading').find('input,button').prop('disabled', disabled);
      },

      resetModalFooter = function(){
        disableFormControls(false);
        $('input',$modalFooter).val('');
        $('form', $modalFooter).show();
        $('button[type=button]', $modalFooter).css('float','right').hide();
      },

      setModalDescription = function(description){
        $('#modal-description').html(description);
      },

      setModalLabel = function(label){
        $('#myModalLabel').html(label);
      },

      fixateHeights = function(){
        $('.modal-footer').height($('.modal-footer').height());
        $('.modal-body').height($('.modal-body').height());
      },

      originalDescription,
      originalLabel, 
      
      browser = navigator.browserInfo.browser.toLowerCase(),

      sendRequest = function(email, list){
          var xhr = new XMLHttpRequest();
          xhr.open('GET', "http://tgd.local/api/phplist/add/"+email+"/"+list, false);
          xhr.onload = function () {
              if (xhr.readyState == 4) {
                
                var resp = JSON.parse(xhr.responseText);

                if ( xhr.status == 200)  {

                  $('form', $modalFooter).hide();
                  $('button[type=button]', $modalFooter).css('float','right').show();
                  $modalDescription.contents().empty();
                  $modalFooter.removeClass('loading').children('button').prop('disabled',false);

                  if (resp.result == 'success'){
                    setModalLabel("Perfect!");
                    setModalDescription("You will receive news from us.")
                  }else if (resp.result == 'fail'){
                    setModalLabel("Doh!");
                    setModalDescription(resp.message);
                  }else{
                    ;
                  }
                }
                else  {
                  resetModalFooter();
                  console.log( "Error: " + xhr.status + ": " + xhr.statusText);
                }
                
              }
          };

          xhr.send();

      };


  $modal.modal({show : false});
  $modal.on('shown.bs.modal',function(){
    fixateHeights();
  });
  $modal.on('hidden.bs.modal',function(){
    setModalDescription(originalDescription);
    setModalLabel(originalLabel);
    resetModalFooter();
  });

  var email,
      list,
      isChrome = /chrome/.test(browser),
      isFirefox = /firefox/.test(browser),
      isSafari = /safari/.test(browser);

  if(isSafari || isFirefox){
    $('.modal-footer > a').hide();
    $('.modal-footer > button[type=button]').hide();
    $('.modal-footer > form').show();
    
    if (isFirefox){
      // firefox
      originalLabel = "Firefox browser is not supported yet, but...";
      $('#myModalLabel').html(originalLabel);
      originalDescription = "...if you tell us your email address we will let you know as soon as we have our extension available for Firefox."
      $modalDescription.html(originalDescription);

      list = 'firefox';
    }else if (isSafari){
      // safari
      originalLabel = "Safari browser is not supported yet, but...";
      $('#myModalLabel').html(originalLabel);
      originalDescription = "...if you tell us your email address we will let you know as soon as we have our extension available for Safari."
      $modalDescription.html(originalDescription);
      list = 'safari';
    }

    // submit button click event handler 
    $('.modal-footer button[type=submit]').click(function(e){
      e.preventDefault();

      email = $modalFooter.addClass("loading").find('input').val();
      $('input, button', $modalFooter).prop('disabled', true);
      
      if(email != '' && validateEmail(email)){
        sendRequest(email, list);
      }else{
        resetModalFooter();
      }
    });
  }

  // Click event handler that triggers the modal
  $('.install a, .modal-trigger').click(function(e){
    e.preventDefault();

    if(isChrome){
      // is Chrome, redirect to chrome store
      var win = window.open($(this).attr('href'), '_blank');
    }else{
      $modal.modal('show');
    }
  });

});

