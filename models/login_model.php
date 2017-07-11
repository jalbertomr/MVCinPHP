<?php 

class login_Model extends Model {

  public $msg = '';
  
  public function __construct() {
  	   parent::__construct();
  }
  
  public function run() {
    try{
       $sth = $this->db->prepare("SELECT userid, role FROM user WHERE
               login = :login AND password = :password");
       $sth->execute( array(
        ':login' => $_POST['login'],
        ':password' => Hash::create('sha256',$_POST['password'], HASH_PASSWORD_KEY)
       ));
    }catch (PDOException $e) {
       echo 'Error: login_Model run SELECT Execute: '. $e->getMessage();
    }
    try{    
      $data = $sth->fetch();
    } catch (PDOException $e) {
      echo 'Error: login_model run fetch'. $e->getMessage();    
    }
    //$data = $sth->fetchAll();
    $count = $sth->rowCount();
    if ($count > 0) {
    	//login
        //echo("<script>console.log('PHP: ".'login_model run Session init'."');</script>");
    	Session::init();
        Session::set('role',$data['role']);
    	Session::set('loggedIn',true);
        Session::set('userid', $data['userid']);
        //echo("<script>console.log('PHP: ".'login_model run Session inited'."');</script>");
    	return true;
    }	else {
      // load message error!
      $this->msg = 'Error: Login_mode run usuario no esta en base datos';
      return false;
    }	
  }
} 
?>