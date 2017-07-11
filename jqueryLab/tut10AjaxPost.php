<!-- jquery tutorial 10 Ajax Post
--!>
<html>
<head>
  <title>Test</title>
  <script type="text/javascript" src="../public/js/jquery-1.12.0.js"></script>
  
  <script type="text/javascript">
  
  $(document).ready( function(){

    function loadValues() {
      var fields = $( '#forma' ).serializeArray();
      $('#results').empty();
      $('#content').empty();
       jQuery.each( fields, function ( i, field){
       	  $('#content').append( "'" + fields[i].name + "'" +':'+ fields[i].value);
      	  $('#results').append( field.name + ':' + field.value );
      	  //if (i < field.lenght()){
      	  //return false;
      	  //}
      	  console.log(field.length);
      });     	
    };
    
    $( 'input' ).on( "change" , loadValues);    
    
    $( '#forma' ).submit( function() {

       loadValues();
       
       $.post('ajaxpost.php' , $('#forma').serialize() , function( data ){
         $('#content').html(data);       	
       }, 'json')
       .done( function(){
       	console.log('$.post done');
       })
       .fail( function() {
         console.log('$.post fail');	
       })
       .always( function() {
         console.log('$.post always');	
       });
       
       //$('#form').serialize();
       //$.post('ajaxpost.php', {'name':'Beto','age':45,'height':1.70,'weight':70 } ,function( data ){
       //  $('#content').html(data);
       //});
       
       return false;
    });
     
  });
  
  </script>


</head>
<body>
<p><tt id="results"></tt></p>
<div id="content" style="border: 1px solid red;" >
</div>

<form id="forma" name="forma" method="post">
  Name<input type="text" id="name" name="name"/><br />
  Age<input type="text" id="age" name="age"/><br />
  Height<input type="text" id="height" name="height"><br />
  Weight<input type="text" id="weight" name="weight"><br />
  <input type="submit"/>
</form>

</body>
</html>