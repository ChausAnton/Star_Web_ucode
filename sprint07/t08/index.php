<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Show other sites</h1>
    <form action="" method="POST">
        <input name="url" placeholder="url">
        <input type="submit" name="go" value="go">
        <a href="">BACK</a>
    </form>
    <?php
        if(isset($_POST['go'])) {
        echo '<div style="width: 100%;display: flex;"><span style="border-top: 2px solid black;border-bottom: 2px solid black;">' . "url: " . $_POST['url'] ."</span></div><br>";

            $html = file_get_contents($_POST['url']);
            
            $html = explode("<body", $html)[1];
            $html = explode("</body>", $html)[0];
            $html = "<body" . $html . "</body>";

            $html = str_replace("<", "&#60;", $html);
            $html = str_replace(">", "&#62;", $html);
            $html = nl2br($html);
            echo $html;
        }
    ?>
</body>
</html>