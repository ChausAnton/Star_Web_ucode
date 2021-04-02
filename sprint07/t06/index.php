<?php
    session_start();
    function autoload($pClassName) {
        include(__DIR__. '/' . $pClassName. '.php');
    }
    spl_autoload_register("autoload");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .from_style {
            display: flex;
            flex-flow: column;
        } 
        .inputs_style {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Notepad mini</h1>
    <form action="" method="POST" class="from_style">
        <div class="inputs_style" >
            <input name="note_name" placeholder="Name">
        </div>
        <div class="inputs_style" >
            <select name="importance[]" class="inputs_style">
                <option selected>low</option>
                <option>medium</option>
                <option>high</option>
            </select>
        </div>
        <div class="inputs_style" >
            <textarea name="content" placeholder="Textof note ..." class="inputs_style"></textarea>
        </div>
        <div class="inputs_style" >
            <input type="submit" value="Create" name="Create_note">
        </div>
    </form>
    <h2>List of notes</h2>
    <?php
        $fileName = "NotePad";
        $fileR = "";
        if(isset($_POST['note_name']) && isset($_POST['content']) && isset($_POST['Create_note'])) {
            $notePad = "";
            $newNote = new Note($_POST['note_name'], $_POST['importance'], $_POST['content']);
            if(file_exists($fileName)) {
                $fileR = file_get_contents($fileName);
                $notePad = unserialize($fileR);
                $notePad->unserializeArray();
            }
            else {
                fclose(fopen($fileName, 'c'));
                $notePad = new NotePad();
            }

            $notePad->addNote($newNote);
            $notePad->addSerializeNote($newNote);

            $notePad->notes = NULL;
            file_put_contents ($fileName, serialize($notePad));

            $notePad->unserializeArray();

        }

        if(file_exists($fileName)) {
            $fileR = file_get_contents($fileName);
            $notePad = unserialize($fileR);
            $notePad->unserializeArray();

            echo '<ul>';
            foreach($notePad->notes as $v) {
                echo '<li><a href="?noteContent=' . $v->name . '">' . $v->date . ' > ' . $v->name
                . '</a><a href="?deleteNote=' . $v->name . '"> DELETE</a></li>';
            }
            echo '</ul>';
        }
    ?>
    <h2>Detail of "some"</h2>
    <?php
        $fileName = "NotePad";
        $fileR = "";
        if(isset($_GET['noteContent'])) {
            if(file_exists($fileName)) {
                $fileR = file_get_contents($fileName);
                $notePad = unserialize($fileR);
                $notePad->unserializeArray();

                echo "<ul>";
                foreach($notePad->notes as $v) {
                    if($v->name == $_GET['noteContent']) {
                        echo "<li>date: <b> $v->date</b></li>";
                        echo "<li>name: <b> $v->name</b></li>";
                        echo "<li>importance: <b> " . $v->importance[0] . "</b></li>";
                        echo "<li>content: <b> $v->content</b></li>";
                    }
                }
                echo "</ul>";
            }
        }

        if(isset($_GET['deleteNote'])) {
            if(file_exists($fileName)) {
                $fileR = file_get_contents($fileName);
                $notePad = unserialize($fileR);
                $notePad->unserializeArray();

                $notePad->deleteElement($_GET['deleteNote']);
                file_put_contents ($fileName, serialize($notePad));
                echo '<script>window.location = window.location.href.split("?")[0];</script>';
            }
        }
    ?>
</body>
</html>