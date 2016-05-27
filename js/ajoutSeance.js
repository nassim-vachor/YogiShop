function showModal(box) {
        //Fade in the Popup and add close button
        $(box).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(box).height() + 24) / 2; 
        var popMargLeft = ($(box).width() + 24) / 2; 
        
        $(box).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="maskAjoutSeance"></div>');
        $('#maskAjoutSeance').fadeIn(300);
}

$(document).ready(function() {
    $('a.ajoutSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var ajoutSeanceBox = $(this).attr('href');

        showModal(ajoutSeanceBox)

        return false;
    });
    

    // When clicking on the button close or the maskAjoutSeance layer the popup closed
    $('a.close, #maskAjoutSeance').click(function() { 
      $('#maskAjoutSeance , .ajoutSeance-popup').fadeOut(300 , function() {
        $('#maskAjoutSeance').remove();  
    }); 
    return false;
    });
});



function showModalSuppri(box) {

        $(box).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(box).height() + 24) / 2; 
        var popMargLeft = ($(box).width() + 24) / 2; 
        
        $(box).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="maskAnnulSeance"></div>');
        $('#maskAnnulSeance').fadeIn(300);
    }
    
    $(document).ready(function() {
    $('a.annulSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var annulSeanceBox = $(this).attr('href');

        showModalSuppri(annulSeanceBox)

        return false;
    });
    // When clicking on the button close or the maskAnnulSeance layer the popup closed
    $('a.close, #maskAnnulSeance').click(function() { 
      $('#maskAnnulSeance , .annulSeance-popup').fadeOut(300 , function() {
        $('#maskAnnulSeance').remove();  
    }); 
    return false;
    });
});



function showModalModif(box) {

        $(box).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(box).height() + 24) / 2; 
        var popMargLeft = ($(box).width() + 24) / 2; 
        
        $(box).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
         $('body').append('<div id="maskModifSeance"></div>');
        $('#maskModifSeance').fadeIn(300);
    }
    
    $(document).ready(function() {
    $('a.modifSeance-window').click(function() {
        
        // Getting the variable's value from a link 
        var modifSeanceBox = $(this).attr('href');

        showModalModif(modifSeanceBox)

        return false;
    });
    // When clicking on the button close or the maskAnnulSeance layer the popup closed
   $('a.close, #maskModifSeance').click(function() { 
      $('#maskModifSeance , .modifSeance-popup').fadeOut(300 , function() {
        $('#maskModifSeance').remove();
    }); 
    return false;
    });
});



