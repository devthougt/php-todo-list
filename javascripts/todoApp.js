window.onload = () => {

    document.querySelector('#btn').addEventListener('click', () => {
        var todo = document.getElementById('todo').value;
        var arr = [];
        var httpRequest = new XMLHttpRequest();

        httpRequest.open('GET', "./controller/todoApp.php?do=add", true);
        httpRequest.onreadystatechange = function() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var output = document.createElement('li');
                    output.innerHTML = todo;
                    document.querySelector("#new-list").appendChild(output);

                } else {
                    alert('There was a problem with the request.');
                }
            }
        };
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send("todo=" + todo);
    });

}