<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Make square image</h1>
    <form action="" method="POST" class="form">
        <input name="url" placeholder="Image url ..." class="input_url">
        <input type="submit" name="go" value="go" class="go_button">
    

        <?php
            if(isset($_POST['url']) && isset($_POST['go'])) {
                extension_loaded('imagick');
                $imageUrl = $_POST['url'];
                $image = 'original.jpg';
                $ch = curl_init($imageUrl);
                $fp = fopen($image, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);

                $resourse = imagecreatefromjpeg($image);
                $size = min(imagesx($resourse), imagesy($resourse));
                $fin = imagecreatetruecolor($size * 2, $size * 2);

                $resourse = imagecreatefromjpeg($image);
                imagecopyresampled($fin, $resourse, 0, 0, 0, 0, $size, $size, $size, $size);
                imagefilter($resourse, IMG_FILTER_COLORIZE, 255, 0, 0);
                imagecopyresampled($fin, $resourse, $size, $size, 0, 0, $size, $size, $size, $size);

                $resourse = imagecreatefromjpeg($image);
                imagefilter($resourse, IMG_FILTER_COLORIZE, 0, 255, 0);
                imagecopyresampled($fin, $resourse, $size, 0, 0, 0, $size, $size, $size, $size);

                $resourse = imagecreatefromjpeg($image);
                imagefilter($resourse, IMG_FILTER_COLORIZE, 0, 0, 255);
                imagecopyresampled($fin, $resourse, 0, $size, 0, 0, $size, $size, $size, $size);

                imagepng($fin, "fin.png");
                unlink($image);
                    
                echo '<img src="' . 'fin.png' . '" alt="image">';
                //https://i.ytimg.com/vi/AoPYnqmkpCs/maxresdefault.jpg
            } 
        ?>
    </form>
</body>
</html>