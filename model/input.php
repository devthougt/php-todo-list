<?php 
    
    class Input{
        public function getInput($input){
            return mysqli_escape_string(Input::connect(), $_GET[$input]);
        }

        public function postInput($input){
            return mysqli_escape_string(Input::connect(), $_POST[$input]);
        }

        public function connect(){
            $error = "please check connection";
            $con = DB::createConnection('localhost', 'root', '', 'smartshelf');
            if($con->connect_errno){
                    return $error;
                }else{
                    return $con;
          }
        }
    }