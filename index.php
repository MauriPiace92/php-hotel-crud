<?php 
    
    require_once __DIR__ . '/database_request.php';

    $sql = "SELECT * FROM `stanze`";
    $result = $conn->query($sql);

    $rooms=[];
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $rooms[]=$row;
            
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room dbhotels</title>
</head>
<body>

    <h1>Stanze nel mio Hotel</h1>

    <ul>
        <?php foreach($rooms as $room) {?>
            <li>
                Stanza numero:<?php echo $room['room_number']?> <br>
                Si trova al piano:<?php echo $room['floor']?> 
            </li>
            <a href="room_info.php?id=<?php echo $room['id']; ?>">Vedi Dettaglio Stanza</a>
        <?php } ?>
    </ul>
    
</body>
</html>