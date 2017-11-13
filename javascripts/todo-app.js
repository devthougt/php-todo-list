$(document).ready(function() {
    $('#btn').on('click', function() {
        var todo = $('#todo').val();
        var name = $('#username').val();

        $.ajax({
            type: 'GET',
            url: './controller/todoApp.php?do=add&&username=' + name + '&todo=' + todo,
            success: function(data) {
                //do something with the data via front-end framework
                var output = document.createElement('li');
                output.innerHTML = todo;
                document.querySelector("#new-list").appendChild(output);
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });

    })

    $('li').on('click', function() {
        var item = $(this).text().replace(/ /g, " ");

        $.ajax({
            type: 'DELETE',
            url: './controller/todoApp.php?do=delete&todelete=' + item,
            success: function(data) {
                //do something with the data via front-end framework
                console.log(data);
            }
        });
    });
})