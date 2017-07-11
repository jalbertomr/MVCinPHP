<?php 

class note_Model extends Model {

  public function __construct() 
  {
  	   parent::__construct();
  }
  
  public function noteList() 
  { //new method
    return $this->db->select('SELECT * FROM note WHERE userid = :userid', 
            array(':userid' => $_SESSION['userid']));
    
    //old method
//    $sth = $this->db->prepare('SELECT * from note WHERE userid = :userid');
//    $sth->execute( array(':userid' => $_SESSION['userid']));
//    return $sth->fetchAll();
  }

  public function noteSingleList($noteid) 
  {
    //old method
//    $sth = $this->db->prepare('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid');
//    $sth->execute( array( ':userid' => $_SESSION['userid'],':noteid' => $noteid));
//    return $sth->fetch();
    
    //new method
    return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid',
       array( 'userid' => $_SESSION['userid'],'noteid' => $noteid));
  }
  
  public function create($data)
  {
    // old method
//    $sth = $this->db->prepare('INSERT INTO user '
//            . '(login, password, role)' 
//            .' VALUES (:login,:password,:role)'
//            );
//    $sth->execute(array(
//        ':login' => $data['login'],
//        ':password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
//        ':role' => $data['role']
//            )); 

      
      //New method
      $this->db->insert( 'note', array(
          'title' => $data['title'],
          'userid' => $_SESSION['userid'],
          'content' => $data['content'],
          'date_added' => date('Y-m-d H:i:s')
      ));
      //die(mysql_error());
  }
  
  public function editSave($data)
  {
    //UPDATE user SET role='owner' WHERE id=1;
    //ini_set('display_errors',1);
    //error_reporting(E_ALL);
    //die(mysql_error());
    //die(print_r($this->db->errorInfo(),true));          
      
    //  old method
//    $sth = $this->db->prepare('UPDATE note '
//            . 'SET title = :title, content = :content'
//            .' WHERE noteid = :noteid AND userid = :userid'
//            );
//    $sth->execute( array(
//          ':noteid' => $data['noteid'],
//          ':userid' => $_SESSION['userid'],
//          ':title' => $data['title'],
//          ':content' => $data['content'],
//    ));
    
    // new method  
    $postData = array(
          'title' => $data['title'],
          'content' => $data['content']
      );  
    $this->db->update( 'note', $postData,
            "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'" );
  }
  
  public function delete($id)
  {
    //new method  
    $this->db->delete('note',"`noteid` = {$id} AND userid = '{$_SESSION['userid']}'");
    
    //old method
//    $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
//    $sth->execute( array(':id' => $id));
  }
} 
?>