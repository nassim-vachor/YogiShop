
$(document).ready(function() {
    $('a.souscription-window').click(function() {
        
        // Getting the variable's value from a link 
        var souscriptionBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(souscriptionBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(souscriptionBox).height() + 24) / 2; 
        var popMargLeft = ($(souscriptionBox).width() + 24) / 2; 
        
        $(souscriptionBox).css({ 
            'margin-top' : -250,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        
        return false;
    });
    
    // When clicking on the button close or the maskAjoutSeance layer the popup closed
    $('a.close, #mask').on('click', function() { 
      $('#mask , .souscription-popup').fadeOut(300 , function() {
        $('#mask').remove();  
    }); 
    return false;
    });
});
