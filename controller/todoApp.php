<?php
require_once '../model/db-connect.php';
require_once '../model/query.php';

if (isset($_GET['do'])) {
    switch (strtolower($_GET['do'])) {
        case 'add':
            try{
                $todo = getStringParams('todo');
                $name = getStringParams('username');

                if(checkFields($name,$todo)){
                    $addTodo = doAddTodo($name, $todo);
                    echo $addTodo;
                }else{
                    echo "failed";
                }

            }catch(Exception $ex){
                echo $ex->getMessage();
            }
            break;

        case 'delete':
                try{
                    $todo = getStringParams('todelete');
                    
                    if(checkFields($todo)){
                        $deleteTodo = doDeleteTodo($todo);
                        echo $deleteTodo;
                    }else{
                        echo api_response(false, null, 'params missing');
                    }
                }catch(Exception $ex){
                    echo $ex->getMessage();
                }
            break;

        default:
            # code...
            break;
    }
}

function doAddTodo($username, $todo){
    try{

        $todo = get_value($todo);
        $username = get_value($username);
        $query = "INSERT INTO todo (user_name, todo_list) VALUES ($username, $todo)";
        $auto = querydbReturnNewID($query);

        $new_todo['new_todo'] = $auto;
        return api_response(true, null, null);

    }catch(Exception $ex){
        return api_response(false, null, $ex->getMessage());
    }
}

function doDeleteTodo($todoDelete){
    try{
        $todoDelete = get_value($todoDelete);

        $query = "UPDATE todo SET delete_status = 1 WHERE todo_list = $todoDelete";
        $rowsDeleted = querydbReturnAffectedRows($query); //returns number of deleted rows
		if ($rowsDeleted !== 0){
			return api_response(true, true, null);
        }
        else{
         return api_response(false, null, 'No such  item found to delete!');
     }

    }catch(Exception $ex){
        return api_response(false, null, $ex->getMessage());
    }
}

   
