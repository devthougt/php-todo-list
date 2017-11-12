<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <!--  <form action="controller/todoApp.php" method="post"> -->
    <input type="text" name="todo" id="todo">
    <input type="submit" value="submit" id="btn">
    <!-- </form> -->
    <ul>
        <?php
        include('model/db-connect.php');
        include('model/query.php');
            $query = mysqli_query(Query::connect(),"SELECT * FROM todo ORDER BY todo_list DESC");
        while($row = mysqli_fetch_array($query)){
            ?>
            <li id="list"><?php print $row['todo_list'] ?></li>
            <?php
        }
        ?>
        
    </ul>
  

    <script src="javascripts/todoApp.js"></script>
</body>
</html>