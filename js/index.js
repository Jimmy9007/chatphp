$(function(){
    
	$("button").button();
    $( "#tabs" ).tabs();
    $( "#accordion" ).accordion();
    $( "#divFotoZoomGaleria,.divFotoZoom").draggable();
    $(".divFotoZoom,#divFotoZoomGaleria").resizable();

/*    $("#tablaUsuarios").DataTable();*/
});
//esta funcion es para cambiar es estilo a los title de los div....
    $(function() {
    $( document ).tooltip({
      position: {
        my: "center bottom-5",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });

$('.responsiveMenu').click(function(){
  $('#formlogin').slideToggle();
});
/*$(window).load(function(){
    $("#status").delay(480).fadeOut();
    $("#preloader").delay(500).fadeOut("fast");
}*/