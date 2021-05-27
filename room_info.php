<?php   

    require_once __DIR__ . '/database_request.php';

    $room_id = $_GET['id'];

    $sql = "SELECT * FROM stanze WHERE id = " . $room_id . ";";
    $result = $conn->query($sql);

    $room = [];
    if ($result && $result->num_rows > 0) {

        $room = $result->fetch_assoc();  

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info Stanza</title>
</head>
<body>
    
    <?php if(!empty($room)) { ?>
    
        <h1>Stanza Numero: <?php echo $room['room_number']; ?></h1>

        <ul>
            <li>
                Numero letti: <?php echo $room['beds']; ?>
            </li>

            <li>
                Piano: <?php echo $room['floor']; ?>
            </li>

        </ul>

    <?php } else { ?>

        <p>Stanza non trovata!</p>

    <?php }  ?>   

    <a href="index.php">Torna alla Lista Stanze!</a>

</body>
</html>