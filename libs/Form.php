<?php
/*
 * -Fill out a form
 * -POST to PHP
 * -Sanitize
 * -Validate
 * -Return Data
 * -Write to Database
 * 
 */
require 'Form/Val.php';

class Form {
    
    /** @var String $_currentItem The immediately posted item */
    private $_currentItem = null;
    
    /** @var array $_postData Stores de posted Data*/
    private $_postData = array();
    
    /** @var object $_val The validator Object*/
    private $_val = array();
    
    /** @var array $_error Holds the current forms error*/
    private $_error = array();
    
    /*
     * __construct - Instantiates de validator class
     */
    public function __construct()
    {
       $this->_val = New Val();    
    }
    
    /*
     * post - This is to run $_POST
     * 
     * @param string $field - The HTML fieldname to post
     */
    public function post($field)
    {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;
        return $this;
    }
    
    /*
     * fetch - return the posted data
     * 
     * @param mixed $fieldName
     * 
     * @return mixed String or array
     */
    public function fetch($fieldName = false)
    {
        if ($fieldName)
        {
            if (isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else
                return false;
        }    
        else 
            return $this->_postData;    
        
    }
    /*
     * val - this is to validate 
     * 
     * @param string $typeOfValidator A method of the Form/Val class
     * @param string $arg a property to validate against
     */
    public function val($typeOfValidator, $arg = null)
    {
        if ($arg == null)
          $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        else
          $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
          
        if($error){
           $this->_error[$this->_currentItem] = $error;
        }
        
        echo "<pre>";
        return $this;
    }
    
    /*
     * submit - Handles the form,  and throws an exception upon error.
     * 
     * @return boolean
     * @throws Exception
     */
    public function submit()
    {
      if(empty($this->_error))
      {
          return true;
      }
      else
      {  
         $str = '';
         foreach( $this->_error as $key => $value){
            $str .= $key . ' => ' . $value . "\n";   
         }
         throw new Exception($str);  
      }
    }
}
?>
