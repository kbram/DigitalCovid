$(document).ready(function(){
$('#editform input').attr("disabled", true);

  $("#btn_editform").click(function(){
    $('#btn_saveform').removeClass('hidden');
    $('#location').removeClass('hidden');
    $('#back').removeClass('hidden');
    $('#btn_editform').prop('disabled', true);
    $('#editform input').attr("disabled", false);
  });

});