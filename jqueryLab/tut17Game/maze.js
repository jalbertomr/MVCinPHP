/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    
    var player = '<div id="player"></div>';
    $("#map").append(player);
    
    $(document).keydown( function(e){
      //alert(e.keyCode);
      
      var position = $("#player").position();
            
      switch(e.keyCode)
      {
          case 37: //left
            $("#player").css('left', position.left - 20 + 'px');
            break;
          case 38: //up
            $("#player").css('top', position.top - 20 + 'px');
            break;
          case 39: //right          {
            $("#player").css('left', position.left + 20 + 'px');
            break;
          case 40: //down          {
            $("#player").css('top', position.top + 20 + 'px');
            break;
      }
    });
});

