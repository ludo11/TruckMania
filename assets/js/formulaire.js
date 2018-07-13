$( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#pro" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "/espace-Pros/formulaire",
          dataType: "json",
          type : "POST",
          data: {
            birds : $('#pro').val()
          },
          success: function( data ) {
            response( data );
          
          }
        } );
      },
      minLength: 3,
      select: function( event, ui ) {
        log(  ui.item.value);
      }
    } );
  } );