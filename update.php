<?php

    $xml = simplexml_load_file("src/data/users.xml");
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach($xml->user as $user) {
            if ($user['id'] == $id) {
                $name = $user->name;
                $tag = $user->tag;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];

        foreach($xml->user as $user) {
            if ($user['id'] == $id) {
                $user->name = $_POST['username'];
                $user->tag = $_POST['usertag'];
                break;
            }
        }

        $xml->saveXML("src/data/users.xml");

        header('location:index.php');
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" href = "src/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <title>Create new account</title>

</head>

<body>
    
    <header>

        <a id = "back" href = "index.php"> <span>back</span> </a>

    </header>

    <div class = "island" id = "create_island">

        <form action="update.php" method="POST">

            <div> <input type = "text" name = "username" required value="<?php echo $name ?>"/> </div>
            <div> <input type = "text" name = "usertag" required value="<?php echo $tag?>"/> </div>
            <div> <input type="hidden" name="id" value="<?php echo $id ?>" /> </div>
            <div> <input id = "create_button" type = "submit" name="submit" value = "change" /> </div>
            
        </form>

    </div>

</body>

</html>