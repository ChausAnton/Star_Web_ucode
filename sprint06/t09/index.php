<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New Avenger application</h1>
    <div class="look_post" style="width: 100%; border: 2px solid black; background: #C0C0C0;">
        <h2>POST</h2>
        <?php

            $arr = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "age" => $_POST["age"],
                "description" => $_POST["description"],
                "photo" => $_POST["photo"]
            ];
            
            if($arr["name"]) {
                
                echo "<pre>";
                print_r ($arr);
                echo "</pre>";
            }

        ?>
    </div>
    <form action="index.php" method="post" class="form_box"  style="border: 2px solid gray; padding: 20px;">
        <div class="firs_data" style="border: 2px solid gray; padding: 20px 20px 20px 20px;">
            <p class="About_the_superhero" style=" position: relative;background-color: white;bottom: 45px;margin-bottom: -30px;width: 135px;">About the Superhero</p>
            <span>Name</span> 
            <input type="text" class="real_name" placeholder="Tell your name" name="name"> 
            <span>E-mail</span>      
            <input type="text" class="Superhero name" placeholder="Tell your E-mail" name="email">
            <span>Age</span>
            <input type="number" class="age" min="1" max="999" name="age">
            <br><span>About</span>
            <textarea rows="5" cols="70" class="about" maxlength="500" placeholder="Tell about yourself, max 500 symbols" name="description"></textarea><br><br>
            <span>Photo </span> <input type="file" name="photo">
        </div>
        <input type="reset" value="CLEAR" class="reset">
        <input type="submit" value="SEND" class="send">
    </form>
</body>
</html>

