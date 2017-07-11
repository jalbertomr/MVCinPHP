<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Hash{
    /**
     * 
     * @param string $algo El Algoritmo (md5, sha1, ,sha256, whirlpool, etc)
     * @param string $data el Dato a codificar
     * @param string $salt clave con la que se genera la llave, debe ser la misma para tener coincidencia de passwords
     * @return string the hashed/salted data
     */
    public static function create($algo, $data, $salt){
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        
        return hash_final($context);
    }
    
}
?>
