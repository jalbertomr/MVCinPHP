<?php 
  //print_r($_REQUEST);
  
if (!empty($_REQUEST)) {
  
  //Regresa en formato json
  $arr = array();
  foreach ( $_REQUEST as $cve => $valor){
  	  $arr[$cve] = $valor;
  }
  echo json_encode( $arr);

  //$name=$_REQUEST['name'];
  //$age=$_REQUEST['age'];
  //$height=$_REQUEST['height'];
  //$weight=$_REQUEST['weight'];

  //$DB->Query("insert data");
  //echo "funcionando";
} else {
  //echo "No funcionando";
}
    
    
?>