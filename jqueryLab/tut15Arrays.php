<!-- jquery tutorial 15 Arrays
--!>
<html>
<head>
  <title>Test</title>
  <script type="text/javascript" src="../public/js/jquery-1.12.0.js"></script>
  
  <script type="text/javascript">
  
  $(document).ready( function(){

    var data = $("#button").attr('rel');
    data = data.split('|');
    data.push("unomas");
    
    $.each(data , function( key, val){
    	$('#box').append(key + "=>" + val + "<br/>");
    });
    
    
    //$('#box').html(data.toString());
    //$('#box').html(data[1]);
    
    //var arr = ['cat','dog','fish'];
    //$("#box").html(arr.toString());
    //arr.shift();
    //arr.unshift("food");
    //arr.pop();
    //arr.pop();
    //arr.pop();
    //arr.pop();
    //arr.push("push1");
    //arr.push("push2");
    //arr.push("push3");
    //arr.push("push4");
    //arr.splice(0,2);  // push3 push4
    //arr.splice(1,1);    // push1 push3 push4
    //arr.splice(1,2);    // push1 push4
    //$("#box").html(arr.join(" + ") + " longitud: " + arr.length);
         
  });
  
  </script>


</head>
<body>
<h1>JQuery Arrays</h1>

<input type="submit" id="button" rel="25|dog|fish"/>
<div id="box"  >
</div>

</body>
</html>