<!-- jquery tutorial 9 Ajax Load
--!>
<html>
<head>
  <title>Test</title>
  <script type="text/javascript" src="../public/js/jquery-1.12.0.js"></script>
  
  <script type="text/javascript">
  

  $(document).ready( function(){

     $('#incluye').click( function(){     
       $.get('junk.php?name=beto&age=23', function( data ){
         $('#content').html(data);
       });
     });


     //$('#content').html('metiendo un boton <input type="submit" id="button" /> ' );

     // load( parametros pueden ser usados como cargadores dinamicos
     //$('#content').load('junk.php #other' );
     //$('#content').load('junk.php'); 
     // $('body').load('junk.php');
     
     // $('#content').load('junk.php', function () { 
     //   alert(1); 
     // });
     
  });
  
  </script>


</head>
<body>
Incluye archivo junk.php
<input type="button" id="incluye" value="incluye archivo"/>
<div id="content"> </div>

</body>
</html>