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

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $tag = $_POST['tag'];

            $xml = simplexml_load_file("src/data/users.xml") or die("Error: Cannot create object");
            
            $task = $xml->addChild('user', '');
            $task->addChild('name', $name);
            $task->addChild('tag', $tag);
            $task->addAttribute('id', $xml->count());

            $xml->saveXML('src/data/users.xml');

            header('location:index.php');
        }
        ?>

        <form method="POST" action="create.php">
            <div> <input type = "text" name = "name" required placeholder = "your username"/> </div>
            <div> <input type = "text" name = "tag" required placeholder = "your id"/> </div>
            <div> <input id = "create_button" type = "submit" value = "create" /> </div>
        </form>

    </div>

</body>

</html>