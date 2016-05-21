
$(document).ready(function() {
    $('a.modifSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var modifSeanceBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(modifSeanceBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(modifSeanceBox).height() + 24) / 2; 
        var popMargLeft = ($(modifSeanceBox).width() + 24) / 2; 
        
        $(modifSeanceBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="maskModifSeance"></div>');
        $('#maskModifSeance').fadeIn(300);
        
        return false;
    });
    
    // When clicking on the button close or the maskModifSeance layer the popup closed
    $('a.close, #maskModifSeance').click(function() { 
      $('#maskModifSeance , .modifSeance-popup').fadeOut(300 , function() {
        $('#maskModifSeance').remove();  
    }); 
    return false;
    });
});
