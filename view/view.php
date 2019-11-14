<?php


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <title>Game</title>
</head>
<body>
    <button id="create" value="create" name="create">Create Character And Monster</button>
    <button id="fight" value="fight" name="fight">Fight Character And Monster</button>
    <div class="Result"></div>

    <script>
        $('#create').on('click',function(){
            request = $.ajax({
                url: "controller/controller.php",
                type: "post",
                data: {'action' : $('#create').val()},
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                console.log(response);
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        });

        $('#fight').on('click',function(){
            request = $.ajax({
                url: "controller/controller.php",
                type: "post",
                data: {'action' : $('#fight').val()},
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // Log a message to the console
                console.log(response);
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        });
    </script>

</body>
</html>