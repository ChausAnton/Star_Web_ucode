<!DOCTYPE html>
<html lang="en">
    <head>
        <title>t01</title>
        <meta name="description" content="t08" charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <form action="index.php" method="post" class="form_box"  style="border: 2px solid gray; padding: 20px;">
            <div class="firs_data" style="border: 2px solid gray; padding: 20px 20px 20px 20px;">
                <p class="About_the_superhero" style=" position: relative;background-color: white;bottom: 45px;margin-bottom: -30px;width: 135px;">About HERO</p>
                <span>Real Name</span> 
                <input type="text" class="real_name" placeholder="Tell your name" name="name"> 
                <span>Current Alias</span>      
                <input type="text" class="Superhero name" placeholder="Tell your E-mail" name="email">
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
                <p class="Origin_of_powes" style="position: relative;background-color: white;bottom: 55px;margin-bottom: -30px;width: 107px;">Publicity</p>
                <input type="radio" name="or_radio" value="1"> <span>UNKNOWN</span>
                <input type="radio" name="or_radio" value="2"> <span>LIKE A GHOST</span>
                <input type="radio" name="or_radio" value="3"> <span>I AM IN COMICS</span>
                <input type="radio" name="or_radio" value="4"> <span>I HAVE FUN CLUB</span>
                <input type="radio" name="or_radio" value="5"> <span>SUPERSTAR</span>
            </div>
            <input type="reset" value="CLEAR" class="reset">
            <input type="submit" value="SEND" class="send">
        </form>
    </body>
</html>