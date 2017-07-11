<!-- jquery tutorial 11 JSON
--!>
<html>
<head>
  <title>Test</title>
  <script type="text/javascript" src="../public/js/jquery-1.12.0.js"></script>
  
  <script type="text/javascript">
  
  $(document).ready( function(){

     //$.getJSON('loadjson.php', function( data) {
     $.get('loadjson.php', function( data){
         $('#content').html(data);
     })
       .done(function() {
         //alert( "$.get succeeded" );
       })
       .fail(function() {
         //alert( "$.get failed!" );
       })
     ;
 
  });
  
  </script>


</head>
<body>
<h1>tut11JSON</h1>

<div id="content"></div>
<div id="content2"></div>
<div class="log"></div>
</body>
</html>