<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Charset</h1>
    <form action="" method="post"> 
        <span>Change charser:</span><input name="Input1" placeholder="Input string"><br>
        <span>Selecr charset or several charsets:</span>
        <select multiple name="code[]" size="3" name="charsets">
            <option>UTF-8</option>
            <option>ISO-8859-1</option>
            <option>Windows-1252</option>
        </select>
        <input type="submit" value="Change charset" name="charset">
        <input type="submit" value="Clear" name="Clear">
    </form>
    <?php
        if(isset($_POST['charset']) && isset($_POST['code'])) {
            foreach($_POST['code'] as $i => $v) {
                echo "$v";
                echo "<textarea name='str'>" . $_POST['Input1'] . "</textarea><br>";
            }
        }
    ?>
</body>
</html>