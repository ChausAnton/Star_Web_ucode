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
    <h1>Parsing CSV data</h1>
    <form action="" method="POST">
        <span>Upload file: <input type="file" name="CSV"></span>
        <input type="submit" value="Upload" name="upload" id="fileSelect">
    </form>
    <form action="" method="POST" style="padding-top: 20px;">
        <span>Filter: 
            <select name="filter_select[]" size="1">
                <?php
                    $filters = ['NOT SELECTED', 'good', 'bad', '-', 'neutral'];
                    foreach($filters as $i) {
                        if(isset($_SESSION["filter"]) && $_SESSION["filter"] == $i) {
                            echo "<option selected>" . $_SESSION["filter"] . "</option>";
                        }
                        else {
                            echo "<option>" . $i . "</option>";
                        }
                    }
                    if(isset($_POST['apply'])) {
                        header("Refresh:0");
                    }
                ?>
            </select>
        </span>
        <input type="submit" name="apply" value="APPLY">
    </form>
    <?php
        if(isset($_POST['filter_select'])) {
            $_SESSION["filter"] = $_POST['filter_select'][0];
        }

        if(isset($_POST["upload"]) && isset($_POST['CSV']) && !isset($_POST['apply'])) {
            $_SESSION["csv_file"] = $_POST['CSV'];
        }
        if(isset($_SESSION["csv_file"])) {
            $csv_open = fopen($_SESSION["csv_file"], "r");

            echo '<table border="1">';

            if($csv_line = fgetcsv($csv_open)) {
                echo '<tr>';
                foreach($csv_line as $str) {
                    echo '<th>' . $str . '</th>';
                }
                echo '</tr>';
            }

            while($csv_line = fgetcsv($csv_open)) {
                if(isset($_SESSION["filter"]) && $_SESSION["filter"] != "NOT SELECTED") {
                    if($_SESSION["filter"] != $csv_line[2]) {
                        continue;
                    }
                }

                echo '<tr>';
                foreach($csv_line as $str) {
                    echo '<td>' . $str . '</td>';
                }
                echo '</tr>';
            }
            
            echo '</table>';

            fclose($csv_open);
        }
    ?>
</body>
</html>