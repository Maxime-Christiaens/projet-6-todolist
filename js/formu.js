//active l'anim des select
$(document).ready(function () {
  $('select').formSelect();
});
//active le texte-area
$('.message').val('New Text');
M.textareaAutoResize($('.message'));