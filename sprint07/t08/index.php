<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>What Thano did for the Soul Stone?</h1>
    <form action="index.php" method="post">
        <input type="radio" name="radioButton" value="1"><span>Jumped from the mountain</span><br>
        <input type="radio" name="radioButton" value="2"><span>Make stone keeper to jump from the mountain</span><br>
        <input type="radio" name="radioButton" value="3"><span>Pushe Gamora off the mountain</span><br>
        <button type="submit">I made a choice!</button><br>
    </form>
    <?php
        $temp = $_POST['radioButton'];
        if($temp && $temp <= 2) {
            echo"<p>Mistake</p>";
        }
        else if($temp) {
            echo"<p>Right</p>";
        }
    ?>
</body>
</html>

