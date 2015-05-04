// test minScript cached files
jQuery(document).ready(function ($) { 
    
    var chromeExtAvailable=true;

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
        if(tem !== null){
          return tem.slice(1).join(' ').replace('OPR', 'Opera');
        }
      }

      M = M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
      if((tem = userAgent.match(/version\/(\d+)/i))!== null){
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
        $('input',$modalFooter).attr("placeholder","enter your email address");
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

      showError = function(){
        setModalLabel("Ops!");
        setModalDescription('Something went wrong. Please try again later.');
        $modalFooter.removeClass('loading').children('button').prop('disabled',false);
      },

      originalDescription,
      originalLabel, 
      
      browser = navigator.browserInfo.browser.toLowerCase(),

      sendRequest = function(email, list){
          var xhr = new XMLHttpRequest(),
              location = document.location;
          xhr.open('GET', location.protocol + '//' + location.host +"/api/phplist/add/"+email+"/"+list, false);
          xhr.onload = function () {
              var timeout = setTimeout(showError, 10000);

              if (xhr.readyState == 4) {
                clearTimeout(timeout);
                var resp = JSON.parse(xhr.responseText);

                if ( xhr.status == 200)  {

                  $('form', $modalFooter).hide();
                  $('button[type=button]', $modalFooter).css('float','right').show();
                  $modalDescription.contents().empty();
                  $modalFooter.removeClass('loading').children('button').prop('disabled',false);

                  if (resp.result == 'success'){
                    setModalLabel("Thanks!");
                    setModalDescription('We will send you an invite once we are ready.<br>For frequent updates, follow us <a href="http://twitter.com/thegooddata">@thegooddata</a>.');
                  }else if (resp.result == 'fail'){
                    showError();
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
      isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Mobile|mobile/.test(navigator.userAgent),
      isChrome = /chrome/.test(browser),
      isFirefox = /firefox/.test(browser),
      isSafari = /safari/.test(browser),
      firefoxId = 'firefox',
      safariId = 'safari',
      chromeId = 'chrome';

  if(( (isChrome && !chromeExtAvailable)  || isSafari || isFirefox) && !isMobile ){
    $('.modal-footer > a').hide();
    $('.modal-footer > button[type=button]').hide();
    $('.modal-footer > form').show();
    
    if (isFirefox){
      // firefox
      originalLabel = "Firefox browser is not supported yet, but...";
      $('#myModalLabel').html(originalLabel);
      originalDescription = "...if you tell us your email address we will let you know as soon as we have our extension available for Firefox.";
      $modalDescription.html(originalDescription);

      list = firefoxId;
    }else if (isSafari){
      // safari
      originalLabel = "Safari browser is not supported yet, but...";
      $('#myModalLabel').html(originalLabel);
      originalDescription = "...if you tell us your email address we will let you know as soon as we have our extension available for Safari.";
      $modalDescription.html(originalDescription);
      list = safariId;
    }else if (isChrome){
      // chrome
      originalLabel = "We're sorry...";
      $('#myModalLabel').html(originalLabel);
      originalDescription = "Browser extension for Chrome will be back soon. If you want to be notified, please leave your email address here.";
      $modalDescription.html(originalDescription);

      list = chromeId;
    }
  }

  // submit button click event handler 
  $('.modal-footer button[type=submit]').click(function(e){
    e.preventDefault();

    email = $modalFooter.addClass("loading").find('input').val();
    $('input, button', $modalFooter).prop('disabled', true);
    
    if(email !== '' && validateEmail(email)){
      $('input',$modalFooter).removeClass("error").parent().removeClass('has-error');
      sendRequest(email, list);
    }else{
      resetModalFooter();
      $('input',$modalFooter).attr("placeholder","Please, enter a valid email address.").addClass('error').parent().addClass('has-error');
    }
  });

  // Click event handler that triggers the modal
  $('.install a, .modal-trigger').click(function(e){
      
      console.log("isChrome: "+isChrome);
      console.log("chromeExtAvailable: "+chromeExtAvailable);

    if (isChrome && chromeExtAvailable) {
      // is Chrome, and ext is available, redirect to chrome store
      // just leave normal behaviour
      return true;
    }else{
      e.preventDefault();
      $modal.modal('show');
      return false;
    }
    
  });

});

