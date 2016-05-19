
$(document).ready(function() {
    $('a.ajoutSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var ajoutSeanceBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(ajoutSeanceBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(ajoutSeanceBox).height() + 24) / 2; 
        var popMargLeft = ($(ajoutSeanceBox).width() + 24) / 2; 
        
        $(ajoutSeanceBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="maskAjoutSeance"></div>');
        $('#maskAjoutSeance').fadeIn(300);
        
        return false;
    });
    
    // When clicking on the button close or the maskAjoutSeance layer the popup closed
    $('a.close, #maskAjoutSeance').on('click', function() { 
      $('#maskAjoutSeance , .ajoutSeance-popup').fadeOut(300 , function() {
        $('#maskAjoutSeance').remove();  
    }); 
    return false;
    });
});
