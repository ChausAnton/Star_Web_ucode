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
    <h1>Comics from Marvel API</h1>

    <?php
        $timeStamp = time();
        $API_BASE = "http://gateway.marvel.com/v1/public/comics?";
        $PUBLIC_KEY = "9e6bffa95ace26b8f33aa51422c7b754";
        $PRIVATE_KEY = "f86aa9046964cb1e3a1053660272f4b93d513e4c";
        $HASH = md5($timeStamp . $PRIVATE_KEY . $PUBLIC_KEY);
        $api = $API_BASE . "ts=".  $timeStamp . "&apikey=" . $PUBLIC_KEY . "&hash=" . $HASH;

        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $api);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($cURL);
        curl_close($cURL);
        echo(parseJSON(json_decode($json, true)));
        //$json = json_decode($json, true);
        $out = '<div class="block">';

        
        function parseJSON($json) {
            $out = '<div class="block">';
            foreach($json as $i => $v) {
                $out .= '<div>';
                if(is_array($v)) {
                    $out .= '<span class="header"><br>' . $i . ': </span>';
                    $out .= parseJSON($v);
                }
                else {
                    $out .= '<div><span class="key">' . $i . ': </span><span class="value">' . $v . '</span></div>';
                }
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        /*function parseJSON($json) {
            $output = "<div class=\"block\">";
            foreach ($json as $key => $value) {
                if (is_array($value)) {
                    $output .= "<span class=\"header\"><br>$key:</span>";
                    $output .= parseJSON($value);
                } 
                else {
                    $output .= "
                        <div>
                            <span class=\"key\">$key: </span>
                            <span class=\"value\">$value</span>
                        </div>
                    ";
                }
            }
            $output .= "</div>";
            return $output;
        }*/
    ?>
</body>
</html>