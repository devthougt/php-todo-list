<?php 
    class DB{
        public function createConnection($host, $user, $password, $db_name){
            return new mysqli($host, $user, $password, $db_name);   
        }
     
    }
    
