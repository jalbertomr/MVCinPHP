<?php

class dashboard_Model extends Model {
	
	function __construct() {
            parent::__construct();
        }
	
	function xhrInsert(){
            $text = $_POST['text'];//se debe sanitizar este valor $text

            //new method
            $this->db->insert('data', array('text' => $text));
            
            //old method
//            $sth = $this->db->prepare('INSERT INTO data(text) VALUES (:text)');
//            $sth->execute(array(':text' => $text));
            
            $data = array('text' => $text, 'dataid' => $this->db->lastInsertId());
            echo json_encode($data);
            }
        
        function xhrGetListing(){
            //new method
            $result = $this->db->select('SELECT * FROM data');
            //old method
//            $sth = $this->db->prepare('SELECT * FROM data');
//            $sth->setFetchMode(PDO::FETCH_ASSOC);
//            $sth->execute();
//            $result = $sth->fetchAll();

            echo json_encode($result);
        }
        
        function xhrDeleteListing(){
            $dataid = (int) $_POST['dataid'];  //(int) una forma rapida de sanitizar?
            //new method
            $this->db->delete( 'data', "dataid = '$dataid'");
            //old method
            //$sth = $this->db->prepare('DELETE FROM data WHERE dataid = "'.$dataid.'"');
            //$sth->execute();
        }
}
?>