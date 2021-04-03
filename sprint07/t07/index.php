<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data to XML</title>
</head>
<body>
<style>
table {
    border: 2px double gray;
    width: 100%;
}
table td {
    border: 1px double black;
}
</style>
<h1>Avenger Quote to XML</h1>
<?php
    function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
    spl_autoload_register("autoload");
    $avengerQuote1 = new AvengerQuote(6206, "Tony Stark", "I know i said no mire suprises, \n but i gotta say, i was really hoping to pull off one last one.", [ "1.jpg"]);
    $avengerQuote1->addComment("My first favorite quote of Tony Stark.");

    $avengerQuote2 = new AvengerQuote(2937, "Bruce Banner", "That's my secret, captain: I'm always angry.", [ "1.jpg", "2.jpg"]);
    $avengerQuote2->addComment("My first favorite quote of Bruce Banner.");

    $listAvengerQuote = new ListAvengerQuotes();
    $listAvengerQuote->addAvengerQuotes($avengerQuote1);
    $listAvengerQuote->addAvengerQuotes($avengerQuote2);
    $listAvengerQuote->toXML("file.xml");

    echo '<table><tr><td><pre><b><span>To XML</span><br><br></b>';
    print_r($listAvengerQuote); 
    echo '</pre></td><td><pre><b><span>From XML</span><br><br></b>';
    print_r($listAvengerQuote->fromXML("file.xml"));
    echo '</pre></td></tr></table>';
?>