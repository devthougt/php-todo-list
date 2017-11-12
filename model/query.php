<?php 

    class Query{
        
        //return turn if query was sucessfull
        public function isQuery($query){
            $query_run = mysqli_query(Query::connect(), $query);
            if (mysqli_num_rows($query_run) > 0) {
                return true;
            }else{
                return false;
            }
        }

        public function fetchData($query){
            $result = mysqli_query(Query::connect(),$query);
            return mysqli_fetch_array($result);
        }

        public function insertData($query){
            $result = mysqli_query(Query::connect(), $query);
            if($result){
                return true;
            }else{
                return false;
            }
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