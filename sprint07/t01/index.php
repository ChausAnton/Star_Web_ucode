<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>t01</title>
        <meta name="description" content="t08" charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <style>
            .hidden {
                display: none;
            }
            .look_post {
                width: 100%; 
                border: 2px solid black; 
                background: #C0C0C0;
            }
            .form_box {
                border: 2px solid gray; 
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <h1>Session for new</h1>
        <form action="index.php" method="post" class="form_box"  style="border: 2px solid gray; padding: 20px;" <?php if(isset($_POST["dura"])) {echo ' hidden';} else {echo ' form_box';}?>>
            <div class="firs_data" style="border: 2px solid gray; padding: 20px 20px 20px 20px;">
                <p class="About_the_superhero" style=" position: relative;background-color: white;bottom: 45px;margin-bottom: -30px;width: 90px;">About HERO</p>
                <span>Real Name</span> 
                <input type="text" class="real_name" placeholder="Tell your name" name="name"> 
                <span>Current Alias</span>      
                <input type="text" class="Superhero name" placeholder="Alias" name="Alias">
                <span>Age</span>
                <input type="number" class="age" min="1" max="999" name="age">
                <br><span>About</span>
                <textarea rows="5" cols="70" class="about" maxlength="500" placeholder="Tell about yourself, max 500 symbols" name="description"></textarea><br><br>
                <span>Photo </span> <input type="file" name="photo">
            </div>
            <div class="second_box" style="border: 2px solid gray;padding: 20px;margin: 10px 0px 0px 0px;">
                <p class="Powers" style="position: relative;background-color: white;bottom: 45px;margin-bottom: -30px;width: 47px;">Powers</p>
                <input type="checkbox" name="Strength"> <span>Strength</span>
                <input type="checkbox" name="Speed"> <span>Speed</span>
                <input type="checkbox" name="Intelligence"> <span>Intelligence</span>
                <input type="checkbox" name="Teleportation"> <span>Teleportation</span>
                <input type="checkbox" name="Immoretal"> <span>Immoretal</span>
                <input type="checkbox" name="Another"> <span>Another</span>
                <br><br><span>Level of control:</span>
                <input type="range" id="Level_of_control" name="Level_of_control" min="0" max="10" value="0">
            </div>
            <div class="three" style="border: 2px solid gray;padding: 30px;margin: 10px 0px 0px 0px;"> 
                <p class="Origin_of_powes" style="position: relative;background-color: white;bottom: 55px;margin-bottom: -30px;width: 60px;">Publicity</p>
                <input type="radio" name="or_radio" value="UNKNOWN"> <span>UNKNOWN</span>
                <input type="radio" name="or_radio" value="LIKE A GHOST"> <span>LIKE A GHOST</span>
                <input type="radio" name="or_radio" value="I AM IN COMICS"> <span>I AM IN COMICS</span>
                <input type="radio" name="or_radio" value="I HAVE FUN CLUB"> <span>I HAVE FUN CLUB</span>
                <input type="radio" name="or_radio" value="SUPERSTAR"> <span>SUPERSTAR</span>
            </div>
            <input type="reset" value="CLEAR" class="reset">
            <input type="submit" value="SEND" class="send" name="dura">
        </form>
        <div class="look_post" style="width: 100%; border: 2px solid black; background: #C0C0C0;" <?php if(!isset($_POST["dura"])) {echo ' hidden';} else {echo ' look_post';}?>>
            <?php

                $arr = [
                    "name" => $_POST["name"] ? $_POST["name"] : "Unknown",
                    "Alias" => $_POST["Alias"] ? $_POST["Alias"] : "Unknown",
                    "age" => $_POST["age"] ? $_POST["age"] : "Unknown",
                    "description" => $_POST["description"] ? $_POST["description"] : "Unknown",
                    "photo" => $_POST["photo"] ? $_POST["photo"] : "Unknown",
                    "Strength" => $_POST["Strength"] ? "Has" : "Unknown",
                    "Speed" => $_POST["Speed"] ? "Has" : "Unknown",
                    "Intelligence" => $_POST["Intelligence"] ? "Has" : "Unknown",
                    "Teleportation" => $_POST["Teleportation"] ? "Has" : "Unknown",
                    "Immoretal" => $_POST["Immoretal"] ? "Has" : "Unknown",
                    "Another" => $_POST["Another"] ? "Has" : "Unknown",
                    "Level of control" => $_POST["Level_of_control"] ? $_POST["Level_of_control"] : "Unknown",
                    "Publicity" => $_POST["or_radio"] ? $_POST["or_radio"] : "Unknown"
                ];

                foreach($arr as $i => $v) {
                    if("Unknown" != $v) {
                        $_SESSION["forma"] = $arr;
                    }
                }

                
                if(isset($_SESSION["forma"])) {
                    
                    foreach($arr as $i => $v) {
                        echo "$i : $v <br>";
                    }
                }

                if(!isset($_POST['destroy'])) {
                    session_destroy();
                }

            ?>
            <form>
                <input type="submit" value="FORGET" class="send" name="destroy">
            </form>
        </div>
    </body>
</html>