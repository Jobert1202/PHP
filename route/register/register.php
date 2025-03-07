<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "../../components/header.php" ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "prvni_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT ID, Název_produktu, Cena_za_kus, Počet_kusů FROM zbozi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["ID"]. " - Name: " . $row["Název_produktu"]. " " . $row["Cena_za_kus"]. " " . $row["Počet_kusů"]. "<br>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>