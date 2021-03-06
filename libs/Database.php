<?php


//fatcow script to connect 
//$link = mysql_connect('vickuscom.fatcowmysql.com', '_beto123', '*password*'); 
//if (!$link) { 
//    die('Could not connect: ' . mysql_error()); 
//} 
//echo 'Connected successfully'; 
//mysql_select_db(crm); 
 
  class Database extends PDO {
  //$DB_TYPE,$DB_HOST, $DB_NAME, $DB_USER, $DB_PASS
    public function __construct($DB_TYPE,$DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {

        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);

        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
  /**
   * select
   * @param string $sql An sql string
   * @param array $array parameters to bind
   * @param constant $fetchMode a PDO Fetch Modes
   * @return array Mixed
   */
  public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
  {
    $sth = $this->prepare( $sql);
    foreach($array as $key => $value){
        $sth->bindValue("$key", $value);
    }
    $sth->execute();
    return $sth->fetchAll(); 
  }  
  
  /**
   * insert
   * @param string table name of table to insert into
   * @param string data an associative array
   */
  public function insert($table, $data)
  {
    ksort($data);  

    $fieldNames = implode('`, `',array_keys($data));
    $fieldValues = ':' . implode(', :',array_keys($data));

    $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

    foreach ($data as $key => $value){
        $sth->bindValue(":$key", $value);
    }
    $sth->execute();
  }

  /**
   * update
   * @param string table name of table to insert into
   * @param string data an associative array
   * @param string where the WHERE query part
   */
  public function update($table, $data, $where)
  {
    ksort($data);  

    $fieldDetails = NULL;
    foreach($data as $key => $value){
        $fieldDetails .= "`$key` =:$key,";
    }
    $fieldDetails =rtrim( $fieldDetails, ',');
    
    //echo "UPDATE $table SET $fieldDetails WHERE $where";

    //UPDATE table SET item1 = a, item2 = b, item3 = c where something = 1;
    $sth = $this->prepare('UPDATE '. $table.' SET '. $fieldDetails.' WHERE '. $where);

    foreach ($data as $key => $value){
        $sth->bindValue(":$key", $value);
    }
    $sth->execute();
  }
  /**
   * delete
   * @param string $table
   * @param string $where
   * @param integer $limit
   * @return integer Affected rows
   */
  public function delete( $table, $where, $limit = 1)
  {
     return $this->exec('DELETE FROM '.$table.' WHERE '.$where. ' LIMIT '.$limit);
  }        
}
?>