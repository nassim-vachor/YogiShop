
$(document).ready(function() {
    $('a.annulSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var annulSeanceBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(annulSeanceBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(annulSeanceBox).height() + 24) / 2; 
        var popMargLeft = ($(annulSeanceBox).width() + 24) / 2; 
        
        $(annulSeanceBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="maskAnnulSeance"></div>');
        $('#maskAnnulSeance').fadeIn(300);
        
        return false;
    });
    
    // When clicking on the button close or the maskAnnulSeance layer the popup closed
    $('a.close, #maskAnnulSeance').on('click', function() { 
      $('#maskAnnulSeance , .annulSeance-popup').fadeOut(300 , function() {
        $('#maskAnnulSeance').remove();  
    }); 
    return false;
    });
});
