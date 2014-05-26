// Display the menus and the questions refered on the url hash
//
// given a hash on the url, this small function clicks the proper dependant 
// elements untill the refered  section is displayed 
// and then scrolls to it so its the main thing on the content
//
// By Raul Galindo

$(document).ready(function(){
  if(window.location.hash) {
    var hash     = window.location.hash.substring(1);
    var question = $("#"+hash)
    var parentId = question.closest('.tab-pane').attr('id')
    var parent = $('.faq-index').find('a[href=#'+ parentId + ']')

    parent.click();
    question.click();

    $('html, body').animate({
        scrollTop: question.offset().top -80
    }, 1000);
  }

});