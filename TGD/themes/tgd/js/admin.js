jQuery(document).ready(function ($) { 
  $('#toggle-export').click(function(e){
    e.preventDefault();
    $('#select-fields').toggle();
  });

  // select all behavior
  $('#select-all').click(function(e){
    e.preventDefault();
    $('#select-fields input[type=checkbox]').not(':checked').prop('checked',true);
  });

  $('#unselect-all').click(function(e){
    e.preventDefault();
    $('#select-fields input[type=checkbox]:checked').prop('checked',false);
  });

  $('#export').click(function(e){
    var i, 
        length=0,
        columns=[],
        queryString='',
        location;
    
    e.preventDefault();
    checkboxes = $('#select-fields input[type=checkbox]:checked');
    length = checkboxes.length;
    
    for(i=0; i<length; i++){
      columns[i] = $(checkboxes.get(i)).val();
    }
    
    if(columns.length > 0){    
      queryString = columns.join('|');
    }
    
    window.location = $('#export').attr('href')+("?cols=" + queryString);
  });
})
