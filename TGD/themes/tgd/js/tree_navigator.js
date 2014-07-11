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

    var dash = hash.indexOf('-');
    var questionNumber = false;
    if(!(dash < 0)){
        questionNumber = hash.substring(dash+1);
        hash = hash.substring(0,dash);
    }
    

    var question = $("#"+hash);
    var questionItem = $("#"+hash+">ul>li").eq(questionNumber);
    
    var parentId = question.closest('.tab-pane').attr('id');
    var parent = $('.faq-index').find('a[href=#'+ parentId + ']');

    parent.click();
    questionItem.click();

    $('html, body').animate({
        scrollTop: question.offset().top -80
    }, 1000);
  }

});