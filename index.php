<?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "dbhotel";
    $port = "8889";
    // Connect
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    // Check connection
    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        die();
    }

    $sql = "SELECT `room_number`, `floor` FROM `stanze`";
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
        <li>Stanza numero:<?php echo $room['room_number']?></li>
        <li>Si trova al piano:<?php echo $room['floor']?> </li>
        <?php } ?>
    </ul>
    
</body>
</html>