<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $xml = simplexml_load_file("src/data/users.xml") or die("Error: Cannot create object");
    $id = $_GET['id'];
    $i = 0;
    foreach ($xml->user as $user) {

   
        if ($user['id'] == $id) {
            unset($xml->user[$i]);
            
            break;
        }

        $i++;
    }
    
    $xml->saveXML('src/data/users.xml');
    header('location:index.php');
}