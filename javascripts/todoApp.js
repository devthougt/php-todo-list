window.onload = () => {

    document.querySelector('#btn').addEventListener('click', () => {
        var todo = document.getElementById('todo').value;
        var arr = [];
        var httpRequest = new XMLHttpRequest();

        httpRequest.open('POST', "./controller/todoApp.php", true);
        httpRequest.onreadystatechange = function() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var output = document.createElement('output');
                    arr.push(todo);
                    for (var i = 0; i < arr.length; i++) {
                        console.log(arr[i]);
                        document.querySelector("#list").appendChild(output);

                        output.innerHTML = "<li>" + arr.sort() + "</li>";
                    }
                } else {
                    alert('There was a problem with the request.');
                }
            }
        };
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send("todo=" + todo);

    });
}