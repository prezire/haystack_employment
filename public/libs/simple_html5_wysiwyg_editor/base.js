/*
  http://codepen.io/barney-parker/pen/idjCG
  Big Thanks To:
  https://developer.mozilla.org/en-US/docs/Rich-Text_Editing_in_Mozilla#Executing_Commands

  Requires: jQuery and Font Awesome.
*/
$(document).ready(function()
{
  $('#editControls a').click(function(e)
  {
    switch($(this).data('role'))
    {
      case 'h1':
      case 'h2':
      case 'p':
        document.execCommand('formatBlock', false, $(this).data('role'));
      break;
      default:
        document.execCommand($(this).data('role'), false, null);
      break;
    }
    update_output();
  });
  $('#editor').bind('blur keyup paste copy cut mouseup', 
    function(e){
      update_output();
    });
  function update_output()
  {
    $('#output').val($('#editor').html());
  }
});