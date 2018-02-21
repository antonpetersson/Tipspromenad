<?php
session_start(); 
include "classes.php";
include "data.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tipspromenad</title>
</head>
<body>

    
    <form action="" method="POST">
        <table>
            <tr>
                <th>Fråga</th>
                <th>Alternativ</th>
            </tr>
            <?php
            
                foreach($questions as $key => $value){
                    $value->printQuestion();
                } 
            ?>
        </table>
        <input type="submit" value="Skicka in">
    </form>  
    <?php
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // $_SESSION = $_POST;
            
        echo 'Du hade ' . $GLOBALS["numCorrectAnswers"] . ' rätt.';
            
        }


    ?>
</body>
</html>