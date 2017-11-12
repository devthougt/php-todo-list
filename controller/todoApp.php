<?php 
    include('../model/db-connect.php');
    include('../model/input.php');
    include('../model/query.php');

    $todo_list = Input::postInput('todo');
    $query = "INSERT INTO `todo` (`user_name`, `todo_list`)  VALUES ('Agiri', '$todo_list')";
    if(Query::insertData($query)){
    /*     $query = mysqli_query(Query::connect(),"SELECT * FROM todo ORDER BY todo_list DESC");
        while($row = mysqli_fetch_array($query)){
            echo $row['todo_list']."</br>";
        } */
        //echo "done";
    }else{
        echo "failed";
    }

    
