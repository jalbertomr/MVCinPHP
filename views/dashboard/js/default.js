/*
* dashboard/default.js
*  
*/
$(function(){
    
   $.get('dashboard/xhrGetListing', function(o){
       
       for (var i = 0; i < o.length; i++)
       {
          $('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="'+ o[i].dataid +'" href="'+ o[i].dataid +'"> Borrar</a></div>'); 
       }

       $('body').delegate('.del','click',o, function(){
       //$('.del').on('click',o, function(){
       //$('.del').click(function() {
         delItem = $(this);
         var dataid = $(this).attr('rel');

         $.post('dashboard/xhrDeleteListing', {'dataid': dataid}, function(o,status) {
           delItem.parent().remove();
           console.log(o);
           console.log(status);
         }).error(function(m){
                      debugger;
                      console.log('posterror')
                  });
         
         return false;
       });
   }, 'json');
   
   $("#randomInsert").submit( function(o){
       var url = $(this).attr('action');
       var data = $(this).serialize();
     
       $.post(url, data, function(o,status){
           console.log(o);
           console.log(status);
           $("#listInserts").append('<div>' + o.text + '<a class="del" rel="'+ o.dataid +'" href="#"> Borrar</a></div>');

       }, 'json').error(function(){console.log('randominsert.posterror')
                 });

       return false;
   });
});

