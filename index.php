<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #list{
            cursor : pointer;
        }
    </style>
</head>
<body>
<!--  <form action="controller/todoApp.php" method="post"> -->
<input type="text" name="todo" id="todo">
<input type="text" name="username" id="username">
<input type="submit" value="submit" id="btn">
<!-- </form> -->
<ol>
    <ol start="0">
        <li id="new-list"></li>
    </ol>
    <?php
    include('model/db-connect.php');
    include('model/query.php');
    $query = mysqli_query($GLOBALS['connect'],"SELECT *, (creation_date) as up_date FROM todo  WHERE delete_status = 0 order by up_date desc");
    while($row = mysqli_fetch_array($query)){
        ?>

        <li id="<?php print $row['id'] ?> "><?php print $row['todo_list'] ?></li>
        <?php
    }
    ?>

</ol>


<script src="javascripts/jquery-2.2.3.min.js"></script>
<script src="javascripts/todo-app.js"></script>
<script>
</script>
</body>
</html>