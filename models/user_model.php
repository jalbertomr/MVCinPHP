<?php 

class user_Model extends Model {

  public function __construct() 
  {
  	   parent::__construct();
  }
  
  public function userList() 
  { //new method
    return $this->db->select('SELECT userid, login, role from user');
    
    //old method
//    $sth = $this->db->prepare('SELECT id, login, role from user');
//    $sth->execute( array(':id' => $id));
//    return $sth->fetchAll();
  }

  public function userSingleList($userid) 
  {
    //new method
    return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid',
       array( ':userid' => $userid));
    //    
    //old method
//    $sth = $this->db->prepare('SELECT userid, login, role FROM user WHERE userid = :userid');
//    $sth->execute( array( ':userid' => $userid));
//    return $sth->fetch();
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
      $this->db->insert( 'user', array(
          'login' => $data['login'],
          'password' => Hash::create('sha256',$_POST['password'], HASH_PASSWORD_KEY),
          'role' => $data['role']
      ));
    //  die(mysql_error());
  }
  
  public function editSave($data)
  {
    //UPDATE user SET role='owner' WHERE id=1;
    //echo print_r($data);
    //die();
    //ini_set('display_errors',1);
    //error_reporting(E_ALL);
    //die(mysql_error());
    //die(print_r($this->db->errorInfo(),true));          
      
    //  old method
//    $sth = $this->db->prepare('UPDATE user '
//            . 'SET login = :login, password = :password, role = :role '
//            .' WHERE userid = :id'
//            );
//    $sth->execute( array(
//      ':id' => $data['userid'],
//      ':login' => $data['login'],
//      ':password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
//      ':role' => $data['role']
//    ));
    
    // new method  
    $postData = array(
          'login' => $data['login'],
          'password' => Hash::create('sha256',$_POST['password'], HASH_PASSWORD_KEY),
          'role' => $data['role']
      );  
    $this->db->update( 'user', $postData, 
            "`userid` = {$data['userid']}");
  }
  
  public function delete($userid)
  {
    //new method  
    $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));
    if ($result[0]['role'] == 'owner'){
        return false;
    }
    $this->db->delete('user',"userid = '$userid'");
    
    //old method
//    $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
//    $sth->execute( array(':id' => $id));
  }
} 
?>