$( ".deletar" ).click(function( event ) {
  var confirma = confirm("Confirma exclusão");
  if( ! confirma){
    event.preventDefault();
  }
});
