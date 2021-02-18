$(document).ready(function(){

  // Ocultar el mensaje de error
  $("#close_error").click(function(){
    $("#error").toggleClass("d-none");
  });

  // Ocultar el mensaje de éxito
  $("#close_success").click(function(){
    $("#success").toggleClass("d-none");
  });

});
