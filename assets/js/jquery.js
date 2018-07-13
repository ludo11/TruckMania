      
$( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#tags" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "/liste",
          dataType: "json",
          type : "POST",
          data: {
            birds : $('#tags').val()
          },
          success: function( data ) {
            response( data );
            console.log(data);
          }
        } );
      },
      minLength: 3,
      select: function( event, ui ) {
        log(  ui.item.value);
      }
    } );
  } );
  /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


