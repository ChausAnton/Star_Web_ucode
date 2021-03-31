<?php
    session_start();
    if(isset($_POST['Clear'])) {
        session_destroy();
    }
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
            $_SESSION["str_to"] = $_POST['Input1'];
            foreach($_POST['code'] as $i => $v) {
                utf8_encode($_SESSION["str_to"]);
                echo "$v";
                $to = $v;
                if(strpos($v, "ISO") || $i == 1) {
                    $to = $to . "//TRANSLIT";
                }
                
                echo "<textarea name='str'>" . iconv("UTF-8", $to, $_SESSION["str_to"]) . "</textarea><br>";
            }
        }
    ?>
</body>
</html>